@extends('layouts.master-admin')
@section('title')
    Preview - {{$rfq->title}}
@endsection
@section('content')
   <form action="{{route('admin.client.update')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-6">
            
            <div class="row">
                <div class="mb-3 col-md-12">
                    <label for="">RFQ Number</label>
                    <input type="text" name="rfq_number" class="form-control col-md-8" id="rfq_number"  readonly value="{{$rfq->RFQ_number}}">
                </div>
                <div class="mb-3 col-md-6">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" class="form-control col-md-8" id="first_name" name="first_name" readonly value="{{$rfq->client->first_name ? $rfq->client->first_name : old('first_name') }}" placeholder="Enter First Name" readonly>
                </div>
                <div class="mb-3 col-md-6">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" class="form-control col-md-8" id="last_name" name="last_name" readonly value="{{$rfq->client->last_name ? $rfq->client->last_name : old('last_name') }}" placeholder="Enter Last Name" readonly>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="phone_number" class="form-label">Phone Number</label>
                    <input type="text" class="form-control col-md-8" id="phone" name="phone_number" readonly value="{{$rfq->client->phone_number ? $rfq->client->phone_number : old('phone_number') }}"  placeholder="Enter Phone Number" readonly>
                </div>

                <div class="mb-3 col-md-8">
                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                    <input type="text" class="form-control col-md-8" id="email" name="email" readonly value="{{$rfq->client->email ? $rfq->client->email : old('email') }}" placeholder="Enter Email" readonly>
                </div>

                <div class="mb-3 col-md-12">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control col-md-8" id="address" readonly name="address" value="{{$rfq->client->address ? $rfq->client->address : old('address') }}" placeholder="Enter Address" readonly>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="province" class="form-label">Province</label>
                    <input type="text" class="form-control col-md-8" id="province" name="province" readonly value="{{$rfq->province}}" placeholder="Enter province" readonly>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="city" class="form-label">City</label>
                    <input type="text" class="form-control col-md-8" id="city" value="{{$rfq->city}}" readonly name="city" placeholder="Enter City">
                </div>

                <div class="mb-3 col-md-4">
                    <label for="post_code" class="form-label">Postal Code</label>
                    <input type="text" class="form-control " id="postal_code" value="{{$rfq->postal_code}}" readonly name="postal_code" placeholder="### ###">
                </div> 
            </div>
        </div>
        <div class="col-md-6">
            <label for="">Description</label>
            <textarea name="" id="" class="form-control" cols="30" readonly rows="10" value="{{$rfq->description}}">{{$rfq->description}}</textarea>
        </div>

    </div>
    <a href="{{route('admin.quotation')}}" class="btn btn-primary">Generate Quotation</a>
   </form>
@endsection

