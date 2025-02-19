@extends('layouts.master-admin')
@section('title')
    Categories
@endsection
@section('content')
<div class="d-flex justify-content-end align-items-center" style="display: flex; justify-content: right; align-items: center;">
    <a href="{{route('admin.category.create')}}" class="btn btn-primary"> <i class="align-middle" data-feather="plus-circle"></i> Create Category</a>
</div>
<div class="row">
    <div class="col-12 mt-4">
        <table class="table table-bordered data-table nowrap table-responsive" style="width:100%">
            <thead>
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>
                            <input type="checkbox" class="form-check-input">
                        </td>
                        <td style="text-transform: capitalize">
                            {{$category->name}}
                        </td>
                        <td>
                            @if ($category->status == 1)
                                <span class="badge bg-success">Active</span>
                                
                            @else
                                <span class="badge bg-danger">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{route('admin.category.edit', ['uuid'=>$category->uuid])}}" class="btn btn-primary"> <i class="align-middle" data-feather="edit"></i> Edit</a>
                            <a href="#" 
                                onclick="event.preventDefault(); 
                                        if (confirm('Are you sure you want to delete this?')) { 
                                            //dynamically parsing the current row id to the form
                                            document.getElementById('uuid').value = '{{$category->uuid}}';
                                            document.getElementById('delete-category-form').submit();}" 
                                class="btn btn-danger">
                                 <i class="align-middle" data-feather="trash-2"></i> Delete
                             </a>
                             <form id="delete-category-form" action="{{ route('admin.category.delete') }}" method="POST" style="display: none;">
                                 @csrf
                                 @method('DELETE')
                                 <input type="text" name="uuid" id="uuid">
                             </form>
                        </td>
                    </tr>
                    
                @endforeach
            </tbody>
          </table>
    </div>
</div>
@endsection