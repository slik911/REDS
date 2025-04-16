@extends('layouts.master-web')
@section('styles')
    <style>
        .jumbotron{
            background-image: url('../assets/Frame 3.png');
            background-position: center;
            background-size: cover;
            height:400px;
        }
  </style>
@endsection
@section('content')
      <div class="jumbotron jumbotron-fluid d-flex align-items-center">
        <div class="container text-center">
          <h1 class="display-4">Privacy Policy</h1>
          <nav class="breadcrumb-nav" aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html" class="text-white">Home</a></li>
            <li class="breadcrumb-item active text-white" aria-current="page">FAQ</li>
            </ol>
        </nav>
        </div>
      </div>
      <section class="privacy ">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mx-auto mt-5 mb-5">
                    <h1 class="display-5 text-center">Our Privacy Committment</h1>
                    <p class="text-center">This policy outlines how user data is collected, stored, and used</p>
                    <p><b>Privacy Policy – First Vision Contracting</b></p>
                    <p>Effective Date: May 1, 2025</p>
                    <p>First Vision Contracting ("we", "our", or "us") is committed to protecting your privacy. This Privacy Policy outlines how we collect, use, and safeguard your personal information when you interact with our website and services.</p>
                    <p><b>Information We Collect</b></p>
                    <p>We collect personal information that you voluntarily provide when:</p>
                    <ul>
                        <li>Requesting a quotation</li>
                        <li>Submitting inquiries through our contact forms</li>
                        <li>Registering for updates or renting a unit</li>
                    </ul>

                    <p>
                        This may include your name, email, phone number, address, project details, and any other information you submit.
                    How We Use Your Information
                    We use your information to:
                    </p>
                    <ul>
                        <li>Process service requests and quotation</li>
                        <li>Communicate with you regarding your inquiries or bookings</li>
                        <li>Improve our website and services</li>
                        <li>Maintain business records and customer communications</li>
                    </ul>

                    <p><b>Data Protection</b></p>
                    <p>We use industry-standard security measures to protect your personal information from unauthorized access, disclosure, or alteration.</p>
                    <p><b>Third-Party Services</b></p>
                    <p>We do not sell your information. We may share data with service providers (e.g., for email or image hosting) strictly for operational purposes and only if they comply with privacy regulations.</p>
                    <p><b>Cookies</b></p>
                    Our website may use cookies to improve user experience. You can control cookie settings in your browser.
                    <p><b>Your Rights</b></p>
                    <p> You may request access to, correction of, or deletion of your data by contacting us at firstvisioncontracting@gmail.com</p>
                    <p><b>Changes to This Policy</b></p>
                    <p>We may update this Privacy Policy as needed. All changes will be posted on this page with a revised effective date.</p>
                </div>
            </div>
        </div>
      </section>
@endsection
