@extends('layouts.master-admin')
@section('title')
    Testimonials
@endsection
@section('content')
<div class="d-flex justify-content-end align-items-center" style="display: flex; justify-content: right; align-items: center;">
    <a href="{{route('admin.testimonial.create')}}" class="btn btn-primary"> <i class="align-middle" data-feather="plus-circle"></i> Create Testimonials</a>
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
                @foreach ($testimonials as $testimonial)
                    <tr>
                        <td>
                            <input type="checkbox" class="form-check-input">
                        </td>
                        <td style="text-transform: capitalize">
                            {{$testimonial->client->first_name}} {{$testimonial->client->last_name}}
                        </td>
                        <td>
                            @if ($testimonial->status == 1)
                                <span class="badge bg-success">live</span>
                                
                            @else
                                <span class="badge bg-warning">Pending</span>
                            @endif
                        </td>
                        <td>
                            @if ($testimonial->status == 1)
                                <a href="{{route('admin.testimonial.status', ['uuid'=>$testimonial->uuid])}}" class="btn btn-primary btn-sm"> <i class="align-middle" data-feather="eye-off"></i> Hide</a>
                                
                            @else
                                <a href="{{route('admin.testimonial.status', ['uuid'=>$testimonial->uuid])}}" class="btn btn-primary btn-sm"> <i class="align-middle" data-feather="eye"></i> Show</a>
                            @endif
                            <a href="{{route('admin.testimonial.preview', ['uuid'=>$testimonial->uuid])}}" class="btn btn-primary btn-sm"> <i class="align-middle" data-feather="eye"></i> Preview</a>
                            <a href="{{route('admin.testimonial.edit', ['uuid'=>$testimonial->uuid])}}" class="btn btn-primary btn-sm"> <i class="align-middle" data-feather="edit"></i> Edit</a>
                            <a href="#" 
                                onclick="event.preventDefault(); 
                                        if (confirm('Are you sure you want to delete this?')) { 
                                            //dynamically parsing the current row id to the form
                                            document.getElementById('uuid').value = '{{$testimonial->uuid}}';
                                            document.getElementById('delete-testimonial-form').submit();}" 
                                class="btn btn-danger btn-sm">
                                 <i class="align-middle" data-feather="trash-2"></i> Delete
                             </a>
                             <form id="delete-testimonial-form" action="{{ route('admin.testimonial.delete') }}" method="POST" style="display: none;">
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