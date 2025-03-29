@extends('layouts.master-admin')
@section('title')
    Quotation - <b>{{$quotation->quote_number}}</b>
@endsection
@section('styles')
    <style>
       
        .terms{
            line-height: 24px;
            font-size: 13px;
        }
        p{
            line-height: 4px;
            font-size: 13px;
        }
    </style>
@endsection
@section('content')
    <section class="heading">
        <div class="container">
            <div class="row d-flex justify-content-between align-items-start">
                <div class="d-flex justify-content-end align-items-center mb-4" style="display: flex; justify-content: right; align-items: center;">
                    <a href="{{route('admin.quotation.send', ['quote_id'=>$quotation->uuid])}}" class="btn btn-primary"> <i class="align-middle" data-feather="print"></i>Send Email Quotation</a>
                </div>
                <div class="col-md-6">
                    <h3 class="mb-4" style="font-weight: bold">FIRST VISION CONTRACTING</h3>
                    <p>Operated by 2589813 Alberta Ltd.</p>
                    <p>firstvisioncontracting@gmail.com </p>
                    <p>587-602-0333</p>
                    <p class="mt-5"><b>Business Number:</b>794206029</p>
                </div>
                
                <div class="col-md-6 text-md-end">
                    <div class="col-12 text-"><h2>QUOTE</h2></div>
                    <img src="{{asset('image/FVClogo.png')}}" style="width: 100px; height: 100px;" alt="Logo">
                </div>
            </div>
        </div>
    </section>

    <section class="title">
        <div class="container">
            <div class="row d-flex justify-content-between align-items-start">

                <div class="col-md-8">
                    <table class="table table-bordered ">
                        <tr>
                            <th>Bill To:</th>   
                            <td colspan="3">{{$quotation->client->last_name}} {{$quotation->client->first_name}}</td>  
                        </tr>
                        <tr class="mt-5">
                            <th>Email:</th>   
                            <td>{{$quotation->client->email}}</td>  
                            <th>Phone Number:</th>   
                            <td>{{ preg_replace("/(\d{3})(\d{3})(\d{4})/", '($1)-$2-$3', $quotation->client->phone_number)}}</td>  
                        </tr>

                    </table>
                </div>

                <div class="col-md-4">
                    <table class="table table-bordered ">
                        <tr>
                            <th>Quotation Number:</th>   
                            <td>{{$quotation->quote_number}}</td> 
                        </tr>
                        <tr class="mt-5">
                            <th>Date Created</th>
                            <td>{{$quotation->created_at->format('M-d-Y')}}</td>  
                        </tr>
                    </table>
                </div>

            </div>
        </div>
    </section>

    
    <section class="services">
        <div class="container">
            <h5 style="font-weight: bold">Services</h5>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered ">
                        <tr>
                            <th>#</th>   
                         
                            <th style="width:60%">Description</th>
                            <th>Unit Price</th>
                            <th>Quantity</th>
                            <th>Price</th>
                        </tr>
                        <tbody class="mt-5">
                            @php
                                $n = 1
                            @endphp
                            @foreach ($quotation->service as $service)
                                
                                <tr>
                                    <td>
                                        {{$n++}}
                                    </td>
                                    <td class="text-transform:capitalize">
                                        <b>{{$service->servicelist->name}}</b>
                                        <p class="trix-content">{!!$service->description!!}</p>
                                    </td>
                                    <td>
                                        {{number_format($service->unit_price)}}
                                    </td>
                                    <td>
                                        {{$service->quantity}}
                                    </td>
                                    <td>
                                        {{number_format($service->total)}}
                                    </td>
                                </tr>
                            @endforeach
                                <tr>
                                    <th colspan="3">
                                    </th>
                                    <th>
                                        Sub Total:
                                    </th>
                                    <td>
                                        {{number_format($quotation->sub_total)}}
                                    </td>
                                </tr>
                                <tr>
                                    <th colspan="3">
                                    </th>
                                    <th>
                                        GST (5%):
                                    </th>
                                    <td>
                                        {{$quotation->tax}}
                                    </td>
                                </tr>
                                <tr>
                                    <th colspan="3">
                                    </th>
                                    <th>
                                        Total
                                    </th>
                                    <td>
                                        {{number_format($quotation->total)}}
                                    </td>
                                </tr>
                        </tbody>
                    </table>

                  
                </div>

                <div class="col-8 mt-5">
                    <h5 class="font-weight:bold">
                        Terms & Conditions
                    </h5>
                    <p class="terms">
                        Please note
                        50% deposit required before any work begins. 25% after drywalling is completed. Balance paid after work is
                        fully completed. <br></br>
                        
                            Make all checks payable to: <b> 2589813 Alberta Ltd.</b> <br> </br>
                        
                        We look forward to working with you!<br>
                        <b>Quote valid for 30 days</b> 
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection