@extends('layouts.master-admin')
@section('title')
    Update Renovation - {{$post->title}}
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
            // $("#preview-container").empty();

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
            var postId = $(this).siblings("img").data("post-id");
           if(postId){
                deleteImage(postId, $(this).siblings("img").attr("src"));
           }
           else{
                $(this).closest(".preview").remove();
           }
        });


        function deleteImage(postId, url) {
        $(button).prop('disabled', true).text('Deleting...');
        $.ajax({
            url: '/delete/image',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                post_id: postId, // ID of the image record in the database
                url: url // The Cloudinary URL of the image
            },
            success: function(response) {
                if (response.success) {
                    console.log(response.message);
                    // Optionally, remove the image from the DOM after successful deletion
                    $(this).closest(".preview").remove();
                    setTimeout(function () {
                    location.reload();
                }, 500);
                } else {
                    $(button).prop('disabled', false).text('Delete');
                    alert(response.message);
                }
            },
            error: function() {
                $(button).prop('disabled', false).text('Delete');
                alert('An error occurred while deleting the image.');
            }
        });
    }

    
    $("#features-container").on("click", ".add-feature", function () {
        let featureRow = `
            <div class="row feature-row mb-2">
                <div class="col-md-5">
                    <select name="features[]" class="form-select">
                        <option value="Living Room">Living Room </option>
                                <option value="Bedrooms">Bedrooms</option>
                                <option value="Bathrooms">Bathrooms</option>
                                <option value="Parking">Parking</option>
                                <option value="WiFi">WiFi</option>
                                <option value="Swimming Pool">Swimming Pool</option>
                                <option value="Gym">Gym</option>
                                <option value="Pet Friendly">Pet Friendly</option>
                                <option value="Heating">Heating</option>
                                <option value="Air Conditioning">Air Conditioning</option>
                                <option value="Electricity">Electricity</option>
                                <option value="Laundry">Laundry</option>
                                <option value="Furnished">Furnished</option>
                                <option value="Garage">Garage</option>
                                <option value="Security System">Security System</option>
                                <option value="Floor Level">Floor Level</option>
                                <option value="Walk-in Closet">Walk-in Closet</option>
                                <option value="Balcony">Balcony</option>
                    </select>
                </div>
                <div class="col-md-5">
                    <input type="text" name="feature_descriptions[]" class="form-control" placeholder="Enter feature description">
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-danger remove-feature">&times;</button>
                </div>
            </div>`;
        $("#features-container").append(featureRow);
    });

    // Remove feature row
    $("#features-container").on("click", ".remove-feature", function () {
        $(this).closest(".feature-row").remove();
    });


});


</script>
@endsection
@section('content')
   <form action="{{route('admin.rentals.update')}}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="post_id" value="{{$post->uuid}}">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-md-7">
            <div class="row">
                <div class="mb-3 col-md-8">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control col-md-12" id="title" name="title" value="{{$post->title}}" placeholder="Enter title">
                </div>
                <div class="mb-3 col-md-4">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" class="form-control col-md-12" id="price" name="price" value="{{$post->rental->price}}" placeholder="Enter price">
                </div>
                <div class="mb-3 col-md-4">
                    <label for="province" class="form-label">Province</label>
                    <select name="province" id="provinces" class="form-select" aria-label="Default select example">
                        @php
                            $provinces = [
                                'Alberta', 'British Columbia', 'Manitoba', 'New Brunswick', 'Newfoundland and Labrador',
                                'Nova Scotia', 'Ontario', 'Prince Edward Island', 'Quebec', 'Saskatchewan',
                                'Northwest Territories', 'Nunavut', 'Yukon'
                            ];
                        @endphp

                        @foreach ($provinces as $province)
                            <option value="{{ $province }}" {{ $post->rental->province == $province ? 'selected' : '' }}>
                                {{ $province }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="city" class="form-label">City</label>
                    <input type="text" class="form-control col-md-8" id="city" value="{{$post->rental->city}}" name="city" placeholder="Enter City">
                </div>

                <div class="mb-3 col-md-4">
                    <label for="post_code" class="form-label">Postal Code</label>
                    <input type="text" class="form-control " id="postal_code" value="{{$post->rental->postal_code}}" name="postal_code" placeholder="### ###">
                </div>
            </div>



            <div class="mb-3 col-md-12">
                <label class="form-label">Features</label>
                <div id="features-container">
                    @php
                            $features = [
                                "Living Room","Bedrooms","Bathrooms","Parking","WiFi", "Swimming Pool","Gym","Pet Friendly","Heating","Air Conditioning","Electricity","Laundry","Furnished","Garage", "Security System","Floor Level","Walk-in Closet","Balcony"
                            ];

                            $count = 0;
                    @endphp
        
                    @foreach (json_decode($post->rental->meta_data) as $key => $value)
        
                    <div class="row feature-row mb-2">
                        <div class="col-md-5">
                            <select name="features[]" class="form-select">
                                @foreach ($features as $feature)
                                    <option value="{{ $feature }}" {{ $feature == $key ? 'selected' : '' }}>
                                        {{ $feature }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-5">
                            <input type="text" name="feature_descriptions[]" class="form-control" placeholder="Enter feature description" value="{{$value}}">
                        </div>
                        <div class="col-md-2">
                            @if ($count == 0)
                                <button type="button" class="btn btn-primary add-feature" id="add-feature">+</button>
                                @php
                                    $count++;
                                @endphp
                            @else
                                <button type="button" class="btn btn-danger remove-feature">&times;</button>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="mb-3 col-md-12">
                <input type="hidden" name="description" id="content-field">
                <label for="description">Description</label>
                <trix-toolbar id="my_toolbar"></trix-toolbar>
                <input id="my_input" type="hidden" name="description" value="{{$post->description}}">
                <trix-editor toolbar="my_toolbar" input="my_input" style="min-height: 300px;">
                    
                </trix-editor>

            </div>
        </div>
        <div class="col-md-5">
            <div class="mb-3">
                <label for="file-input" class="form-label">Select Images</label>
                <input type="file" class="form-control" id="file-input" name="images[]" multiple>
            </div>
            <div class="row preview-container" id="preview-container">
                @foreach ($post->uploads as $uploads)
                <div class="col-6 col-md-3 preview">
                    <div class="card">
                        <img src="{{$uploads->url}}" data-post-id="{{$post->uuid}}" class="card-img-top">
                        <button type="button" class="delete-btn">&times;</button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Update Rental Post</button>
   </form>
@endsection