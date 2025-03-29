<?php

namespace App\Http\Controllers;

use App\Helpers\Functions;
use App\Http\Controllers\Controller;
use App\Mail\QuoteMail;
use App\Models\Client;
use App\Models\Quotation;
use App\Models\RFQ;
use App\Models\Service;
use App\Models\ServiceList;
use App\Models\Tax;
use App\Validations\QuotationValidation;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class QuotationController extends Controller
{
    public function index(){
        $quotations = Quotation::with('rfq', 'client', 'user')->get();
        // dd($quotation);
        return view('admin.quotation.index', compact('quotations'));
    }

    public function create($client_id = null, $rfq_number = null){

        $rfqs = RFQ::select('uuid', 'rfq_number')->get();
        $clients = Client::select('uuid', 'first_name', 'last_name')->get();
        $services = ServiceList::select('uuid', 'name')->get();
        $quotation_number = Functions::generateRandomString("QTN");

        return view('admin.quotation.create', compact('rfqs', 'rfq_number', 'clients', 'client_id', 'services', 'quotation_number'));
    }

    public function getClientInfo(Request $request){

        $client = Client::with('rfq')->where('uuid', $request->uuid)->first();
        
        return response()->json($client);
    }

    public function store(Request $request, QuotationValidation $rule){

        $validated = $rule->validationRules($request, 'create');

        if ($validated->fails()) {
            notyf()->error($validated->errors()->first());
            return redirect()->back()->withInput($request->all());
        }

        try {

            DB::beginTransaction();
            $total = 0;
            foreach ($request->total as $key => $value) {
                $total += $value;
            }
            

            $quotation = Quotation::create([
                'client_id' => $request->client_uuid,
                'rfq_id' => $request->rfq_id,
                'quote_number' => $request->quote_number,
                'user_id' => Auth::user()->uuid,
                'sub_total' => $total,
                'tax' => (Tax::first()->rate/100) * $total,
                'total' => $total + ((Tax::first()->rate/100) * $total),
                'status' => 'draft'
            ]);

           foreach ($request->services as $key => $service) {
                $services = Service::create([
                    'quote_id' => $quotation->uuid,
                    'service_list_id' => $service,
                    'description' => $request->description[$key],
                    'unit_price' => $request->unit_price[$key],
                    'quantity' => $request->quantity[$key],
                    'total' => $request->total[$key]
                ]);
            }

            DB::commit();
            notyf()->success('Quotation created successfully.');
            return redirect()->route('admin.quotation');

        } catch (\Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            notyf()->error('An error occurred while creating quotation.');
            return redirect()->back()->withInput($request->all());
        }
       
    }


    public function changeStatus($status, $quote_id){

        $quotation = Quotation::where('uuid', $quote_id)->first();
        $quotation->status = $status;
        $quotation->save();

        notyf()->success('Quotation status updated successfully.');
        return redirect()->back();
    }

    public function sendMail($quote_id)
    {
        try {
            $quotation = Quotation::with('rfq', 'client', 'user')->where('uuid', $quote_id)->first();

            $pdf = Pdf::loadView('pdf.quote', ['quotation' => $quotation]);
            $pdfContent = $pdf->output(); // Get PDF as string

            $mailData = [
                'title' => 'Quotation for Your Project – First Vision Contracting',
                'name' => $quotation->client->first_name,
                'body' => 'I hope you\'re doing well. Please find attached the quotation for your project. Let us know if you have any questions or require any adjustments. We look forward to working with you.',
                'attachments' => [
                    [
                        'content' => $pdfContent,
                        'name' => 'quote.pdf',
                        'mime' => 'application/pdf'
                    ]
                ]
            ];
            
            $email = $quotation->client->email;
            
          
            Mail::to($email)->send(new QuoteMail($mailData));
            

            $quotation->status = "sent";
            $quotation->save();

            if($quotation->rfq){
                RFQ::where('uuid', $quotation->rfq->uuid)->update([
                    'is_quotation_sent'=>true
                ]);
            }
        
            
            notyf()->success('Email is sent Successfully');
            return redirect()->back();

        } catch (\Throwable $th) {
           Log::info($th->getMessage());
           notyf()->error('Error Occured while trying to send mail');
           return redirect()->back();
        }
        
    }

    public function quote(){
        $quotation = Quotation::with('rfq', 'client', 'user', 'service')->first();
        return view('pdf.quote', compact('quotation'));
    }

    public function preview($quote_id){
        $quotation = Quotation::with('rfq', 'client', 'user', 'service')->where('uuid', $quote_id)->first();
       
        return view('admin.quotation.preview', compact('quotation'));
    }

}
