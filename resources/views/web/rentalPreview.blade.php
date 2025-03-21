@extends('layouts.master')
@section('content')
<div id="home-carousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active c-item">
            <img src="./assets/Frame 3.png" class="d-block w-100 c-img" alt="carousel1">
            <div class="carousel-caption cbanner-caption">
                <h1>RENTALS</h1>
                <nav class="breadcrumb-nav" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html" class="text-white">Home</a></li>
                    <li class="breadcrumb-item"><a href="#" class="text-white">Services</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">Rentals</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection