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

        .page-link{
        color:#0A2540 !important;
        }

        .page-item.active .page-link {
        background-color: #0A2540 !important;
        color: #fff !important;
        border-color: #0A2540 !important;
        }

    </style>
@endsection
@section('content')
       <!--Carousel Banner-->
    <div id="home-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active c-item">
                <img src="./assets/reno.jpg" class="d-block w-100 c-img" alt="carousel1">
                <div class="carousel-caption cbanner-caption">
                    <h1>Explore Our Projects</h1>
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
            <div class="row">
                @foreach ($projects as $project)
                    <div class="col-md-3 col-sm-12 ">
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
            <div class="col-12 mt-5">
                {!! $projects->withQueryString()->links('pagination::bootstrap-5') !!}
                </div>
            </div>
        </div>
    </section>
@endsection




