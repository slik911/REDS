@extends('layouts.master-admin')
@section('title')
    Quotations
@endsection
@section('content')
<div class="d-flex justify-content-end align-items-center" style="display: flex; justify-content: right; align-items: center;">
    <a href="{{route('admin.quotation.create')}}" class="btn btn-primary"> <i class="align-middle" data-feather="plus-circle"></i> Create Quoatation</a>
</div>
<div class="row">
    <div class="col-12 mt-4">
        <table class="table table-bordered data-table nowrap table-responsive" style="width:100%">
            <thead>
                <tr>
                    <th></th>
                    <th>Created At</th>
                    <th>Quotation Number</th>
                    <th>RFQ</th>
                    <th>Client</th>
                    <th>Email</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($quotations as $quote)
                    <tr>
                        <td>
                            <input type="checkbox" class="form-check-input">
                        </td>
                        <td>{{$quote->created_at->format('M-d-Y')}}</td>
                        <td>{{$quote->quote_number}}</td>
                        <td><a href="{{route('admin.rfq.preview', ['uuid'=>$quote->rfq->uuid])}}">{{$quote->rfq->RFQ_number}}</a></td>
                        <td style="text-transform: capitalize">
                            {{$quote->client->last_name}} {{$quote->client->first_name}}    
                        </td>
                        <td style="text-transform: capitalize">
                            {{$quote->client->email}}    
                        </td>
                        <td style="text-transform: capitalize">
                            {{number_format($quote->total, 2)}}
                        </td>
                        <td>
                            <span class="badge bg-success"  style="text-transform: capitalize">{{$quote->status}}</span>
                        </td>
                       

                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div class="dropdown">
                                    <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        Select Option
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                
                                        <li><a class="dropdown-item" href="{{route('admin.quotation.send', ['quote_id'=>$quote->uuid])}}">Send Mail</a></li>
                                        <li><a class="dropdown-item" href="{{route('admin.quotation.change.status', ['status'=> 'accepted', 'quote_id'=>$quote->uuid])}}">Accept</a></li>
                                        <li><a class="dropdown-item" href="{{route('admin.quotation.change.status', ['status'=> 'rejected', 'quote_id'=>$quote->uuid])}}">Reject</a></li>
                                        <li><a class="dropdown-item" href="{{route('admin.quotation.change.status', ['status'=> 'in-progress', 'quote_id'=>$quote->uuid])}}">In-Progress</a></li>
                                        <li><a class="dropdown-item" href="{{route('admin.quotation.change.status', ['status'=> 'completed', 'quote_id'=>$quote->uuid])}}">Completed</a></li>
                                    </ul>
                                </div>
                                <a href="{{route('admin.quotation.preview', ['quote_id'=>$quote->uuid])}}" class="btn btn-success btn-sm">
                                    <i class="align-middle" data-feather="file"></i> Preview
                                </a>
                                @if ($quote->status == 'draft')
                                <a href="{{route('admin.quotation', ['uuid'=>$quote->uuid])}}" class="btn btn-success btn-sm">
                                    <i class="align-middle" data-feather="pen"></i> Edit
                                </a>
                                 @endif

                                @if ($quote->status != 'draft')
                                    <a href="{{route('admin.quotation', ['uuid'=>$quote->uuid])}}" class="btn btn-success btn-sm">
                                        <i class="align-middle" data-feather="file"></i> Resend Quotation
                                    </a>
                                @endif


                                @if ($quote->status != 'draft')
                                    <a href="{{route('admin.quotation', ['uuid'=>$quote->uuid])}}" class="btn btn-success btn-sm">
                                        <i class="align-middle" data-feather="file"></i> Cancel Quotation
                                    </a>
                                @endif

                                <a href="#" onclick="event.preventDefault(); 
                                        if (confirm('Are you sure you want to delete this?')) { 
                                            document.getElementById('uuid').value = '{{$quote->uuid}}';
                                            document.getElementById('delete-category-form').submit();
                                        }" 
                                    class="btn btn-danger btn-sm">
                                    <i class="align-middle" data-feather="trash-2"></i> Delete
                                </a>
                            </div>
                        
                            <!-- Hidden Form for Deletion -->
                            <form id="delete-category-form" action="{{ route('admin.category.delete') }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                                <input type="text" name="uuid" id="uuid">
                            </form>
                        </td>
                        
                    </tr>
                    
                @endforeach
            </tbody>
          </table>
    </div>
</div>
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>