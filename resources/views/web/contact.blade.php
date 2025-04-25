@extends('layouts.master-web')
@section('content')
        <!--Carousel Banner-->
        <div id="home-carousel" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active c-item">
              <img
                src="{{asset('assets/contact.jpg')}}"
                class="d-block w-100 c-img"
                alt="carousel1"
              />
              <div class="carousel-caption cbanner-caption">
                <h1>Contact Us</h1>

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

        <div class="container mt-5 ">
            <div class="row">
                <div class="col-md-6">
                      <h2 class="mb-4">Get In Touch</h2>
          <p class="mb-4 ">
            Whether you're renovating your space or searching for a rental, we’re
            here to deliver reliable, professional service every step of the way.
            Trust us to make your vision a reality in Alberta. Fill the form below
            to get contact us!
          </p>

          <form class="needs-validation" id="contactForm" action="{{route('contact.mail')}}" method="post" novalidate>
            @csrf
            <div class="col-md-12 mb-3">
              <label for="name" class="form-label required">Name</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Enter name here" required />
              <div class="invalid-feedback">Please enter your name.</div>
            </div>
            <div class="col-md-12 mb-3">
              <label for="email" class="form-label required">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="example@gmail.com" required />
              <div class="invalid-feedback">Please enter a valid email.</div>
            </div>
            <div class="col-md-12 mb-3">
              <label for="notes" class="form-label required">Notes</label>
              <textarea class="form-control" id="notes" name="message" rows="4" placeholder="Enter notes here" required></textarea>
              <div class="invalid-feedback">Please enter your message.</div>
            </div>
            <div class="col-md-12">
              <button type="submit" class="btn btn-custom">Submit</button>
            </div>
          </form>
                </div>
                <div class="col-md-6 pt-3" style="border-radius: 10px">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2572.4955040005166!2d-112.8406813!3d49.8519362!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x536e79706b47ac59%3A0x8d9b8cefd5ecbbfa!2s314%20Second%20St%2C%20Shaughnessy%2C%20AB%20T0K%202A0!5e0!3m2!1sen!2sca!4v1745581922493!5m2!1sen!2sca" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
@endsection

