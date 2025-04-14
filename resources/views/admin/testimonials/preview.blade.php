@extends('layouts.master-admin')
@section('title')
    Testimonial Preview
@endsection
@section('content')
<div class="row">
            
    <div class="mb-3 col-md-6">
        <label for="client_id" class="form-label">Choose Client</label>
        <input type="text" class="form-control" name="client" id="" value="{{$testimonial->client->first_name}} {{$testimonial->client->last_name}}" readonly>
    </div>
    
</div>

<div class="row">
<div class="mb-3 col-md-6">
    <label for="message" class="form-label">message</label>
    <textarea name="message" id="message" class="form-control" cols="30" rows="10" oninput="limitWords(this, 30)" onkeydown="limitWords(this, 30, event)">{{$testimonial->message}}</textarea>
</div>
</div>

<a href="{{route('admin.testimonial.edit', ['uuid'=> $testimonial->uuid])}}" class="btn btn-primary"> Edit Testimonial</a>
@endsection
