@extends('layouts.master-admin')
@section('title')
    Create Rentals
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
   <form action="{{route('admin.rentals.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-7">
           

            <div class="row">
                <div class="mb-3 col-md-8">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control col-md-12" id="title" name="title" value="{{ old('title') }}" placeholder="Enter title">
                </div>
                <div class="mb-3 col-md-4">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" class="form-control col-md-12" id="price" name="price" value="{{ old('price') }}" placeholder="Enter price">
                </div>
                <div class="mb-3 col-md-4">
                    <label for="province" class="form-label">Province</label>
                    <select name="province" id="provinces" class="form-select" aria-label="Default select example">
                        <option value="Alberta">Alberta</option>
                        <option value="British Columbia">British Columbia</option>
                        <option value="Manitoba">Manitoba</option>
                        <option value="New Brunswick">New Brunswick</option>
                        <option value="Newfoundland and Labrador">Newfoundland and Labrador</option>
                        <option value="Nova Scotia">Nova Scotia</option>
                        <option value="Ontario">Ontario</option>
                        <option value="Prince Edward Island">Prince Edward Island</option>
                        <option value="Quebec">Quebec</option>
                        <option value="Saskatchewan">Saskatchewan</option>
                        <option value="Northwest Territories">Northwest Territories</option>
                        <option value="Nunavut">Nunavut</option>
                        <option value="Yukon">Yukon</option>
                    </select>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="city" class="form-label">City</label>
                    <input type="text" class="form-control col-md-8" id="city" value="{{old('city') }}" name="city" placeholder="Enter City">
                </div>

                <div class="mb-3 col-md-4">
                    <label for="post_code" class="form-label">Postal Code</label>
                    <input type="text" class="form-control " id="postal_code" value="{{old('postal_code') }}" name="postal_code" placeholder="### ###">
                </div>
            </div>
            


            <div class="mb-3 col-md-12">
                <label class="form-label">Features</label>
                <div id="features-container">
                    <!-- First Feature Row -->
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
                            <button type="button" class="btn btn-primary add-feature">+</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-3 col-md-12">
                <input type="hidden" name="description" id="content-field">
                <label for="description">Description</label>
                <trix-toolbar id="my_toolbar"></trix-toolbar>
                <input id="my_input" type="hidden" name="description" value="{{ old('description') }}">
                <trix-editor toolbar="my_toolbar" input="my_input" style="min-height: 150px;"></trix-editor>
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
    <button type="submit" class="btn btn-primary">Create Rentals Post</button>
   </form>
@endsection