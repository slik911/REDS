@extends('layouts.master-admin')
@section('title')
    Create Roles
@endsection
@section('content')
   <form action="{{route('admin.role.store')}}" method="post">
    @csrf
    <div class="row">
        <div class="mb-3 col-md-3">
            <label for="exampleFormControlInput1" class="form-label">Role Name</label>
            <input type="text" class="form-control col-md-8" id="name" name="name" placeholder="Enter Role Name">
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
   </form>
@endsection