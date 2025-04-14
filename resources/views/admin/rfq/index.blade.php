@extends('layouts.master-admin')
@section('title')
    Request For Quote
@endsection
@section('content')

<div class="row">
    <div class="col-12 mt-4">
        <table class="table table-bordered data-table nowrap table-responsive" style="width:100%">
            <thead>
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Status</th>
                    <th>Quote Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rfqs as $rfq)
                    <tr>
                        <td>
                            <input type="checkbox" class="form-check-input">
                        </td>
                        <td style="text-transform: capitalize">
                            {{$rfq->client->last_name}} {{$rfq->client->first_name}}    
                        </td>
                        <td style="text-transform: capitalize">
                            {{$rfq->client->email}}    
                        </td>
                        <td style="text-transform: capitalize">
                            {{$rfq->client->phone_number}}
                        </td>
                        <td>
                            @if ($rfq->status == 1)
                                <span class="badge bg-success">Read</span>
                                
                            @else
                                <span class="badge bg-danger">Unread</span>
                            @endif
                        </td>
                        <td>
                            @if ($rfq->is_quotation_sent == 1)
                                <span class="badge bg-success">Sent</span>
                                
                            @else
                                <span class="badge bg-warning">Pending</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{route('admin.rfq.preview', ['uuid'=>$rfq->uuid])}}" class="btn btn-primary btn-sm"> <i class="align-middle" data-feather="eye"></i> Preview</a>
                           @if ($rfq->is_quotation_sent == 0)
                           <a href="{{route('admin.quotation.create', ['client_id'=> $rfq->client->uuid,'rfq_id'=>$rfq->uuid])}}" class="btn btn-success btn-sm"> <i class="align-middle" data-feather="file"></i> Generate Quote</a>
                           @endif
                            <a href="#" 
                                onclick="event.preventDefault(); 
                                        if (confirm('Are you sure you want to delete this?')) { 
                                            //dynamically parsing the current row id to the form
                                            document.getElementById('uuid').value = '{{$rfq->uuid}}';
                                            document.getElementById('delete-category-form').submit();}" 
                                class="btn btn-danger btn-sm">
                                 <i class="align-middle" data-feather="trash-2"></i> Delete
                             </a>
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