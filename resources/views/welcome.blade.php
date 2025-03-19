@extends('layouts.master-web')
@section('content')
    

    <!--Carousel-->
    <div id="" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active c-item">
            <img src="{{asset('assets/Frame 3.png')}}" class="d-block w-100 c-img img-fluid" alt="carousel1">
            <div class="carousel-caption c-caption">
                <h1 class="display-2">From First Vision To<br>Final Detail</h1>
                <p>
                    Bringing innovative designs and expert craftsmanship to every renovation. Whether it's a <br>
                    modern upgrade or a timeless transformation, we turn your vision<br> into reality—one space at a time.
                </p>
                    <a href="{{route('quote')}}" class="btn" role="button">Get Quote</a>
              </div>
          </div>
          <div class="carousel-item c-item">
            <img src="{{asset('assets/Frame 18.png')}}" class="d-block w-100 c-img" alt="carousel2">
            <div class="carousel-caption c-caption">
                <h1>From First Vision To<br>Final Detail</h1>
                <p>
                    Bringing innovative designs and expert craftsmanship to every renovation. Whether it's a <br>
                    modern upgrade or a timeless transformation, we turn your vision<br> into reality—one space at a time.
                </p>
                <a href="{{route('quote')}}" class="btn" role="button">Get Quote</a>
            </div>
          </div>
          <div class="carousel-item c-item">
            <img src="{{asset('assets/Frame 26.png')}}" class="d-block w-100 c-img" alt="carousel3">
            <div class="carousel-caption c-caption">
                <h1>From First Vision To<br>Final Detail</h1>
                <p>
                    Bringing innovative designs and expert craftsmanship to every renovation. Whether it's a <br>
                    modern upgrade or a timeless transformation, we turn your vision<br> into reality—one space at a time.
                </p>
                <a href="{{route('quote')}}" class="btn" role="button">Get Quote</a>
            </div>
          </div>
        </div>
        <span type="button" data-bs-target="#home-carousel" data-bs-slide="prev"></span>
        <span  type="button" data-bs-target="#home-carousel" data-bs-slide="next"></span>
    </div>


    <!--Who we are?-->
    <section class="home-who-we-are p-md-5 p-2">
        <div class="container">
            <div class="card mb-3" style="width: 100%; border: none;">
                <div class="row g-0">
                <div class="col-md-6">
                    <div class="card-body">
                    <p><h1 class="display-4 mt-md-5">WHO WE ARE</h1></p>
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
            <p><h1 style="text-align: center;">Recent Projects</h1></p>
            <p style="text-align: center;">
                Transformations That Speak for Themselves<br>
                Explore our latest projects where vision meets precision. From sleek basement developments 
                in Alberta area to vibrant kitchen makeovers and durable tile installations, see how we 
                turn outdated spaces into functional, stunning realities. Every project reflects our commitment 
                to <i>“From First Vision to Final Detail”</i>—where your dream home begins.<br>
                <a href="#" class="btn" role="button">See all projects</a>
            </p>
            <div class="row">
                <div class="col-md-3">
                    <img src="{{asset('assets/Frame 4.png')}}" class="card-img-top" alt="Frame">
                </div>
                <div class="col-md-3">
                    <img src="{{asset('assets/Frame 6.png')}}" class="card-img-top" alt="Frame">
                </div>
                <div class="col-md-3">
                      <img src="{{asset('assets/Frame 5.png')}}" class="card-img-top" alt="Frame">
                  </div>
                  <div class="col-md-3">
                      <img src="{{asset('assets/Frame 7.png')}}" class="card-img-top" alt="Frame">
                  </div>
            </div>

        </div>    
    </section>

    <!--Services-->
    <section class="services p-3">
        <div class="container mb-3 text-align center">
            <p><h1 style="text-align: center;">Services</h1></p>
            <p style="text-align: center;">
                Your Vision, Our Expertise<br>
                Whether refreshing a single room or overhauling your entire property, we deliver:
                <b>Renovations:</b> Painting, drywalling, basement development, and tiling tailored to your style.
                <b>Rentals:</b> Hassle-free room listings in prime locations, perfect for tenants and property investors. 
            </p>
               <div class="row">
                @foreach ($services as $service)
                    <div class="col-md-3 card mt-5" style="border:none;">
                        <img class="card-img-top img-fluid"  src="{{$service->image->url}}" style="height:250px; object-fit:cover"  alt="testimony1">
                        <div class="card-body">
                        <h5 class="card-title" style="font-weight: bold">{{$service->name}}</h5>
                        <p class="card-text">{{$service->description}}</p>
                        </div>
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
                    <div class="col-md-3 card" style="background:none; border:none" >
                        
                        <a href=""><img class="card-img-top"  src="{{$rental->uploads[0]->url}}" style="height: 250px; border-radius:0px; object-fit:cover" alt="testimony1"></a>
                        <div class="card-body" style="background-color: #fff">
                            <div class="card-title" style="font-weight:bold">
                               <a href=""> {{substr($rental->title, 0 , 50)}}</a>
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
            <p style="text-align: center;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi unde impedit, necessitatibus, soluta sit quam minima expedita atque 
                corrupti reiciendis.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
            </p>
            <div class="row">
                <div class="col-md-4 card " id="testimony">
                    <img class="card-img-top"  src="{{asset('assets/testimonies.jpg')}}" style="width:150px; height:150px; object-fit:cover" alt="testimony1">
                    <div class="card-body">
                        <div class="card-title">
                            <h5 style="text-align: center; font-weight:bold">Justin Trudeau</h5>
                        </div>
                        <div class="card-text">
                            <p style="text-align: center;">
                                "These guys are the real deal—smooth operations, top-notch work, and zero hassle. If you want it done right, 
                                they’re the ones to call!"<br>
                                <img src="{{asset('assets/quotation-marks.svg')}}" alt="quotation-marks" width="25" height="25">
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 card " id="testimony">
                    <img class="card-img-top"  src="{{asset('assets/testimonies.jpg')}}" style="width:150px; height:150px; object-fit:cover" alt="testimony1">
                    <div class="card-body">
                        <div class="card-title">
                            <h5 style="text-align: center;  font-weight:bold">Jane Smith</h5>
                        </div>
                        <div class="card-text">
                            <p style="text-align: center;">
                                "I had the most amazing experience with this service! The team was professional, efficient, and truly attentive to my needs. They made sure everything was perfect, and I couldn't be happier with the results!"<br>
                                <img src="{{asset('assets/quotation-marks.svg')}}" alt="quotation-marks" width="25" height="25">
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 card " id="testimony">
                    <img class="card-img-top"  src="{{asset('assets/testimonies.jpg')}}" style="width:150px; height:150px; object-fit:cover" alt="testimony1">
                    <div class="card-body">
                        <div class="card-title">
                            <h3 style="text-align: center;  font-weight:bold">Emily White</h5>
                        </div>
                        <div class="card-text">
                            <p style="text-align: center;">
                                "From start to finish, everything was smooth and hassle-free. The level of customer care provided was exceptional, and I highly recommend this service to anyone in need of quality and reliability."<br>
                                <img src="{{asset('assets/quotation-marks.svg')}}" alt="quotation-marks" width="25" height="25">
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
