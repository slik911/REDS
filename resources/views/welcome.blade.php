@extends('layouts.master-web')
@section('styles')
    <style>
        .newsCard {
        position: relative;
        width: 100%;
        height: 250px;
        background-color: #fff;
        color:#fff;
        overflow: hidden;
        border-radius: 6px;
        }

        figure img {
        display: block;
        object-fit: cover !important;
        object-position: center center !important; height: 100%;
        width: 100%;
        }

        .overlay{
        background: rgb(69, 69, 69);
        background: -moz-linear-gradient(0deg, rgb(67, 66, 67) 0%, rgba(78, 78, 78, 0) 100%);
        background: -webkit-linear-gradient(0deg, rgb(62, 62, 62) 0%, rgba(68, 68, 68, 0) 100%);
        background: linear-gradient(0deg, rgb(70, 69, 71) 0%, rgba(66, 65, 66, 0) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#281a36",endColorstr="#593b74",GradientType=1);s
        display: block;
        position: absolute;
        height: 200px;
        width: 100%;
        bottom: 0;
        z-index: 3;
        }

        .newsCaption {
        position: absolute;
        top: auto;
        bottom: 31px;
        left: 0;
        width: 100%;
        height: 35%;
        z-index: 10;
        padding: 15px;
        -webkit-transform: translateY(80%);
        transform: translateY(80%);
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
        -webkit-transition:  -webkit-transform 0.4s;
        transition:  -webkit-transform 0.4s;
        transition: transform 0.4s;
        transition: transform 0.4s,  -webkit-transform 0.4s;
        }
        .newsCaption i{font-size: 24px;}

        .newsCaption-title {
        margin-top: 0px;
        }
        .newsCaption-content {
        margin: 0;
        }

        .newsCaption-link {
        color: #fff;
        text-decoration: underline;
        opacity: .8;
        -webkit-transition-property: opacity;
        transition-property: opacity;
        -webkit-transition-duration: 0.15s;

        transition-duration: 0.15s;
        -webkit-transition-timing-function: cubic-bezier(0.39, 0.58, 0.57, 1);
                transition-timing-function: cubic-bezier(0.39, 0.58, 0.57, 1);
        }
        .news-Slide-up:hover .overlay{ background: rgb(0, 0, 0);
        background: -moz-linear-gradient(0deg, rgb(35, 35, 35) 0%, rgba(114, 114, 114, 0) 100%);
        background: -webkit-linear-gradient(0deg, rgb(45, 44, 44) 0%, rgba(121, 121, 121, 0) 100%);
        background: linear-gradient(0deg, rgb(26, 26, 26) 0%, rgba(113, 109, 117, 0) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#400a6f",endColorstr="#593b74",GradientType=1);
        }

        .news-Slide-up:hover .newsCaption {

        -webkit-transform: translateY(0px);
        transform: translateY(0px);
        -webkit-transition:  -webkit-transform 0.4s;
        transition: -webkit-transform 0.4s;
        transition: transform 0.4s,
        transition: transform 0.4s, -webkit-transform 0.4s;
        }


    </style>
@endsection
@section('content')


    <!--Carousel-->
<div id="home-carousel" class="carousel slide carousel-slide" data-bs-touch="true" data-bs-ride="carousel" data-bs-interval="2000">
  <div class="carousel-inner">
    <div class="carousel-item active c-item">
      <img src="{{asset('assets/frame3.jpg')}}" class="d-block w-100 c-img img-fluid" alt="carousel1">
      <div class="carousel-caption c-caption">
        <h1 class="display-4">From First Vision To Final Detail</h1>
        <p>
          Bringing innovative designs and expert craftsmanship to every renovation. Whether it's a <br>
          modern upgrade or a timeless transformation, we turn your vision<br> into reality—one space at a time.
        </p>
        <a href="{{route('quote')}}" class="btn" role="button">Get Quote</a>
      </div>
    </div>
    <div class="carousel-item c-item">
      <img src="{{asset('assets/rental2.jpg')}}" class="d-block w-100 c-img" alt="carousel2">
      <div class="carousel-caption c-caption">
        <h1 class="display-4">Find Your Perfect Space, Tailored to You </h1>
        <p>
            Discover curated room listings designed for modern living. From cozy studios to spacious shared units,<br> we connect tenants to quality rentals and help landlords maximize property value. <br>Your ideal space is just a click away.≈
        </p>
        <a href="{{route('rental')}}" class="btn" role="button">Check out Listings</a>
      </div>
    </div>
    </div>



    <!--Who we are?-->
    <section class="home-who-we-are p-md-5 p-2">
        <div class="container">
            <div class="card mb-3" style="width: 100%; border: none;">
                <div class="row g-0">
                <div class="col-md-6">
                    <div class="card-body">
                    <p><h1 class="display-5 mt-md-5">WHO WE ARE</h1></p>
                    <p class="card-text">
                        We transform homes and rental properties into extraordinary spaces through expert renovations.
                        Guided by “From First Vision to Final Detail,” we specialize in painting, drywalling, basement development,
                        and tiling. Collaborating closely with clients, we ensure visions become reality with precision and passion.
                        <br><br>
                        Committed to transparency and excellence, we prioritize craftsmanship and customer satisfaction.
                        Whether refreshing a home or upgrading rentals, we bring dreams to life. Let’s build
                        something incredible together—every detail matters to us.
                    </p>
                    <a href="{{route('about')}}" class="btn btn-primary" role="button">Learn more</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="{{asset('assets/Frame 8.png')}}" class="img-fluid rounded-start" alt="image">
                </div>
                </div>
            </div>
        </div>
    </section>

    <!--Recent Projects-->
    <section class="recent-projects p-4">
        <div class="container mb-3 text-align center">
            <p><h1 style="text-align: center;" class="display-5">Recent Projects</h1></p>
            <p style="text-align: center;">
                Transformations That Speak for Themselves<br>
                Explore our latest projects where vision meets precision. From sleek basement developments
                in Alberta area to vibrant kitchen makeovers and durable tile installations, see how we
                turn outdated spaces into functional, stunning realities. Every project reflects our commitment
                to <i>“From First Vision to Final Detail”</i>—where your dream home begins.<br>
                <a href="{{route('project')}}" class="btn" role="button">See all projects</a>
            </p>
            <div class="row">

                  <div class="container">
                    <div class="row">
                    <!-- CARD 1-->

                    @foreach ($projects as $project)
                        <div class="col-lg-3">
                    <a href='{{route('project.preview', ['uuid'=> $project->uuid])}}' class="url-box" >
                    <figure class='newsCard news-Slide-up '>
                        <img src="{{$project->uploads[0]->url}}"/>
                        <div class='newsCaption px-4'>
                        <div class="d-flex align-items-center justify-content-between cnt-title">
                        <h5 class='newsCaption-title text-white m-0'>{{substr($project->title, 0, 25)}}</h5> <i class="fas fa-arrow-alt-circle-right "></i>
                        </div>
                        <div class='newsCaption-content d-flex '>
                        <p class="col-10 py-3 px-0">{{substr(strip_tags($project->description), 0, 100)}}...</p>
                        </div>
                        </div>
                        <span class="overlay"></span>
                    </figure>
                    </a>
                    </div>
                    @endforeach

                    </div>
                </div>

            </div>

        </div>
    </section>

    <!--Services-->
    <section class="services p-3">
        <div class="container mb-3 text-align center">
            <p><h1 style="text-align: center;"  class="display-5">Services</h1></p>
            <p style="text-align: center;">
                At First Vision Contracting, we specialize in transforming spaces with precision and creativity. Our services include expert renovations, rental solutions, and property management, all tailored to meet your unique needs. Whether you're looking to enhance your home or maximize your rental property's potential, we're here to bring your vision to life.
            </p>
               <div class="row">
                @foreach ($services as $service)
                <div class="col-md-3 col-12 card mt-5" style="border:none">
                      <a href="{{route('quote')}}" style="text-decoration: none; color:#000 ">
                        <img class="card-img-top img-fluid"  src="{{$service->image->url}}" style="height:250px; object-fit:cover; border-radius:0"  alt="testimony1">
                        <div class="card-body" style="border:1px solid #ccc; border-top:none; border-radius:0px; background-color: #fff">
                        <h5 class="card-title fs-6" style="font-weight: bold;">{{$service->name}}</h5>
                        <p class="card-text" style="color:#3e3e3e">{{$service->description}}</p>
                        </div>
                    </a>
                </div>
                @endforeach
               </div>
        </div>
    </section>


    <!--Rentals-->
    <section class="rentals p-4">
        <div class="container mb-5">
            <p><h1 style="text-align: center;">Rentals</h1></p>
            <p style="text-align: center;">
                Discover curated room listings designed for modern living. From cozy studios to spacious shared units,
                we connect tenants to quality rentals and help landlords maximize property value. Your ideal space is just a click away.
            </p>
            <div class="row">
                @foreach ($rentals as $rental)
                    <div class="col-md-3 col-12 card" style="background:none; border:none" >

                        <a href="{{route('rental.preview', ['uuid'=>$rental->uuid])}}"><img class="card-img-top"  src="{{$rental->uploads[0]->url}}" style="height: 250px; border-radius:0px; object-fit:cover" alt="testimony1"></a>
                        <div class="card-body" style="background-color: #fff">
                            <div class="card-title " style="font-weight:bold" >
                               <a href="{{route('rental.preview', ['uuid'=>$rental->uuid])}}" > {{substr($rental->title, 0 , 50)}}</a>
                            </div>
                            <div class="card-text">
                                <p style="font-size: 12px !important">
                                    {{ substr(strip_tags($rental->description), 0, 100)}}...
                                </p>
                                <h6 style="font-weight:bold; color:#0A2540; font-size:13px">CAD {{number_format($rental->rental->price)}}</h6>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </section>

    <!--Testimonials-->
    <section class="testimonials">
        <div class="container text-align center">
            <p><h1 style="text-align: center;">Testimonials</h1></p>
            <p style="text-align: center;">We take pride in every project we complete, and nothing means more to us than hearing from satisfied clients. Here’s what some of our customers have shared about their experience with our painting services
            </p>
            <div class="row">
                @foreach ($testimonials as $testimonial)
                <div class="col-md-4 card mt-md-5 mt-2 mb-md-5 mb-2" id="testimony">
                    <img class="card-img-top "  src="{{asset('image/users.png')}}" style="width:100px; height:100px; object-fit:cover; border-radius:50px;" alt="testimony1">
                    <div class="card-body">
                        <div class="card-title">
                            <h5 style="text-align: center; font-weight:bold">{{$testimonial->client->first_name}} {{$testimonial->client->last_name}}</h5>
                        </div>
                        <div class="card-text">
                            <p style="text-align: center;">
                                {{substr(strip_tags($testimonial->message), 0, 100)}}
                                <br>
                                {{-- <img src="{{asset('assets/quotation-marks.svg')}}" alt="quotation-marks" width="25" height="25"> --}}
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection
