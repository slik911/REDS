@extends('layouts.master-web')
@section('content')

    <!--Carousel-->
    <div class="carousel-item active c-item">
        <img src="./assets/Frame 3.png" class="d-block w-100 c-img" alt="carousel1">
        <div class="carousel-caption cbanner-caption">
            <h1>Get a quote for your project</h1>

            <nav class="breadcrumb-nav" aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/" class="text-white">Home</a></li>
                <li class="breadcrumb-item active text-white" aria-current="page">Qoute</li>
                </ol>
            </nav>
        </div>
    </div>

    <!--Request for Quotation-->
   <section style="margin-top: 600px">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2 class="text-center mb-4">Request for Quotation</h2>
        <p class="text-center mb-4">Fill out the form below to request a quote for your project. Provide as much detail as possible so we can better understand your needs and get back to you promptly.</p>

        <form class="row g-3 needs-validation" novalidate action="{{route('admin.rfq.store')}}" id="form-rfq" method="POST">
            @csrf
            <div class="col-md-6">
                <label for="firstName" class="form-label required">First Name</label>
                <input type="text" class="form-control" id="firstName" name="first_name" placeholder="first name" required>
                <div class="invalid-feedback">Please enter your first name.</div>
            </div>
            <div class="col-md-6">
                <label for="lastName" class="form-label required">Last Name</label>
                <input type="text" class="form-control" id="lastName" name="last_name" placeholder="last name" required>
                <div class="invalid-feedback">Please enter your last name.</div>
            </div>
            <div class="col-md-12">
                <label for="address" class="form-label required">Address</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Eg: 314 2nd Street South" required>
                <div class="invalid-feedback">Please enter your address.</div>
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label required">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="example@gmail.com"required>
                <div class="invalid-feedback">Please enter a valid email.</div>
            </div>
            <div class="col-md-6">
                <label for="phone" class="form-label required">Phone</label>
                <input type="tel" class="form-control" id="phone" name="phone_number" pattern="[0-9]{10}" maxlength="10" placeholder="(213) 456-7890" required>
                <div class="invalid-feedback">Please enter a valid 10-digit phone number.</div>
            </div>
            <div class="col-md-6">
                <label for="city" class="form-label required">City</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="Eg: Lethbridge" required>
                <div class="invalid-feedback">Please enter your city.</div>
            </div>
            <div class="col-md-3">
                <label for="province" class="form-label required">Province</label>
                <select class="form-select form-control" id="province" name="province" required>
                    <option value="">Choose...</option>
                    <option value="AB">Alberta</option>
                    <option value="BC">British Columbia</option>
                    <option value="MB">Manitoba</option>
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
                <div class="invalid-feedback">Please select your province.</div>
            </div>
            <div class="col-md-3">
                <label for="postalCode" class="form-label required">Postal Code</label>
                <input type="text" class="form-control" id="postalCode" name="postal_code" placeholder="Eg: A9A 9A9"  minlength="6"
                maxlength="6"  required>
                <div class="invalid-feedback">Please enter your postal code.</div>
            </div>
            <div class="col-md-12">
                <label for="requestTitle" class="form-label required">Project Title</label>
                <input type="text" class="form-control" id="requestTitle" name="title" placeholder="Eg: Basement renovation, Kitchen renovation, Full house painting,etc." required>
                <div class="invalid-feedback">Please provide a request title.</div>
            </div>
            <div class="col-md-12">
                <label for="issueSummary" class="form-label required">Project Description</label>
                <textarea class="form-control" id="issueSummary" rows="4" name="description" placeholder="Describe project here" required></textarea>
                <div class="invalid-feedback">Please provide an issue summary.</div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-custom">Submit Request</button>
            </div>
        </form>
            </div>
        </div>
    </div>
   </section>
@endsection
