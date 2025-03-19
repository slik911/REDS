@extends('layouts.master-admin')
@section('title')
    Create Services
@endsection
@section('content')
   <form action="{{route('admin.service.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3 col-md-12">
                <label for="name" class="form-label">Service Name</label>
                <input type="text" class="form-control col-md-8" id="name" name="name" placeholder="Enter Service Name">
            </div>
       
            <div class="mb-3 col-md-12">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="" class="form-control" cols="30" rows="10"></textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3 col-md-6">
                <div style="border:1px solid #ccc; height:240px" class="mb-3">
                    <img src="" id="blah" alt="" class="img-fluid" style="height:100%; width:100%; object-fit:cover">
                </div>
                <input class="form-control" type="file" id="imageStaff" value="{{old('image')}}" name="image">
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
   </form>
@endsection
@section('scripts')
   <script>
        imageStaff.onchange = evt => {
            const [file] = imageStaff.files
            if (file) {
                blah.src = URL.createObjectURL(file)
            }
        }
   </script>
    
@endsection