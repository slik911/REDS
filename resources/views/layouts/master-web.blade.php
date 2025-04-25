
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,  shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="icon" href="./assets/FVClogo.png">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="{{asset('js/script.js')}}"></script>
    <title>First Vision Contracting</title>
    @yield('styles')
</head>
<body>
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <div class="container">
            <a href="/" class="navbar-brand"><img src="{{asset('assets/FVClogo.png')}}" alt="logo" width="40" height="40"></a>

            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-label="Expand Navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-center" id="navbar">
                <ul class="navbar-nav">
                    <li class="nav-item mx-3">
                        <a href="/" class="nav-link" >Home</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a href="{{route('about')}}" class="nav-link">About</a>
                    </li>
                    <li class="nav-item dropdown mx-3">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Services</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('rental')}}">Rentals</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{route('reno')}}">Renovations</a></li>
                        </ul>
                    </li>
                    <li class="nav-item mx-3">
                        <a href="{{route('project')}}" class="nav-link">Projects</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a href="{{route('contact')}}" class="nav-link">Contacts</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a href="{{route('quote')}}" class="btn ml-5" role="button">Get Quote</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')



    <footer class="section bg-footer">
        <div class="container pr-4">
            <div class="row">
                <div class="col-lg-4">
                    <div class="">
                 <img src="{{asset('image/FVClogo.png')}}" alt="" style="width:100px; height:100px">
                 <p class="mt-2">From first vision to final detail, we guide each project with precision, ensuring every step aligns with the client's goals for exceptional results.</p>
                    </div>
                </div>

                <div class="col-lg-2">
                    <div class="">
                        <h6 class="footer-heading text-uppercase text-white">Resources</h6>
                        <ul class="list-unstyled footer-link mt-4">
                            <li><a href="{{route('privacy')}}">Privacy Policy</a></li>
                            <li><a href="{{route('faq')}}">FAQ </a></li>
                            <li><a href="{{route('terms')}}">Terms & Conditions</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-2">
                    <div class="">
                        <h6 class="footer-heading text-uppercase text-white">Quick Links</h6>
                        <ul class="list-unstyled footer-link mt-4">
                            <li><a href="{{route('about')}}">About Us</a></li>
                            <li><a href="{{route('project')}}">Projects</a></li>
                            <li><a href="{{route('contact')}}">Contact</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="">
                        <h6 class="footer-heading text-uppercase text-white">Contact Us</h6>
                        <p class="contact-info mt-4">Address: 314 2ND STREET
                            SHAUGHNESSY, AB T0K 2A0</p>
                        <p>Email :
                            firstvisionscontracting@gmail.com</p>
                        <p class="contact-info">Phone: +1 (403) 929-0333</p>
                        <div class="mt-5">
                            <ul class="list-inline">
                                <li class="list-inline-item"><a href="#"><i class="fab facebook footer-social-icon fa-facebook-f"></i></i></a></li>
                                <li class="list-inline-item"><a href="https://www.instagram.com/first_vision_contracting"><i class="fab instagram footer-social-icon fa-instagram"></i></i></a></li>
                                <li class="list-inline-item"><a href="https://www.instagram.com/first_vision_contracting"><i class="fab google footer-social-icon fa-yelp"></i></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="text-center mt-5">
            <p class="footer-alt mb-0 f-14">2025 © First Vision Contracting, All Rights Reserved</p>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@1.2.0/dist/css/splide.min.css"></script>
    @yield('scripts')
</body>
</html>
