@extends('layouts.master-web')
@section('content')
       <!--Carousel Banner-->
       <div id="home-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active c-item">
                <img src="./assets/Frame 3.png" class="d-block w-100 c-img" alt="carousel1">
                <div class="carousel-caption cbanner-caption">
                    <h1>EXPLORE OUR PROJECTS</h1>
                    <nav class="breadcrumb-nav" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html" class="text-white">Home</a></li>
                        <li class="breadcrumb-item active text-white" aria-current="page">Projects</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <span type="button" data-bs-target="#home-carousel"></span>
    </div>

    <!--Projects Display Section-->
    <section class="projects">
        <div class="container">
            <div class="row row-cols-1 row-cols-3 g-4 mb-4">
                <div class="col">
                  <div class="card">
                    <a href="#"><img src="{{asset('assets/Frame 4.png')}}" class="card-img-top" alt="Frame"></a>
                  </div>
                </div>
                <div class="col">
                  <div class="card">
                    <img src="{{asset('assets/Frame 6.png')}}" class="card-img-top" alt="Frame">
                  </div>
                </div>
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
                <div class="col">
                    <div class="card">
                      <img src="{{asset('assets/Frame 5.png')}}" class="card-img-top" alt="Frame">
                    </div>
                </div>
            </div>
        </div>  
    </section> 
@endsection




