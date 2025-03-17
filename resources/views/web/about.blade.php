@extends('layouts.master-web')
@section('content')
      <!--Carousel Banner-->
      <div id="home-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active c-item">
                <img src="{{asset('assets/Frame 3.png')}}" class="d-block w-100 c-img" alt="carousel1">
                <div class="carousel-caption cbanner-caption">
                    <h1>GET TO KNOW US</h1>
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
            <div class="card mb-3" style="width: 100%;">
                <div class="row g-0">
                <div class="col-md-6"> 
                    <img src="{{asset('assets/Frame 8.png')}}" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-6">
                    <div class="card-body">
                    <p><h1>ABOUT US</h1></p>
                    <p class="card-text">
                        lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et 
                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip 
                        ex ea commodo consequat.<br><br>
                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
                        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br><br>
                        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem
                    </p>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>  
@endsection


