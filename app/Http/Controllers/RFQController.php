<?php

namespace App\Http\Controllers;

use App\Helpers\Functions;
use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\RFQ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RFQController extends Controller
{
    public function index()
    {
        $rfqs = RFQ::with('client')->orderby('id', 'desc')->get();
        return view('admin.rfq.index', compact('rfqs'));
    }

    public function store(Request $request)
    {
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

            notyf()->success("RFQ created successfully");

        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error("message: " . $th->getMessage());
            notyf()->error("An error occurred while creating RFQ");
            return redirect()->back(
            );
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
