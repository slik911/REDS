@extends('layouts.master-admin')
@section('title')
    Services
@endsection
@section('content')
<div class="d-flex justify-content-end align-items-center" style="display: flex; justify-content: right; align-items: center;">
    <a href="{{route('admin.service.create')}}" class="btn btn-primary"> <i class="align-middle" data-feather="plus-circle"></i> Create Service</a>
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
                @foreach ($services as $service)
                    <tr>
                        <td>
                            <input type="checkbox" class="form-check-input">
                        </td>
                        <td style="text-transform: capitalize">
                            {{$service->name}}
                        </td>
                        <td>
                            @if ($service->status == 1)
                                <span class="badge bg-success">Active</span>
                                
                            @else
                                <span class="badge bg-danger">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{route('admin.service.edit', ['uuid'=>$service->uuid])}}" class="btn btn-primary btn-sm"> <i class="align-middle" data-feather="edit"></i> Edit</a>
                            <a href="#" 
                                onclick="event.preventDefault(); 
                                        if (confirm('Are you sure you want to delete this?')) { 
                                            //dynamically parsing the current row id to the form
                                            document.getElementById('uuid').value = '{{$service->uuid}}';
                                            document.getElementById('delete-service-form').submit();}" 
                                class="btn btn-danger btn-sm">
                                 <i class="align-middle" data-feather="trash-2"></i> Delete
                             </a>
                             <form id="delete-service-form" action="{{ route('admin.service.delete') }}" method="POST" style="display: none;">
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