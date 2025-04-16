@extends('layouts.master-web')
@section('content')
        <!--Carousel Banner-->
        <div id="home-carousel" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active c-item">
              <img
                src="{{asset('assets/Frame 3.png')}}"
                class="d-block w-100 c-img"
                alt="carousel1"
              />
              <div class="carousel-caption cbanner-caption">
                <h1>CONTACT US</h1>

                        <nav class="breadcrumb-nav" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/" class="text-white">Home</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">Contact</li>
                            </ol>
                        </nav>
              </div>
            </div>
          </div>
          <span type="button" data-bs-target="#home-carousel"></span>
        </div>

        <!--Contact Form-->
        <div class="container mt-5">
          <h2 class="text-center mb-4">GET IN TOUCH</h2>
          <p class="text-center mb-4 col-md-8 mx-auto">
            Whether you're renovating your space or searching for a rental, we’re
            here to deliver reliable, professional service every step of the way.
            Trust us to make your vision a reality in Alberta. Fill the form below
            to get contact us!
          </p>

          <form class="row g-3 needs-validation" id="contactForm" action="{{route('contact.mail')}}" method="post" novalidate>
            @csrf
            <div class="col-md-8  mx-auto">
              <label for="name" class="form-label required">Name</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Enter name here" required />
              <div class="invalid-feedback">Please enter your name.</div>
            </div>
            <div class="col-md-8  mx-auto">
              <label for="email" class="form-label required">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="example@gmail.com" required />
              <div class="invalid-feedback">Please enter a valid email.</div>
            </div>
            <div class="col-md-8  mx-auto">
              <label for="notes" class="form-label required">Notes</label>
              <textarea class="form-control" id="notes" name="message" rows="4" placeholder="Enter notes here" required></textarea>
              <div class="invalid-feedback">Please enter your message.</div>
            </div>
            <div class="col-md-8  mx-auto">
              <button type="submit" class="btn btn-custom">Submit</button>
            </div>
          </form>
        </div>
@endsection

