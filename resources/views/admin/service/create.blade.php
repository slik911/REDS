@extends('layouts.master-admin')
@section('title')
    Create Services
@endsection
@section('content')
   <form action="{{route('admin.service.store')}}" method="post">
    @csrf
    <div class="row">
        <div class="mb-3 col-md-3">
            <label for="name" class="form-label">Service Name</label>
            <input type="text" class="form-control col-md-8" id="name" name="name" placeholder="Enter Service Name">
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
   </form>
@endsection