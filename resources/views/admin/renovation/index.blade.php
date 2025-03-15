@extends('layouts.master-admin')
@section('title')
    Renovations
@endsection
@section('content')
<div class="d-flex justify-content-end align-items-center" style="display: flex; justify-content: right; align-items: center;">
    <a href="{{route('admin.renovation.create')}}" class="btn btn-primary"> <i class="align-middle" data-feather="plus-circle"></i> Create Renovation</a>
</div>
<div class="row">
    <div class="col-12 mt-4">
        <table class="table table-bordered data-table nowrap table-responsive" style="width:100%">
            <thead>
                <tr>
                    <th></th>
                    <th>Date Created</th>
                    <th>Created By</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td>
                        <input type="checkbox" class="form-check-input">
                    </td>
                    <td>{{$post->created_at->format('M-d-Y')}}</td>
                    <td>{{$post->user->first_name}} {{$post->user->last_name}}</td>
                    <td>{{$post->title}}</td>
                    <td>
                        @if ($post->status == 1)
                            <span class="badge bg-success">Live</span>
                        @else
                            <span class="badge bg-warning">Disabled</span>
                        @endif
                    </td>
                    <td>
                        @if (Auth::user()->role->name == 'super-admin' || Auth::user()->role->name == 'admin')
                            @if ($post->status == 1)
                            <a href="{{route('admin.renovation.status.update', ["post_id"=>$post->uuid])}}" class="btn btn-warning btn-sm"> <i class="align-middle" data-feather="Check"></i>Disable</a>
                                
                            @else
                            <a href="{{route('admin.renovation.status.update', ["post_id"=>$post->uuid])}}" class="btn btn-success btn-sm"> <i class="align-middle" data-feather="Check"></i>Enable</a>
                            @endif
                        @endif
                        <a href="{{route('admin.renovation.edit', ["post_id"=>$post->uuid])}}" class="btn btn-primary btn-sm"><i class="align-middle" data-feather="pencil"></i>Edit</a>
                        {{-- <a href="{{route('admin.renovation.delete',  ["post_id"=>$post->uuid])}}" class="btn btn-danger btn-sm"><i class="align-middle" data-feather="trash-2"></i>Delete</a> --}}
                        <a href="#" 
                                onclick="event.preventDefault(); 
                                        if (confirm('Are you sure you want to delete this?')) { 
                                            //dynamically parsing the current row id to the form
                                            document.getElementById('uuid').value = '{{$post->uuid}}';
                                            document.getElementById('delete-renovation-form').submit();}" 
                                class="btn btn-danger btn-sm">
                                 <i class="align-middle" data-feather="trash-2"></i> Delete
                             </a>
                             <form id="delete-renovation-form" action="{{ route('admin.renovation.delete') }}" method="POST" style="display: none;">
                                 @csrf
                                 @method('DELETE')
                                 <input type="text" name="uuid" id="uuid">
                             </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tbody>

            </tbody>
          </table>
    </div>
</div>
@endsection