@extends('layouts.master-web')
@section('content')
    

    <!--Carousel-->
    <div id="home-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active c-item">
            <img src="{{asset('assets/Frame 3.png')}}" class="d-block w-100 c-img img-fluid" alt="carousel1">
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
    <section class="home-who-we-are p-4 m-4">
        <div class="container">
            <div class="card mb-3" style="width: 100%; border: none;">
                <div class="row g-0">
                <div class="col-md-6">
                    <div class="card-body">
                    <p><h1>WHO WE ARE</h1></p>
                    <p class="card-text">
                        We transform homes and rental properties into extraordinary spaces through expert renovations. 
                        Guided by “From First Vision to Final Detail,” we specialize in painting, drywalling, basement development, 
                        and tiling. Collaborating closely with clients, we ensure visions become reality with precision and passion.
                        <br><br>
                        Committed to transparency and excellence, we prioritize craftsmanship and customer satisfaction. 
                        Whether refreshing a home or upgrading rentals, we bring dreams to life. Let’s build 
                        something incredible together—every detail matters to us.
                    </p>
                    <a href="{{route('about')}}" class="btn" role="button">Learn more</a>
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
            <div class="row row-cols-1 row-cols-md-2 g-4 mb-4">
                <div class="col">
                  <div class="card">
                    <img src="{{asset('assets/Frame 4.png')}}" class="card-img-top" alt="Frame">
                  </div>
                </div>
                <div class="col">
                  <div class="card">
                    <img src="{{asset('assets/Frame 6.png')}}" class="card-img-top" alt="Frame">
                  </div>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-2 g-4 mb-4">
                <div class="col">
                  <div class="card">
                    <img src="{{asset('assets/Frame 5.png')}}" class="card-img-top" alt="Frame">
                  </div>
                </div>
                <div class="col">
                  <div class="card">
                    <img src="{{asset('assets/Frame 7.png')}}" class="card-img-top" alt="Frame">
                  </div>
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
            <div class="card-group p-2">
                <div class="card" style="width: 300px;" id="home-services">
                    <img class="card-img-top"  src="{{asset('assets/basement.svg')}}" alt="testimony1">
                    <div class="card-body">
                        <div class="card-title">
                            <h6 style="text-align: center; font-weight: bold;">Basement Development</h6>
                        </div>
                        <div class="card-text">
                            <p style="text-align: center;">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.<br><br>
                                <a href="{{route('reno')}}"><button>Learn more</button></a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card" style="width: 300px;" id="home-services">
                    <img class="card-img-top"  src="{{asset('assets/paint_brush.svg')}}" alt="testimony1">
                    <div class="card-body">
                        <div class="card-title">
                            <h6 style="text-align: center; font-weight: bold;">Painting</h6>
                        </div>
                        <div class="card-text">
                            <p style="text-align: center;">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.<br><br>
                                <a href="{{route('reno')}}"><button>Learn more</button></a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card" style="width: 300px;" id="home-services">
                    <img class="card-img-top"  src="{{asset('assets/tiling.svg')}}" alt="testimony1">
                    <div class="card-body">
                        <div class="card-title">
                            <h6 style="text-align: center; font-weight: bold;">Tiling</h6>
                        </div>
                        <div class="card-text">
                            <p style="text-align: center;">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.<br><br>
                                <a href="{{route('reno')}}"><button>Learn more</button></a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card" style="width: 300px;" id="home-services">
                    <img class="card-img-top"  src="{{asset('assets/wall.svg')}}" alt="testimony1">
                    <div class="card-body">
                        <div class="card-title">
                            <h6 style="text-align: center; font-weight: bold;">Dry walling</h6>
                        </div>
                        <div class="card-text">
                            <p style="text-align: center;">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.<br><br>
                                <a href="{{route('reno')}}"><button>Learn more</button></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--Rentals-->
    <section class="Rentals p-3">
        <div class="container mb-3">
            <p><h1 style="text-align: center;">Rentals</h1></p>
            <p style="text-align: center;">
                Discover curated room listings designed for modern living. From cozy studios to spacious shared units, 
                we connect tenants to quality rentals and help landlords maximize property value. Your ideal space is just a click away.
            </p>
            <div class="card-group p-2">
                <div class="card" id="home-rentals" >
                    <img class="card-img-top"  src="{{asset('assets/Frame 5-2.png')}}" alt="testimony1">
                    <div class="card-body">
                        <div class="card-title">
                            <h6>FEBRUARY 11, 2025</h6>
                        </div>
                        <div class="card-text">
                            <p style="font-size: small; ">
                                <b>Coming Soon</b><br><br>
                                Lorem ipsurm dolor sit amet, consectetur adipisicing elit
                            </p>    
                        </div>
                            <a href="{{route('rental')}}">Read more</a>
                    </div>
                </div>
                <div class="card" id="home-rentals" >
                    <img class="card-img-top"  src="{{asset('assets/Frame 6-2.png')}}" alt="testimony1">
                    <div class="card-body">
                        <div class="card-title">
                            <h6>FEBRUARY 11, 2025</h6>
                        </div>
                        <div class="card-text">
                            <p style="font-size: small; ">
                                <b>Coming Soon</b><br><br>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit
                            </p>    
                        </div>
                            <a href="rental.html">Read more</a>
                    </div>
                </div>
                <div class="card" id="home-rentals" >
                    <img class="card-img-top"  src="{{asset('assets/Frame 13.png')}}" alt="testimony1">
                    <div class="card-body">
                        <div class="card-title">
                            <h6>FEBRUARY 11, 2025</h6>
                        </div>
                        <div class="card-text">
                            <p style="font-size: small; ">
                                <b>Coming Soon</b><br><br>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit
                            </p>    
                        </div>
                            <a href="rental.html">Read more</a>
                    </div>
                </div>
                <div class="card" id="home-rentals" >
                    <img class="card-img-top"  src="{{asset('assets/Frame 6-1.png')}}" alt="testimony1">
                    <div class="card-body">
                        <div class="card-title">
                            <h6>FEBRUARY 11, 2025</h6>
                        </div>
                        <div class="card-text">
                            <p style="font-size: small; ">
                                <b>Coming Soon</b><br><br>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit
                            </p>    
                        </div>
                            <a href="{{route('rental')}}">Read more</a>
                    </div>
                </div>


            </div>
        </div>

    </section>

    <!--Testimonials-->
    <section class="testimonials p-3">
        <div class="container mb-3 text-align center">
            <p><h1 style="text-align: center;">Testimonials</h1></p>
            <p style="text-align: center;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi unde impedit, necessitatibus, soluta sit quam minima expedita atque 
                corrupti reiciendis.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
            </p>
            <div class="card-group p-2">
                <div class="card" style="width: 300px;" id="testimony">
                    <img class="card-img-top"  src="{{asset('assets/testimonies.jpg')}}" alt="testimony1">
                    <div class="card-body">
                        <div class="card-title">
                            <h3 style="text-align: center;">Jane Doe</h3>
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
                <div class="card" style="width: 300px;" id="testimony">
                    <img class="card-img-top"  src="{{asset('assets/testimonies.jpg')}}" alt="testimony1">
                    <div class="card-body">
                        <div class="card-title">
                            <h3 style="text-align: center;">Jane Doe</h3>
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
                <div class="card" style="width: 300px;" id="testimony">
                    <img class="card-img-top"  src="{{asset('assets/testimonies.jpg')}}" alt="testimony1">
                    <div class="card-body">
                        <div class="card-title">
                            <h3 style="text-align: center;">Jane Doe</h3>
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
            </div>
        </div>
    </section>
@endsection
