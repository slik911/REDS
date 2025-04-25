@extends('layouts.master-admin')
@section('title')
    Roles
@endsection
@section('content')
<div class="d-flex justify-content-end align-items-center" style="display: flex; justify-content: right; align-items: center;">
    <a href="{{route('admin.role.create')}}" class="btn btn-primary"> <i class="align-middle" data-feather="plus-circle"></i> Create Role</a>
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
                @foreach ($roles as $role)
                    <tr>
                        <td>
                            <input type="checkbox" class="form-check-input">
                        </td>
                        <td style="text-transform: capitalize">
                            {{$role->name}}
                        </td>
                        <td>
                            @if ($role->status == 1)
                                <span class="badge bg-success">Active</span>

                            @else
                                <span class="badge bg-danger">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{route('admin.role.edit', ['uuid'=>$role->uuid])}}" class="btn btn-primary btn-sm"> <i class="align-middle" data-feather="edit"></i> Edit</a>
                            <a href="#"
                                onclick="event.preventDefault();
                                        if (confirm('Are you sure you want to delete this?')) {
                                            //dynamically parsing the current row id to the form
                                            document.getElementById('uuid').value = '{{$role->uuid}}';
                                            document.getElementById('delete-role-form').submit();}"
                                class="btn btn-sm btn-danger">
                                 <i class="align-middle" data-feather="trash-2"></i> Delete
                             </a>
                             <form id="delete-role-form" action="{{ route('admin.role.delete') }}" method="POST" style="display: none;">
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
