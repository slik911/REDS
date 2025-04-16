@extends('layouts.master-web')
@section('styles')
    <style>
    .jumbotron{
        background-image: url('../assets/Frame 3.png');
        background-position: center;
        background-size: cover;
        height:400px;
    }

    .page-link{
        color:#0A2540 !important;
    }

    .page-item.active .page-link {
    background-color: #0A2540 !important;
    color: #fff !important;
    border-color: #0A2540 !important;
}

</style>
@endsection
@section('content')
      <div class="jumbotron jumbotron-fluid d-flex align-items-center">
        <div class="container text-center">
          <h1 class="display-4">FAQ</h1>
          <nav class="breadcrumb-nav" aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html" class="text-white">Home</a></li>
            <li class="breadcrumb-item active text-white" aria-current="page">FAQ</li>
            </ol>
        </nav>
        </div>
      </div>

      <section class="faq">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="display-4 mt-5">We’ve Got Answers</h1>
                    <p>Looking for answers? We’ve gathered the most common questions about our services and how we work. Still need help? Don’t hesitate to reach out—we’re here for you</p>
                </div>
                <div class="col-12 mb-5">
                    <div class="accordion accordion-flush" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                <strong>what services does First Vision Contracting offer?</strong>
                            </button>
                            </h2>
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                            <div class="accordion-body">
                                We specialize in home renovation services including painting, drywalling, basement development, and tiling, as well as room rentals for tenants.
                            </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                              <strong>  How do I request a quote for a renovation project?</strong>
                            </button>
                            </h2>
                            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                Simply visit our <strong>“Get Quote”</strong> page, fill out the form with your project details, and we’ll get back to you with a personalized estimate.
                            </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                <strong>Are consultations free?</strong>
                            </button>
                            </h2>
                            <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                Yes! We offer free initial consultations to understand your project vision and provide accurate quotes.
                            </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree1" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                <strong>Do you handle both residential and commercial projects?</strong>
                            </button>
                            </h2>
                            <div id="panelsStayOpen-collapseThree1" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                Currently, we focus on residential renovations and property rentals, but we’re open to select small-scale commercial projects.
                            </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree2" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                <strong> How long does a typical renovation project take?</strong>
                            </button>
                            </h2>
                            <div id="panelsStayOpen-collapseThree2" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                Timelines vary depending on the project scope, but we’ll provide an estimated timeline during the quotation process.
                            </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree3" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                <strong>Do I need permits for my renovation project?</strong>
                            </button>
                            </h2>
                            <div id="panelsStayOpen-collapseThree3" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                Some renovations may require permits. We’ll guide you through the process and handle permit applications when necessary.
                            </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree4" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                <strong>What areas do you serve?</strong>
                            </button>
                            </h2>
                            <div id="panelsStayOpen-collapseThree4" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                We currently serve anywhere in Canada. For areas outside our region, please contact us for availability.
                            </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree5" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                <strong> How do I apply for a room rental?</strong>
                            </button>
                            </h2>
                            <div id="panelsStayOpen-collapseThree5" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                SYou can browse available rentals on our website and contact us through the listing page or submit an inquiry
                            </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree6" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                <strong>What’s included in the rental units?</strong>
                            </button>
                            </h2>
                            <div id="panelsStayOpen-collapseThree6" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                Amenities and features vary by property, but all units are clean, safe, and professionally managed.
                            </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree7" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                <strong>Are pets allowed in your rentals?</strong>
                            </button>
                            </h2>
                            <div id="panelsStayOpen-collapseThree7  " class="accordion-collapse collapse">
                            <div class="accordion-body">
                                This depends on the specific unit. Please check the listing or reach out to us for clarification.
                            </div>
                            </div>
                        </div>
                        </div>
                </div>
            </div>
        </div>
      </section>
@endsection
