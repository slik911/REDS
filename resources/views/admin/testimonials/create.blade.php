@extends('layouts.master-admin')
@section('title')
    Create Testimonial
@endsection
@section('content')
   <form action="{{route('admin.testimonial.store')}}" method="post">
    @csrf
    <div class="row">

            <div class="mb-3 col-md-6">
                <label for="client_id" class="form-label">Choose Client</label>
                <select name="client_id" id="client_id" class="form-select">
                    <option value="">Select Client</option>
                    @foreach ($clients as $client)
                        <option value="{{$client->uuid}}">{{$client->first_name}} {{$client->last_name}}</option>
                    @endforeach
                </select>
            </div>

    </div>

    <div class="row">
        <div class="mb-3 col-md-6">
            <label for="message" class="form-label">message</label>
            <textarea name="message" id="message" class="form-control" cols="30" rows="10" oninput="limitWords(this, 30)" onkeydown="limitWords(this, 30, event)"></textarea>
            <small id="wordCount" class="text-muted">0/30 words</small>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Post</button>
   </form>
@endsection
@section('scripts')
   <script>

        function limitWords(textarea, maxWords, event) {
            let words = textarea.value.match(/\b[-?(\w+)?]+\b/g) || []; // Match words
            let wordCount = words.length;

            if (wordCount >= maxWords && event.key !== "Backspace" && event.key !== "Delete") {
                event.preventDefault(); // Stop further input
            }

            document.getElementById("wordCount").textContent = `${wordCount}/${maxWords} words`;
        }
   </script>

@endsection
