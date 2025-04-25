@extends('layouts.master-web')
@section('content')
      <!--Carousel Banner-->
      <div id="home-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active c-item">
                <img src="{{asset('assets/frame3.jpg')}}" class="d-block w-100 c-img" alt="carousel1">
                <div class="carousel-caption cbanner-caption">
                    <h1>Get To Know Know Us</h1>
                    <nav class="breadcrumb-nav" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/" class="text-white">Home</a></li>
                        <li class="breadcrumb-item active text-white" aria-current="page">About</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!--About us Section-->
    <section class="about-section p-4 m-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{asset('assets/Frame 8.png')}}" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-6">
                    <h1 class="mt-5 display-5">ABOUT US</h1>
                    <p class="lh-lg" style="text-align: justify;">
                        At First Visions Contracting, we transform homes and rental properties into extraordinary spaces through expert, detail-driven renovations. Guided by our philosophy, “From First Vision to Final Detail,” we specialize in painting, drywalling, basement development, and tiling services that elevate everyday living spaces into stunning, functional environments.
                        Our team works hand-in-hand with clients, listening closely to their ideas, preferences, and goals to ensure that every project is a true reflection of their vision. From initial concept to final touches, we blend precision, creativity, and passion into every aspect of our work, delivering results that exceed expectations.
                        We are deeply committed to transparency, open communication, and craftsmanship. Every brush stroke, tile placement, and finish matters to us because we understand that a home is more than a place — it's a personal sanctuary and a reflection of its owner. Whether you're refreshing your home, enhancing your rental properties, or embarking on a full basement development, we're here to turn your ideas into reality.
                        Let's build something incredible together — because with us, every detail matters
                    </p>
                </div>
                </div>
            </div>
        </div>
    </section>

    <section class="vision-section mt-5
        mb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-4 d-flex justify-content-center align-items-center"
                            style="background-color: #0A2540; border-radius: 50%; width: 150px; height: 150px; overflow: hidden; margin: auto;">
                            <img src="{{ asset('icons/mission.png') }}"
                                class="img-fluid"
                                style="width: 60px; height: 60px;"
                                alt="Mission Icon">
                        </div>
                        <div class="col-md-8">
                            <h2 class="display-6">Mission</h2>
                            <p>
                                Our mission is to transform spaces with precision and creativity, delivering exceptional renovations and rental solutions that exceed client expectations. We are committed to quality craftsmanship, open communication, and a seamless experience from concept to completion.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-4 d-flex justify-content-center align-items-center"
                            style="background-color: #0A2540; border-radius: 50%; width: 150px; height: 150px; overflow: hidden; margin: auto;">
                            <img src="{{ asset('icons/vision.png') }}"
                                class="img-fluid"
                                style="width: 60px; height: 60px;"
                                alt="Mission Icon">
                        </div>
                        <div class="col-md-8">
                            <h2 class="display-6">Vision</h2>
                            <p>
                                Our vision is to be the leading provider of innovative renovation and rental solutions, recognized for our commitment to quality, creativity, and client satisfaction. We aim to transform every project into a masterpiece that reflects our clients' unique styles and aspirations.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>





@endsection


