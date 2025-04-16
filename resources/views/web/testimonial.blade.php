@extends('layouts.master-web')
@section('styles')
    <style>
        .jumbotron{
            background-image: url('../assets/Frame 3.png');
            background-position: center;
            background-size: cover;
            height:400px;
        }
        h1 {
        text-align: center;
        }
        .principle {
        margin-bottom: 20px;
        }
  </style>
@endsection
@section('content')
      <div class="jumbotron jumbotron-fluid d-flex align-items-center">
        <div class="container text-center">
          <h1 class="display-4">Testimonial</h1>
          <nav class="breadcrumb-nav" aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html" class="text-white">Home</a></li>
            <li class="breadcrumb-item active text-white" aria-current="page">Testimonial</li>
            </ol>
        </nav>
        </div>
      </div>
      <section class="content">
        <div class="container mx-auto my-5">
              <div class="row">
                <div class="col-md-7 mx-auto">
                    <h1>FeedBack</h1>
                    <form action="{{route('feedback.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                            <div class="mb-3 col-12">
                                <label for="client_id" class="form-label">Choose Client</label>
                                <select name="client_id" id="client_id" class="form-select" readonly>
                                        <option value="{{$client->uuid}}" selected>{{$client->first_name}} {{$client->last_name}}</option>
                                </select>
                            </div>

                    </div>

                    <div class="row">
                        <div class="mb-3 col-12">
                            <label for="message" class="form-label">message</label>
                            <textarea name="message" id="message" class="form-control" cols="30" rows="10" oninput="limitWords(this, 30)" onkeydown="limitWords(this, 30, event)"></textarea>
                            <small id="wordCount" class="text-muted">0/30 words</small>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-secondary">Submit Feedback</button>
                </form>
                </div>
              </div>
        </div>
      </section>
@endsection
