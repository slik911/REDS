@extends('layouts.master-web')
<style>
    .jumbotron{
        background-image: url('../assets/Frame 3.png');
        background-position: center;
        background-size: cover;
        height:400px;
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
@section('content')

      <div class="jumbotron jumbotron-fluid d-flex align-items-center">
        <div class="container text-center">
          <h1 class="display-4">Renovations</h1>
          <nav class="breadcrumb-nav" aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html" class="text-white">Home</a></li>
            <li class="breadcrumb-item"><a href="#" class="text-white">Services</a></li>
            <li class="breadcrumb-item active text-white" aria-current="page">Renovations</li>
            </ol>
        </nav>
        </div>
      </div>

      <div class="renovations">
        <div class="container">
            <div class="row">
                @foreach ($services as $service)
                    <div class="col-md-3 card mt-5" style="border:none">
                        <a href="{{route('quote')}}" style="text-decoration: none; color:#000 ">
                            <img class="card-img-top img-fluid"  src="{{$service->image->url}}" style="height:250px; object-fit:cover; border-radius:0"  alt="testimony1">
                            <div class="card-body" style="border:1px solid #ccc">
                            <h5 class="card-title" style="font-weight: bold;">{{$service->name}}</h5>
                            <p class="card-text">{{$service->description}}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
                <div class="col-12 mt-5">
                {!! $services->withQueryString()->links('pagination::bootstrap-5') !!}
                </div>
            </div>

        </div>
      </div>

@endsection

