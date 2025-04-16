@extends('layouts.master-web')
@section('styles')
    <style>
        .jumbotron{
            background-image: url('../assets/Frame 3.png');
            background-position: center;
            background-size: cover;
            height:400px;
        }
        h1 {
        text-align: center;
        }
        .principle {
        margin-bottom: 20px;
        }
  </style>
@endsection
@section('content')
      <div class="jumbotron jumbotron-fluid d-flex align-items-center">
        <div class="container text-center">
          <h1 class="display-4">Terms</h1>
          <nav class="breadcrumb-nav" aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html" class="text-white">Home</a></li>
            <li class="breadcrumb-item active text-white" aria-current="page">Terms</li>
            </ol>
        </nav>
        </div>
      </div>
      <section class="content">
        <div class="container my-5">
  <h1 class="text-center mb-4">Terms and Conditions</h1>
  <p class="text-center text-muted">Effective Date: May 1, 2025</p>

  <div class="accordion" id="termsAccordion">

    <!-- General Terms Section -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingGeneral">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseGeneral" aria-expanded="true" aria-controls="collapseGeneral">
          General Terms of Use
        </button>
      </h2>
      <div id="collapseGeneral" class="accordion-collapse collapse show" aria-labelledby="headingGeneral" data-bs-parent="#termsAccordion">
        <div class="accordion-body">
          <p><strong>Use of Website:</strong> You agree to use this website only for lawful purposes and not for any unauthorized, harmful, or misleading activity.</p>
          <p><strong>Service Requests:</strong> When requesting a quote or making a rental inquiry, you agree to provide accurate and truthful information.</p>
          <p><strong>Intellectual Property:</strong> All content on this website—including images, text, and branding—is the property of First Vision Contracting and may not be copied or used without permission.</p>
          <p><strong>Limitation of Liability:</strong> We strive to provide accurate information, but we do not guarantee that our site or services will be error-free. We are not liable for any direct or indirect damages arising from the use of our site or services.</p>
          <p><strong>Project Estimates:</strong> All quotations are based on the information provided and are subject to change after on-site inspection or changes in project scope.</p>
          <p><strong>Rental Listings:</strong> Rental availability is subject to change without notice. A formal rental agreement must be signed before occupancy.</p>
          <p><strong>Changes to Terms:</strong> We may update these terms as our business evolves. Continued use of the site indicates your acceptance of any revised terms.</p>
        </div>
      </div>
    </div>

    <!-- Quotation Terms Section -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingQuote">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseQuote" aria-expanded="false" aria-controls="collapseQuote">
          Terms and Conditions for Quotation
        </button>
      </h2>
      <div id="collapseQuote" class="accordion-collapse collapse" aria-labelledby="headingQuote" data-bs-parent="#termsAccordion">
        <div class="accordion-body">
          <p><strong>Validity:</strong> This quotation is valid for 30 days from the date issued. Prices and availability of materials or services are subject to change after the expiration date.</p>
          <p><strong>Scope of Work:</strong> The quotation is based solely on the details provided by the client. Any changes in project scope, materials, or design may result in a revised quotation. Detailed specifications will be discussed and agreed upon before project commencement.</p>
          <p><strong>Deposit & Payment:</strong> A deposit of [e.g., 30%] may be required to confirm the project. Final payment is due upon project completion unless otherwise agreed. All payments must be made via [accepted payment methods].</p>
          <p><strong>Site Access & Responsibilities:</strong> The client must ensure safe and timely access to the project site. Delays caused by the client (e.g., access, approvals) may affect the timeline and cost.</p>
          <p><strong>Exclusions:</strong> Unless explicitly stated, this quotation does not include permits, structural changes, or unforeseen repairs. Additional requests not covered in the quote will be billed separately.</p>
          <p><strong>Cancellation:</strong> Cancellation after project confirmation may result in a cancellation fee to cover costs already incurred.</p>
          <p><strong>Warranty:</strong> Workmanship is covered by a standard warranty of [e.g., 6 months/1 year] unless otherwise stated. Warranty does not cover damage caused by misuse, neglect, or modifications made by others.</p>
          <p><strong>Acceptance:</strong> By accepting this quotation, the client agrees to the above terms and authorizes First Vision Contracting to proceed with the project as outlined.</p>
          <p><strong>Contact:</strong> 📧 <a href="mailto:firstvisioncontracting@gmail.com">firstvisioncontracting@gmail.com</a><br>📞 +1-403-929-0333</p>
        </div>
      </div>
    </div>

  </div>
</div>
      </section>
@endsection
