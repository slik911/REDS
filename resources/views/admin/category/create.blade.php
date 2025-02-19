@extends('layouts.master-admin')
@section('title')
    Create Categories
@endsection
@section('content')
   <form action="{{route('admin.category.store')}}" method="post">
    @csrf
    <div class="row">
        <div class="mb-3 col-md-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" class="form-control col-md-8" id="name" name="name" placeholder="Enter Category Name">
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
   </form>
@endsection