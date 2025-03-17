<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,  shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="icon" href="./assets/FVClogo.png">
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <title>firstvisioncontracting</title>

    <!--Styling for this page-->
    <style>
        .renovations-container {
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 80%;
            padding: 50px;
            margin: auto;
        
        }

        p{
            width: 79%;
            
        }
        .text-content {
            width: 50%;                                                                                                                                                                         
            text-align: left;
            height: 58vh;
            /* background-color: aquamarine; */
        }
        .image-content {
            width: 50%;
        }
        .btn-custom {
            background-color: #0A2540;
            color: white;
            width: 50%;
            margin-left: auto;
            margin-right: auto;
        }
        .btn-custom:hover {
            background-color: #081b31;
        }
        .tile {
            /* width: 100%; */
            height: auto;
            font-size: larger;
        }

        .tile a{
            padding-top: 50px;
            text-decoration: none;
            color: #333;
        }

        .tile a:hover{
            border-bottom: #333 2px solid;
        }
    </style>
</head>
<body>
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <div class="container">
            <a href="#" class="navbar-brand"><img src="./assets/FVClogo.png" alt="logo" width="40" height="40"></a>

            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-label="Expand Navigation">
                <span class="navbar-toggler-icon"></span>
            </button>      

            <div class="collapse navbar-collapse justify-content-center" id="navbar">
                <ul class="navbar-nav">
                    <li class="nav-item mx-3">
                        <a href="index.html" class="nav-link" >Home</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a href="about.html" class="nav-link">About</a>
                    </li>
                    <li class="nav-item dropdown mx-3">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Services</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="rental.html">Rentals</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="renovation.html">Renovations</a></li>
                        </ul>
                    </li>
                    <li class="nav-item mx-3">
                        <a href="project.html" class="nav-link">Projects</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a href="contact.html" class="nav-link">Contacts</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a href="rfq.html" class="btn ml-5" role="button">Get Quote</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!--Carousel-->
    <div class="carousel-item active c-item">
        <img src="./assets/Frame 3.png" class="d-block w-100 c-img" alt="carousel1">
        <div class="carousel-caption cbanner-caption">
            <h1>GET A QUOTE FOR YOUR PROJECT</h1>
            <!--
            <nav class="breadcrumb-nav" aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html" class="text-white">Home</a></li>
                <li class="breadcrumb-item active text-white" aria-current="page">About</li>
                </ol>
            </nav>-->
        </div>
    </div>



    <div class="container-fluid">
        <div class="renovations-container d-flex flex-column flex-md-row">
            <div class="text-content w-100 w-md-50">
                <h1>Renovations</h1>
                <p>Renovate with ConfidencePainting & Drywalling: Refresh your home with crisp,
                    long-lasting finishes. Basement Development: Unlock hidden potential—create rental suites, 
                    home theaters, or guest rooms. Tiling: Durable, stylish solutions for kitchens, bathrooms, and beyond. From concept to completion, we handle every detail so you don’t have to.</p>
                <!-- <button class="btn btn-custom">GET QUOTE</button> -->
            </div>
            <div class="tiles-container w-100 w-md-50 d-flex flex-wrap">
                <div class="tile w-50 text-center p-3">
                    <img src="/assets/wall.svg" alt="Basement Development" class="img-fluid">
                    <a href="#" class="tile-title">Basement Development</a>
                </div>
                <div class="tile w-50 text-center p-3">
                    <img src="/assets/wall.svg" alt="Painting" class="img-fluid">
                    <a href="#" class="tile-title">Painting</a>
                </div>
                <div class="tile w-50 text-center p-3">
                    <img src="/assets/wall.svg" alt="Tiling" class="img-fluid">
                    <a href="#" class="tile-title">Tiling</a>
                </div>
                <div class="tile w-50 text-center p-3">
                    <img src="/assets/wall.svg" alt="Dry Walling" class="img-fluid">
                    <a href="#" class="tile-title">Dry Walling</a>
                </div>
            </div>
        </div>
    </div>
    

    <!--Footer-->
    <footer class="footer-section">
        <div class="footer-top">
          <div class="container">
            <div class="row">
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="widget company-intro-widget">
                  <a href="index.html" class="site-logo"><img src="./assets/FVClogo.png" alt="logo"></a>
                  <p>FIRST VISION COMPANY LIMITED</p>
                  <ul class="company-footer-contact-list">
                    <li>From first vision to final detail</li>
                  </ul>
                </div>
              </div><!-- widget end -->
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="widget course-links-widget">
                  <h5 class="widget-title">Quick Links</h5>
                  <ul class="courses-link-list">
                    <li><a href="#"><i class="fas fa-long-arrow-alt-right"></i>Privacy Policy</a></li>
                    <li><a href="#"><i class="fas fa-long-arrow-alt-right"></i>Terms of Service</a></li>
                    <li><a href="#"><i class="fas fa-long-arrow-alt-right"></i>FAQ</a></li>
    
                  </ul>
                </div>
              </div><!-- widget end -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="widget latest-news-widget">
                    <h5 class="widget-title">Office Address</h5>
                    <ul class="small-post-list">
                        <li>
                            <div class="small-post-item">
                                <h6 class="small-post-title"><a href="#">314 2ND STREET<br>SHAUGHNESSY, AB T0K 2A0</a></h6>
                            </div>
                        </li>
                        <li>
                            <div class="small-post-item">
                                <h6 class="post-date">Email :</h6>
                                <h6 class="small-post-title"><a href="mailto:firstvisionscontracting@gmail.com">firstvisionscontracting@gmail.com</a></h6>
                            </div>
                        </li><!-- small-post-item end -->
                    </ul>
                    </div>
                </div><!-- widget end -->
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="widget newsletter-widget">
                  <h5 class="widget-title">Socials</h5>
                  <div class="footer-newsletter">
                    <a href="https://www.yelp.ca/biz/first-vision-contracting-and-investments-shaughnessy">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                            <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
                        </svg>
                    </a>&nbsp;&nbsp;
                    <a href="https://www.instagram.com/first_vision_contracting">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                            <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
                        </svg>
                    </a>&nbsp;&nbsp;
                    <a href="https://www.yelp.ca/biz/first-vision-contracting-and-investments-shaughnessy">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-yelp" viewBox="0 0 16 16">
                            <path d="m4.188 10.095.736-.17.073-.02A.813.813 0 0 0 5.45 8.65a1 1 0 0 0-.3-.258 3 3 0 0 0-.428-.198l-.808-.295a76 76 0 0 0-1.364-.493C2.253 7.3 2 7.208 1.783 7.14c-.041-.013-.087-.025-.124-.038a2.1 2.1 0 0 0-.606-.116.72.72 0 0 0-.572.245 2 2 0 0 0-.105.132 1.6 1.6 0 0 0-.155.309c-.15.443-.225.908-.22 1.376.002.423.013.966.246 1.334a.8.8 0 0 0 .22.24c.166.114.333.129.507.141.26.019.513-.045.764-.103l2.447-.566zm8.219-3.911a4.2 4.2 0 0 0-.8-1.14 1.6 1.6 0 0 0-.275-.21 2 2 0 0 0-.15-.073.72.72 0 0 0-.621.031c-.142.07-.294.182-.496.37-.028.028-.063.06-.094.089-.167.156-.353.35-.574.575q-.51.516-1.01 1.042l-.598.62a3 3 0 0 0-.298.365 1 1 0 0 0-.157.364.8.8 0 0 0 .007.301q0 .007.003.013a.81.81 0 0 0 .945.616l.074-.014 3.185-.736c.251-.058.506-.112.732-.242.151-.088.295-.175.394-.35a.8.8 0 0 0 .093-.313c.05-.434-.178-.927-.36-1.308M6.706 7.523c.23-.29.23-.722.25-1.075.07-1.181.143-2.362.201-3.543.022-.448.07-.89.044-1.34-.022-.372-.025-.799-.26-1.104C6.528-.077 5.644-.033 5.04.05q-.278.038-.553.104a8 8 0 0 0-.543.149c-.58.19-1.393.537-1.53 1.204-.078.377.106.763.249 1.107.173.417.41.792.625 1.185.57 1.036 1.15 2.066 1.728 3.097.172.308.36.697.695.857q.033.015.068.025c.15.057.313.068.469.032l.028-.007a.8.8 0 0 0 .377-.226zm-.276 3.161a.74.74 0 0 0-.923-.234 1 1 0 0 0-.145.09 2 2 0 0 0-.346.354c-.026.033-.05.077-.08.104l-.512.705q-.435.591-.861 1.193c-.185.26-.346.479-.472.673l-.072.11c-.152.235-.238.406-.282.559a.7.7 0 0 0-.03.314c.013.11.05.217.108.312q.046.07.1.138a1.6 1.6 0 0 0 .257.237 4.5 4.5 0 0 0 2.196.76 1.6 1.6 0 0 0 .349-.027 2 2 0 0 0 .163-.048.8.8 0 0 0 .278-.178.7.7 0 0 0 .17-.266c.059-.147.098-.335.123-.613l.012-.13c.02-.231.03-.502.045-.821q.037-.735.06-1.469l.033-.87a2.1 2.1 0 0 0-.055-.623 1 1 0 0 0-.117-.27Zm5.783 1.362a2.2 2.2 0 0 0-.498-.378l-.112-.067c-.199-.12-.438-.246-.719-.398q-.644-.353-1.295-.695l-.767-.407c-.04-.012-.08-.04-.118-.059a2 2 0 0 0-.466-.166 1 1 0 0 0-.17-.018.74.74 0 0 0-.725.616 1 1 0 0 0 .01.293c.038.204.13.406.224.583l.41.768q.341.65.696 1.294c.152.28.28.52.398.719q.036.057.068.112c.145.239.261.39.379.497a.73.73 0 0 0 .596.201 2 2 0 0 0 .168-.029 1.6 1.6 0 0 0 .325-.129 4 4 0 0 0 .855-.64c.306-.3.577-.63.788-1.006q.045-.08.076-.165a2 2 0 0 0 .051-.161q.019-.083.029-.168a.8.8 0 0 0-.038-.327.7.7 0 0 0-.165-.27"/>
                        </svg>
                    </a>
                  </div><br>
                  <ul>
                    <li>
                        <div class="small-post-item">
                            <h6 class="post-date">Phone :</h6>
                            <h6 class="small-post-title"><a href="tel:+14039290333">(403) 929-0333</a></h6>
                        </div>
                    </li>
                  </ul>
    
    
                </div>
              </div><!-- widget end -->
            </div>
          </div> 
        </div>
        <div class="footer-bottom">
          <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 text-sm-center text-center">
                  <span class="copy-right-text">© 2025 <a href="https://codepen.io/anupkumar92"> First Visions Contracting Ltd.</a></span>
                </div>
            </div>
          </div>
        </div><!-- footer-bottom end -->
    </footer>
        
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>