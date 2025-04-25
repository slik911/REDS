@extends('layouts.master-admin')
@section('title')
    Quotations
@endsection
@section('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var modal = document.getElementById('staticBackdrop');
        modal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget; // Button that triggered the modal
            var uuid = button.getAttribute('data-uuid'); // Extract UUID
            var form = document.getElementById('cancelForm');
            var quoteIdInput = document.getElementById('quote_id'); // Get the input field for quote_id
            quoteIdInput.value = uuid; // Set the value of the input field
        });
    });
</script>
@endsection
@section('content')
<div class="d-flex justify-content-end align-items-center" style="display: flex; justify-content: right; align-items: center;">
    <a href="{{route('admin.quotation.create')}}" class="btn btn-primary"> <i class="align-middle" data-feather="plus-circle"></i> Create Quotation</a>
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
                    <th>Status</th>
                    <th>Email</th>
                    <th>Total</th>

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
                        <td>@if ($quote->rfq)
                            <a href="{{route('admin.rfq.preview', ['uuid'=>$quote->rfq->uuid])}}">{{$quote->rfq->RFQ_number}}</a>
                        @else
                            NO RFQ
                        @endif</td>
                        <td style="text-transform: capitalize">
                            {{$quote->client->last_name}} {{$quote->client->first_name}}
                        </td>

                        @php
                            $badgeClass = match($quote->status) {
                                'approved' => 'bg-success',
                                'draft' => 'bg-warning',
                                'rejected' => 'bg-danger',
                                'in-progress' => 'bg-info',
                                'completed' => 'bg-primary',
                                'sent' => 'bg-success',

                                default => 'bg-danger',
                            };
                        @endphp
                        <td>
                            <span class="badge {{$badgeClass}}"  style="text-transform: capitalize">
                                @if ($quote->is_cancelled)
                                    Cancelled
                                @else
                                {{$quote->status}}
                                @endif
                            </span>
                        </td>
                        <td style="text-transform: capitalize">
                            {{$quote->client->email}}
                        </td>
                        <td style="text-transform: capitalize">
                            {{number_format($quote->total, 2)}}
                        </td>



                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div class="dropdown">
                                    <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        Select Option
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                        @if ($quote->status != 'draft')
                                        <li><a class="dropdown-item" href="{{route('admin.quotation.send', ['quote_id'=>$quote->uuid])}}">Re-Send Mail</a></li>
                                        @else
                                        <li><a class="dropdown-item" href="{{route('admin.quotation.send', ['quote_id'=>$quote->uuid])}}">Send Mail</a></li>
                                        @endif
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
                                    <a href="{{route('admin.quotation.edit', ['uuid'=>$quote->uuid])}}" class="btn btn-success btn-sm">  <i class="align-middle" data-feather="edit"></i>
                                    Edit
                                    </a>
                                @endif



                                @if ( (Auth::user()->role->name == "admin" || Auth::user()->role->name == "super-admin") && $quote->status != 'draft')
                                    @if ($quote->is_cancelled)
                                    <a  class="btn btn-secondary btn-sm cancel-btn" type="button" class="btn btn-primary" disabled>  <i class="align-middle" data-feather="x"></i>
                                        Cancel Quotation
                                    </a>
                                    @else
                                    <a  class="btn btn-success btn-sm cancel-btn" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-uuid="{{ $quote->uuid }}" {{$quote->is_cancelled ? 'disabled' : ''}}>
                                        <i class="align-middle" data-feather="x"></i> Cancel Quotation
                                    </a>
                                    @endif
                                @endif

                                <a href="#" onclick="event.preventDefault();
                                        if (confirm('Are you sure you want to delete this?')) {
                                            document.getElementById('uuid').value = '{{$quote->uuid}}';
                                            document.getElementById('delete-quotation-form').submit();
                                        }"
                                    class="btn btn-danger btn-sm">
                                    <i class="align-middle" data-feather="trash-2"></i> 
                                     Delete
                                </a>
                            </div>

                            <!-- Hidden Form for Deletion -->
                            <form id="delete-quotation-form" action="{{ route('admin.quotation.delete') }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                                <input type="text" name="uuid" id="uuid">
                            </form>
                        </td>

                    </tr>

                @endforeach
            </tbody>
          </table>

          <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">Reason for cancelling</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('admin.quotation.cancel')}}" method="post" id="cancelForm">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="quote_id" id="quote_id">
                        <div class="mb-3">
                            <label for="reason" class="form-label">Reason</label>
                            <textarea class="form-control" id="reason" name="reason" rows="3" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Cancel</button>
                    </div>
                </form>
              </div>
            </div>
          </div>
    </div>
</div>
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
