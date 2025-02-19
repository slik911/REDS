@extends('layouts.master-admin')
@section('title')
    Clients
@endsection
@section('content')

<div class="d-flex justify-content-end align-items-center" style="display: flex; justify-content: right; align-items: center;">
    <a href="{{route('admin.client.create')}}" class="btn btn-primary"> <i class="align-middle" data-feather="plus-circle"></i> Create Client</a>
</div>
<div class="row">
    <div class="col-12 mt-4">
        <table class="table table-bordered data-table nowrap table-responsive" style="width:100%">
            <thead>
                <tr>
                    <th></th>
                    <th>Date Created</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>

         

                @foreach ($client as $user)
                    <tr> 
                        <td>
                            <input type="checkbox" class="form-check-input">
                        </td> 
                        <td>{{$user->created_at->format('M-d-Y')}}</td>
                        <td style="text-transform:capitalize">{{$user->last_name}} {{$user->first_name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{ preg_replace("/(\d{3})(\d{3})(\d{4})/", '($1)-$2-$3', $user->phone_number)}}</td>
                        <td>
                            <a href="{{route('admin.client.edit', ['uuid'=>$user->uuid])}}" class="btn btn-primary"> <i class="align-middle" data-feather="edit"></i> Preview</a>
                            <a href="#" 
                                onclick="event.preventDefault(); 
                                        if (confirm('Are you sure you want to delete this?')) { 
                                            //dynamically parsing the current row id to the form
                                            document.getElementById('uuid').value = '{{$user->uuid}}';
                                            document.getElementById('delete-client-form').submit();}" 
                                class="btn btn-danger">
                                 <i class="align-middle" data-feather="trash-2"></i> Delete
                             </a>
                             <form id="delete-client-form" action="{{route('admin.client.delete')}}" method="POST" style="display: none;">
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