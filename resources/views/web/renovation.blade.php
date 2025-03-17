@extends('layouts.master-web')
@section('content')
  
    <!--Carousel-->
    <div class="carousel-item active c-item">
        <img
          src="{{asset('assets/Frame 3.png')}}"
          class="d-block w-100 c-img"
          alt="carousel1"
        />
        <div class="carousel-caption cbanner-caption">
          <h1>RENOVATIONS</h1>
          <nav class="breadcrumb-nav" aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html" class="text-white">Home</a></li>
            <li class="breadcrumb-item"><a href="#" class="text-white">Services</a></li>
            <li class="breadcrumb-item active text-white" aria-current="page">Renovations</li>
            </ol>
        </nav>
        </div>
      </div>
  
      <div class="container-fluid" style="margin-top:500px">
        <div class="renovations-container d-flex flex-column flex-md-row">
            <div class="text-content w-100 w-md-50 ">
                <h1 class="mt-5">Renovations</h1>
                <p>Renovate with ConfidencePainting & Drywalling: Refresh your home with crisp,
                    long-lasting finishes. Basement Development: Unlock hidden potential—create rental suites, 
                    home theaters, or guest rooms. Tiling: Durable, stylish solutions for kitchens, bathrooms, and beyond. From concept to completion, we handle every detail so you don’t have to.</p>
                <!-- <button class="btn btn-custom">GET QUOTE</button> -->
            </div>
            <div class="tiles-container w-100 w-md-50 d-flex flex-wrap">
                <div class="tile w-50 text-center p-3">
                    <img src="/assets/wall.svg" alt="Basement Development" class="img-fluid">
                    <a href="#" class="tile-title">Basement Development</a>
                </div>
                <div class="tile w-50 text-center p-3">
                    <img src="/assets/wall.svg" alt="Painting" class="img-fluid">
                    <a href="#" class="tile-title">Painting</a>
                </div>
                <div class="tile w-50 text-center p-3">
                    <img src="/assets/wall.svg" alt="Tiling" class="img-fluid">
                    <a href="#" class="tile-title">Tiling</a>
                </div>
                <div class="tile w-50 text-center p-3">
                    <img src="/assets/wall.svg" alt="Dry Walling" class="img-fluid">
                    <a href="#" class="tile-title">Dry Walling</a>
                </div>
            </div>
        </div>
    </div>
        
@endsection

  