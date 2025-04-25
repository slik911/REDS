@extends('layouts.master-web')
@section('styles')
  <style>

.gallery img {
	display: none;
}
.main_preview {
	position: relative;
	width: 100%;
	height: 500px;
	overflow: hidden;
	background: #ccc;
	background-repeat: no-repeat;
	background-position: center center;
	background-size: cover;
	overflow: hidden;
	margin-bottom: 20px;
}
.main_preview:before {
content: "";
position: absolute;
left: 0;
bottom: 0;
width: 100%;
height: 100px;

background: -moz-linear-gradient(top,  rgba(0,0,0,0) 0%, rgba(0,0,0,0.7) 100%);
background: -webkit-linear-gradient(top,  rgba(0,0,0,0) 0%,rgba(0,0,0,0.7) 100%);
background: linear-gradient(to bottom,  rgba(0,0,0,0) 0%,rgba(0,0,0,0.7) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#00000000', endColorstr='#a6000000',GradientType=0 );
}
.main_preview-selected {
	animation: crossfade 0.5s ease;
	-webkit-animation: crossfade 0.5s ease;
	-moz-animation: crossfade 0.5s ease;
}
@keyframes crossfade {
	0% { opacity: 0.7; }
	100% { opacity: 1; }
}

@-webkit-keyframes crossfade {
	0% { opacity: 0.7; }
	100% { opacity: 1; }
}

@-moz-keyframes crossfade {
	0% { opacity: 0.7; }
	100% { opacity: 1; }
}
.main_preview span {
	/* position: absolute; */
	display: block;
	text-align: center;
	font-size: 16px;
	font-family: sans-serif;
	color: #fff;
	bottom: 10px;
	left: 0;
	right: 0;
}
.thumb-roll {
/* position: relative; */
width: auto;
overflow-x: auto;
overflow-y: hidden;

white-space: nowrap;
}
.thumb {
	display: inline-block;
	position: relative;
	width: 100px;
	height: 100px;
	margin-right: 20px;
	background: #ccc;
	overflow: hidden;
	background-repeat: no-repeat;
	background-position: center center;
	background-size: cover;
	overflow: hidden;
	cursor: pointer;
}
.thumb:last-of-type {
	margin-right: 0px;
}
.thumb:after {
	content: "";
	position: absolute;
	width: 100%;
	height: 100%;
	box-shadow: inset 5px 5px 0px rgba(51, 204, 255, 0), inset -5px -5px 0px rgba(51, 204, 255, 0);
}
.thumb.current:after {
	box-shadow: inset 5px 5px 0px rgba(51, 204, 255, 1), inset -5px -5px 0px rgba(51, 204, 255, 1);
	background: rgba(255,255,255,0.4);
	cursor: default;
}
.thumb:hover:after {
	box-shadow: inset 5px 5px 0px rgba(51, 204, 255, 1), inset -5px -5px 0px rgba(51, 204, 255, 1);
}
  </style>
@endsection

@section('scripts')
  <script>
    // Fit inner div to gallery
$('<div />', { 'class': 'inner'  }).appendTo('.gallery');

// Create main_preview image block and apply first img to it
var imageSrc1 = $('.gallery').children('img').eq(0).attr('src');
$('<div />', { 'class': 'main_preview'  }).appendTo('.gallery .inner').css('background-image', 'url(' + imageSrc1 + ')');

// Create image number label
var noOfImages = $('.gallery').children('img').length;
// $('<span />').appendTo('.gallery .inner .main_preview').html('Image 1 of ' + noOfImages);

// Create thumb roll
$('<div />', { 'class': 'thumb-roll'  }).appendTo('.gallery .inner');

// Create thumbail block for each image inside thumb-roll
$('.gallery').children('img').each( function() {
	var imageSrc = $(this).attr('src');
	$('<div />', { 'class': 'thumb'  }).appendTo('.gallery .inner .thumb-roll').css('background-image', 'url(' + imageSrc + ')');
});

// Make first thumbnail selected by default
$('.thumb').eq(0).addClass('current');

// Select thumbnail function
$('.thumb').click(function() {

	// Make clicked thumbnail selected
	$('.thumb').removeClass('current');
	$(this).addClass('current');

	// Apply chosen image to main_preview
	var imageSrc = $(this).css('background-image');
	$('.main_preview').css('background-image', imageSrc);
	$('.main_preview').addClass('main_preview-selected');
	setTimeout(function() {
		$('.main_preview').removeClass('main_preview-selected');
	}, 500);

	// Change text to show current image number
	var imageIndex = $(this).index();
	// $('.gallery .inner .main_preview span').html('Image ' + (imageIndex + 1) + ' of ' + noOfImages);
});

// Arrow key control function
$(document).keyup(function(e) {

  // If right arrow
  if (e.keyCode === 39) {

	// Mark current thumbnail
	var currentThumb = $('.thumb.current');
	var currentThumbIndex = currentThumb.index();
	if ( (currentThumbIndex+1) >= noOfImages) { // if on last image
		nextThumbIndex = 0; // ...loop back to first image
	} else {
		nextThumbIndex = currentThumbIndex+1;
	}
	var nextThumb = $('.thumb').eq(nextThumbIndex);
	currentThumb.removeClass('current');
	nextThumb.addClass('current');

	// Switch main_preview image
	var imageSrc = nextThumb.css('background-image');
	$('.main_preview').css('background-image', imageSrc);
	$('.main_preview').addClass('main_preview-selected');
	setTimeout(function() {
		$('.main_preview').removeClass('main_preview-selected');
	}, 500);

	// Change text to show current image number
	// $('.gallery .inner .main_preview span').html('Image ' + (nextThumbIndex+1) + ' of ' + noOfImages);

  }

  // If left arrow
  if (e.keyCode === 37) {

	// Mark current thumbnail
	var currentThumb = $('.thumb.current');
	var currentThumbIndex = currentThumb.index();
	if ( currentThumbIndex == 0) { // if on first image
		prevThumbIndex = noOfImages-1; // ...loop back to last image
	} else {
		prevThumbIndex = currentThumbIndex-1;
	}
	var prevThumb = $('.thumb').eq(prevThumbIndex);
	currentThumb.removeClass('current');
	prevThumb.addClass('current');

	// Switch main_preview image
	var imageSrc = prevThumb.css('background-image');
	$('.main_preview').css('background-image', imageSrc);
	$('.main_preview').addClass('main_preview-selected');
	setTimeout(function() {
		$('.main_preview').removeClass('main_preview-selected');
	}, 500);

	// Change text to show current image number
	$('.gallery .inner .main_preview span').html('Image ' + (prevThumbIndex+1) + ' of ' + noOfImages);

  }

});

  </script>
@endsection
@section('content')
<div id="home-carousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active c-item">
            <img src="{{asset('assets/reno.jpg')}}" class="d-block w-100 c-img" alt="carousel1">
            <div class="carousel-caption cbanner-caption">
                <h1>Projects</h1>
                <nav class="breadcrumb-nav" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html" class="text-white">Home</a></li>
                    <li class="breadcrumb-item"><a href="#" class="text-white">Services</a></li>
                    <li class="breadcrumb-item"><a href="{{route('project')}}" class="text-white">Project</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">{{$project->title}}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="rental_preview mt-5 mb-5">
    <div class="container mx-auto">
      <div class="row">
        <div class="col-md-6 p-2">
          <div class="gallery">

            @foreach ($project->uploads as $uploads)
            <img src="{{$uploads->url}}" />
            @endforeach
          </div>
        </div>
        <div class="col-md-6">
          <h1 class="display-5">
              {{$project->title}}
          </h1>
          <p>
            {!!$project->description!!}
          </p>
        </div>
      </div>
    </div>
</div>

@endsection
