@extends('layouts.master-admin')
@section('title')
   Profile
@endsection
@section('content')
   <form action="{{route('admin.staff.update')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <input type="hidden" name="id" id="id" value="{{$staff->id}}">

                <div class="mb-3 col-md-6">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" class="form-control col-md-8" id="first_name" name="first_name" value="{{$staff->first_name ? $staff->first_name : old('first_name') }}" placeholder="Enter First Name">
                </div>
                <div class="mb-3 col-md-6">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" class="form-control col-md-8" id="last_name" name="last_name" value="{{$staff->last_name ? $staff->last_name : old('last_name') }}" placeholder="Enter Last Name">
                </div>

                <div class="mb-3 col-md-4">
                    <label for="phone_number" class="form-label">Phone Number</label>
                    <input type="text" class="form-control col-md-8" id="phone" name="phone_number" value="{{$staff->phone_number ? $staff->phone_number : old('phone_number') }}"  placeholder="Enter Phone Number">
                </div>

                <div class="mb-3 col-md-8">
                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                    <input type="text" class="form-control col-md-8" id="email" name="email" value="{{$staff->email ? $staff->email : old('email') }}" placeholder="Enter Email" readonly>
                </div>

                <div class="mb-3 col-md-12">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control col-md-8" id="address" name="address" value="{{$staff->address ? $staff->address : old('address') }}" placeholder="Enter Address">
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
                            <option value="{{ $province }}" {{ $staff->province == $province ? 'selected' : '' }}>
                                {{ $province }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="city" class="form-label">City</label>
                    <input type="text" class="form-control col-md-8" id="city" value="{{$staff->city ? $staff->city : old('city') }}" name="city" placeholder="Enter City">
                </div>

                <div class="mb-3 col-md-4">
                    <label for="post_code" class="form-label">Postal Code</label>
                    <input type="text" class="form-control " id="postal_code" value="{{$staff->postal_code ? $staff->postal_code : old('postal_code') }}" name="postal_code" placeholder="### ###">
                </div>

            </div>
        </div>
        <div class="col-md-3">
            <div class="mb-3">
                <div style="border:1px solid #ccc; height:240px" class="mb-3">
                    <img src="{{$staff->image_id ? $staff->image->url : ''}}" id="blah" alt="" class="img-fluid" style="height:100%; width:100%; object-fit:cover">
                </div>
                <input class="form-control" type="file" id="imageStaff" value="{{old('image')}}" name="image">

            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Save Changes</button>
   </form>

   <h2 class="mt-5">Update Password</h2>

   <div class="row">
        <form action="{{route('admin.profile.update.password')}}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3 col-md-6">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control col-md-8" id="password" name="password" value="">
            </div>
            <div class="mb-3 col-md-6">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control col-md-8" id="password_confirmation" name="password_confirmation" value="">
            </div>
                <button type="submit" class="btn btn-primary">Update Password</button>
        </form>
   </div>
@endsection

@section('scripts')
   <script>
        imageStaff.onchange = evt => {
            const [file] = imageStaff.files
            if (file) {
                blah.src = URL.createObjectURL(file)
            }
        }
   </script>
@endsection
