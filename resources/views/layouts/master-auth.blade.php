<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords"
        content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
    {{-- <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet"> --}}
    <title>@yield('title') | First Vision </title>
    <link rel="stylesheet" href="{{asset('css/app-admin.css')}}">
	<link rel="stylesheet" href="{{asset('css/datatables.min.css')}}">
	<script src="{{asset('js/app-admin.js')}}"></script>
	<script src="{{asset('js/datatables.js')}}"></script>
    {{-- @vite(['resources/css/app-admin.css', 'resources/js/app-admin.js']) --}}
</head>

<style>
    body{
        background-image: url('../image/login.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center
    }
    #login{
        background-color: rgba(0, 0, 0, 0.7);
        width: 100%;
        height: 100%;
    }
    .login-section {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    input {
        background-color: white;
        color: black;
        border: 1px solid #ccc;
        /* border-radius: 0px !important; */
        padding: 8px;
        font-size: 16px;
    }

    .btn-link{
        color: #222E3C;
    }

    .btn-primary{
        background-color: #fff;
        color: #222E3C;
        border: 1px solid #222E3C;
        /* border-radius: 0px; */
        transition: 0.3s;
    }

    .btn-primary:hover{
        background-color: #222E3C;
        color: white;
        /* border-radius: 0px; */
        border: 1px solid #222E3C;
        
    }

</style>

<div id="login">
    <div class="container">
        <div class="row">
            <div class="col-md-4 login-section">
                <div class="card pt-3 pb-4">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</div>

</html>