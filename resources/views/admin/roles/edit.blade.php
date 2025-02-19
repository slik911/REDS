@extends('layouts.master-admin')
@section('title')
    Edit Role
@endsection
@section('content')
   <form action="{{route('admin.role.update')}}" method="post">
    @csrf
    @method('PUT')
    <input type="hidden" class="form-control" name="uuid" id="uuid" value="{{$role->uuid}}">
    <div class="row">
        <div class="mb-3 col-md-3">
            <label for="exampleFormControlInput1" class="form-label">Role Name</label>
            <input type="text" class="form-control col-md-8" id="name" name="name" value="{{$role->name}}" placeholder="Enter Role Name">
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
   </form>
@endsection