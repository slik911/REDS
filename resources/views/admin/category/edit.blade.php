@extends('layouts.master-admin')
@section('title')
    Edit Categories
@endsection
@section('content')
   <form action="{{route('admin.category.update')}}" method="post">
    @csrf
    @method('PUT')
    <input type="hidden" class="form-control" name="uuid" id="uuid" value="{{$category->uuid}}">
    <div class="row">
        <div class="mb-3 col-md-3">
            <label for="exampleFormControlInput1" class="form-label">Category Name</label>
            <input type="text" class="form-control col-md-8" id="name" name="name" value="{{$category->name}}" placeholder="Enter Category Name">
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
   </form>
@endsection