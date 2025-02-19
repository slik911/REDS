@extends('layouts.master-admin')
@section('title')
    Create Staff
@endsection
@section('content')
   <form action="{{route('admin.staff.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" class="form-control col-md-8" id="first_name" name="first_name" value="{{ old('first_name') }}" placeholder="Enter First Name">
                </div>
                <div class="mb-3 col-md-6">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" class="form-control col-md-8" id="last_name" name="last_name" value="{{old('last_name') }}" placeholder="Enter Last Name">
                </div>

                <div class="mb-3 col-md-4">
                    <label for="phone_number" class="form-label">Phone Number</label>
                    <input type="text" class="form-control col-md-8" id="phone" name="phone_number" value="{{old('phone_number') }}"  placeholder="Enter Phone Number">
                </div>

                <div class="mb-3 col-md-8">
                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                    <input type="text" class="form-control col-md-8" id="email" name="email" value="{{old('email') }}" placeholder="Enter Email">
                </div>

                <div class="mb-3 col-md-12">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control col-md-8" id="address" name="address" value="{{old('address') }}" placeholder="Enter Address">
                </div>

                <div class="mb-3 col-md-4">
                    <label for="province" class="form-label">Province</label>
                    <select name="province" id="provinces" class="form-select" aria-label="Default select example">
                        <option value="Alberta">Alberta</option>
                        <option value="British Columbia">British Columbia</option>
                        <option value="Manitoba">Manitoba</option>
                        <option value="New Brunswick">New Brunswick</option>
                        <option value="Newfoundland and Labrador">Newfoundland and Labrador</option>
                        <option value="Nova Scotia">Nova Scotia</option>
                        <option value="Ontario">Ontario</option>
                        <option value="Prince Edward Island">Prince Edward Island</option>
                        <option value="Quebec">Quebec</option>
                        <option value="Saskatchewan">Saskatchewan</option>
                        <option value="Northwest Territories">Northwest Territories</option>
                        <option value="Nunavut">Nunavut</option>
                        <option value="Yukon">Yukon</option>
                    </select>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="city" class="form-label">City</label>
                    <input type="text" class="form-control col-md-8" id="city" value="{{old('city') }}" name="city" placeholder="Enter City">
                </div>

                <div class="mb-3 col-md-4">
                    <label for="post_code" class="form-label">Postal Code</label>
                    <input type="text" class="form-control " id="postal_code" value="{{old('postal_code') }}" name="postal_code" placeholder="### ###">
                </div>
                
                <div class="mb-3 col-md-4">
                    <label for="role" class="form-label">Role</label>
                    <select name="role" id="role" class="form-select" aria-label="Default select example">
                        <option value="">Choose Role</option>
                        @foreach ($roles as $role)
                            <option value="{{$role->id}}"  style="text-transform: capitalize">{{$role->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="mb-3">
                <div style="border:1px solid #ccc; height:240px" class="mb-3">
                    <img src="" id="blah" alt="" class="img-fluid" style="height:100%; width:100%; object-fit:cover">
                </div>
                <input class="form-control" type="file" id="imageStaff" value="{{old('image')}}" name="image">
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Create New Staff</button>
   </form>
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