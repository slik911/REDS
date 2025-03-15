@extends('layouts.master-admin')
@section('title')
    Create Renovation
@endsection

@section('styles')
<style>
.preview-container {
    display: flex;
    flex-wrap: wrap;
}
.preview {
    position: relative;
    padding: 5px;
}
.preview img {
    width: 100%;
    height: 150px;
    object-fit: cover;
    border-radius: 5px;
}
.delete-btn {
    position: absolute;
    top: 5px;
    right: 10px;
    background-color: rgba(255, 0, 0, 0.8);
    color: white;
    border: none;
    border-radius: 50%;
    width: 25px;
    height: 25px;
    font-size: 16px;
    line-height: 1;
    cursor: pointer;
}
.delete-btn:hover {
    background-color: red;
}
</style>
@endsection

@section('scripts')



<script>
     $(document).ready(function () {
        $("#file-input").on("change", function () {
            var files = $(this)[0].files;
            $("#preview-container").empty();

            if (files.length > 0) {
                for (let i = 0; i < files.length; i++) {
                    let reader = new FileReader();
                    reader.onload = function (e) {
                        let previewHTML = `
                            <div class="col-6 col-md-3 preview">
                                <div class="card">
                                    <img src="${e.target.result}" class="card-img-top">
                                    <button type="button" class="delete-btn">&times;</button>
                                </div>
                            </div>`;
                        $("#preview-container").append(previewHTML);
                    };
                    reader.readAsDataURL(files[i]);
                }
            }
        });

        $("#preview-container").on("click", ".delete-btn", function () {
            $(this).closest(".preview").remove();
            $("#file-input").val(""); // Clear input value if needed
        });



});


</script>
@endsection
@section('content')
   <form action="{{route('admin.renovation.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-7">
            <div class="mb-3 col-md-12">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control col-md-12" id="title" name="title" value="{{ old('title') }}" placeholder="Enter title">
            </div>
            <div class="mb-3 col-md-12">
                <input type="hidden" name="description" id="content-field">
                <label for="description">Description</label>
                <trix-toolbar id="my_toolbar"></trix-toolbar>
                <input id="my_input" type="hidden" name="description" value="{{ old('description') }}">
                <trix-editor toolbar="my_toolbar" input="my_input" style="min-height: 300px;"></trix-editor>

            </div>
        </div>
        <div class="col-md-5">
            <div class="mb-3">
                <label for="file-input" class="form-label">Select Images</label>
                <input type="file" class="form-control" id="file-input" name="images[]" multiple>
            </div>
            <div class="row preview-container" id="preview-container"></div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Create Renovation Post</button>
   </form>
@endsection