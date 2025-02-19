@extends('layouts.master-admin')
@section('title')
    Edit client
@endsection
@section('content')
   <form action="{{route('admin.client.update')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <input type="hidden" name="id" id="id" value="{{$client->id}}">

                <div class="mb-3 col-md-6">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" class="form-control col-md-8" id="first_name" name="first_name" value="{{$client->first_name ? $client->first_name : old('first_name') }}" placeholder="Enter First Name">
                </div>
                <div class="mb-3 col-md-6">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" class="form-control col-md-8" id="last_name" name="last_name" value="{{$client->last_name ? $client->last_name : old('last_name') }}" placeholder="Enter Last Name">
                </div>

                <div class="mb-3 col-md-4">
                    <label for="phone_number" class="form-label">Phone Number</label>
                    <input type="text" class="form-control col-md-8" id="phone" name="phone_number" value="{{$client->phone_number ? $client->phone_number : old('phone_number') }}"  placeholder="Enter Phone Number">
                </div>

                <div class="mb-3 col-md-8">
                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                    <input type="text" class="form-control col-md-8" id="email" name="email" value="{{$client->email ? $client->email : old('email') }}" placeholder="Enter Email">
                </div>

                <div class="mb-3 col-md-12">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control col-md-8" id="address" name="address" value="{{$client->address ? $client->address : old('address') }}" placeholder="Enter Address">
                </div>

                <div class="mb-3 col-md-4">
                    <label for="province" class="form-label">Province</label>
                    <select name="province" id="provinces" class="form-select" aria-label="Default select example">
                        @php
                            $provinces = [
                                'Alberta', 'British Columbia', 'Manitoba', 'New Brunswick', 'Newfoundland and Labrador',
                                'Nova Scotia', 'Ontario', 'Prince Edward Island', 'Quebec', 'Saskatchewan',
                                'Northwest Territories', 'Nunavut', 'Yukon'
                            ];
                        @endphp

                        @foreach ($provinces as $province)
                            <option value="{{ $province }}" {{ $client->province == $province ? 'selected' : '' }}>
                                {{ $province }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="city" class="form-label">City</label>
                    <input type="text" class="form-control col-md-8" id="city" value="{{$client->city ? $client->city : old('city') }}" name="city" placeholder="Enter City">
                </div>

                <div class="mb-3 col-md-4">
                    <label for="post_code" class="form-label">Postal Code</label>
                    <input type="text" class="form-control " id="postal_code" value="{{$client->postal_code ? $client->postal_code : old('postal_code') }}" name="postal_code" placeholder="### ###">
                </div>
                

            </div>
        </div>

    </div>
    <button type="submit" class="btn btn-primary">Save Changes</button>
   </form>
@endsection

