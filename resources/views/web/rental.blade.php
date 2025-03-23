@extends('layouts.master-web')
@section('content')

      <div id="home-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active c-item">
                <img src="{{asset('assets/Frame 3.png')}}" class="d-block w-100 c-img" alt="carousel1">
                <div class="carousel-caption cbanner-caption">
                    <h1>RENTALS</h1>
                    <nav class="breadcrumb-nav" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html" class="text-white  text-decoration-none  ">Home</a></li>
                        <li class="breadcrumb-item"><a href="#" class="text-white text-decoration-none">Services</a></li>
                        <li class="breadcrumb-item active text-white  text-decoration-none" aria-current="page">Rentals</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <section>
      <div class="container mb-5 p-5">

        <div class="row">
            @foreach ($rentals as $rental)
                <div class="col-md-3 card" style="background:none; border:none" >
                    <a href="{{route('rental.preview', ['uuid'=>$rental->uuid])}}"><img class="card-img-top"  src="{{$rental->uploads[0]->url}}" style="height: 250px; border-radius:0px; object-fit:cover" alt="testimony1"></a>
                    <div class="card-body" style="background-color: #fff; border:1px solid #ccc">
                        <div class="card-title" style="font-weight:bold">
                           <a href="{{route('rental.preview', ['uuid'=>$rental->uuid])}}" class="text-decoration-none" style="color:#0A2540"> {{substr($rental->title, 0 , 50)}}</a>
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

@endsection

 
  