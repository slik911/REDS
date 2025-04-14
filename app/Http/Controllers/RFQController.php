<?php

namespace App\Http\Controllers;

use App\Helpers\Functions;
use App\Http\Controllers\Controller;
use App\Mail\RfqNotification;
use App\Models\Client;
use App\Models\RFQ;
use App\Validations\RFQValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class RFQController extends Controller
{
    public function index()
    {
        $rfqs = RFQ::with('client')
        ->orderBy('status', 'asc')          // Sort by status first
        ->orderBy('is_quotation_sent', 'asc')   // Then sort by is_quote_sent (False first, True last)
        ->orderBy('updated_at', 'desc')     // Finally, sort by the most recent updated_at
        ->get();
        return view('admin.rfq.index', compact('rfqs'));
    }

    public function store(Request $request, RFQValidation $rule)
    {
        $validated = $rule->validationRules($request, 'create');

        if ($validated->fails()) {
            notyf()->error($validated->errors()->first());
            return redirect()->back()->withInput($request->all());
        }

        try {

            DB::beginTransaction();

            $client = Client::where('email', $request->email);

            if(!$client->exists()) {
                $client = Client::create($request->all());
            }
            else{
                $client = $client->first();
            }
    
            $rfq = new RFQ();
            $rfq->client_id = $client->uuid;
            $rfq->RFQ_number = Functions::generateRandomString("RFQ");
            $rfq->title = $request->title;
            $rfq->description = $request->description;
            $rfq->province = $request->province;
            $rfq->city = $request->city;
            $rfq->postal_code = $request->postal_code;
            $rfq->save();
            DB::commit();

            $mailData = [
                'title' => 'New Quote Request Submitted',
                'name' => 'First Vision Contracting',
                'body' => 'A new request for quote has just been submitted on your platform. Please log in to the admin dashboard to review the details.',
            ];
            
            
            $email = "odinaka466@gmail.com";
            
          
            Mail::to($email)->send(new RfqNotification($mailData));

            notyf()->success("Submission successful. We'll get back to you as soon as possible.");
            return redirect()->back();

        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error("message: " . $th->getMessage());
            notyf()->error("An error occurred while submitting request");
            return redirect()->back();
        }
        
    }

    public function preview($uuid)
    {
        $data = RFQ::with('client')->where('uuid', $uuid);
        //upddate status to read
        $data->update(['status' => 1]);

        $rfq = $data->first();
        return view('admin.rfq.preview', compact('rfq'));
    }
}
