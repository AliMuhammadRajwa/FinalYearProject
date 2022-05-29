<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>North Trip Cycle</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('img/logo1.png')}}" rel="icon">
    <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,600,600i,700,700i|Satisfy|Comic+Neue:300,300i,400,400i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

    <!-- =======================================================
    * Template Name: Delicious - v4.7.0
    * Template URL: https://bootstrapmade.com/delicious-free-restaurant-bootstrap-theme/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->

    <!-- Latest compiled and minified CSS -->

</head>
<body>
<section>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <div class="logo me-auto">
                <a href="{{route('LoadMainPage')}}"><img src="{{asset('img/logo1.png')}}"
                                                         alt=""></a>
            </div>

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto inactive" href="{{route('LoadMainPage')}}">Home</a></li>
                    <li><a class="nav-link scrollto active" href="{{route('LoadHotelPage')}}">Hotel</a></li>
                    <li><a class="nav-link scrollto" href="#Tgallery ">Transportation</a></li>
                    <li><a class="nav-link scrollto" href="#Tour">Tour Guide</a></li>
                    <li><a class="nav-link scrollto" href="#menu">Photography</a></li>
                    <li><a class="nav-link scrollto" href="#specials">Mechanic</a></li>
                    <li><a class="nav-link scrollto" href="#events">Events</a></li>
                    <li><a class="nav-link scrollto" href="#chefs">Contact Us</a></li>
                    <li><a class="nav-link scrollto" href="#gallery">About</a></li>

                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

            <a href="{{route('adminPage')}}" class="book-a-table-btn  text-center"
               style="width: 110px; height: 37px;">Login</a>

        </div>
    </header><!-- End Header -->
</section>

<main id="main">
    <!--**********************************
    Content body start
  ***********************************-->
    @yield('content');
    <!--**********************************
        Content body end
    ***********************************-->

    {{--    <!-- ======= Events Section ======= -->--}}
    {{--    <section id="events" class="events">--}}
    {{--        <div class="container">--}}

    {{--            <div class="section-title">--}}
    {{--                <h2>Organized <span>Events</span> in Gilgit Baltistan</h2>--}}
    {{--            </div>--}}

    {{--            <div class="events-slider swiper">--}}
    {{--                <div class="swiper-wrapper">--}}

    {{--                    <div class="swiper-slide">--}}
    {{--                        <div class="row event-item">--}}
    {{--                            <div class="col-lg-6">--}}
    {{--                                <img src="{{asset('assets/img/event12.jpg')}}" class="img-fluid" alt="">--}}
    {{--                            </div>--}}
    {{--                            <div class="col-lg-6 pt-4 pt-lg-0 content">--}}
    {{--                                <h3>Bonfire</h3>--}}
    {{--                                <div class="price">--}}
    {{--                                    <p><span>$189</span></p>--}}
    {{--                                </div>--}}
    {{--                                <p class="fst-italic">--}}
    {{--                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor--}}
    {{--                                    incididunt ut labore et dolore--}}
    {{--                                    magna aliqua.--}}
    {{--                                </p>--}}
    {{--                                <ul>--}}
    {{--                                    <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo--}}
    {{--                                        consequat.--}}
    {{--                                    </li>--}}
    {{--                                    <li><i class="bi bi-check-circle"></i> Duis aute irure dolor in reprehenderit in--}}
    {{--                                        voluptate velit.--}}
    {{--                                    </li>--}}
    {{--                                    <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo--}}
    {{--                                        consequat.--}}
    {{--                                    </li>--}}
    {{--                                </ul>--}}
    {{--                                <p>--}}
    {{--                                    Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in--}}
    {{--                                    reprehenderit in voluptate--}}
    {{--                                    velit esse cillum dolore eu fugiat nulla pariatur--}}
    {{--                                </p>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div><!-- End testimonial item -->--}}

    {{--                    <div class="swiper-slide">--}}
    {{--                        <div class="row event-item">--}}
    {{--                            <div class="col-lg-6">--}}
    {{--                                <img src="{{asset('assets/img/event13.jpg')}}" class="img-fluid" alt="">--}}
    {{--                            </div>--}}
    {{--                            <div class="col-lg-6 pt-4 pt-lg-0 content">--}}
    {{--                                <h3>Snow Skating</h3>--}}
    {{--                                <div class="price">--}}
    {{--                                    <p><span>$290</span></p>--}}
    {{--                                </div>--}}
    {{--                                <p class="fst-italic">--}}
    {{--                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor--}}
    {{--                                    incididunt ut labore et dolore--}}
    {{--                                    magna aliqua.--}}
    {{--                                </p>--}}
    {{--                                <ul>--}}
    {{--                                    <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo--}}
    {{--                                        consequat.--}}
    {{--                                    </li>--}}
    {{--                                    <li><i class="bi bi-check-circle"></i> Duis aute irure dolor in reprehenderit in--}}
    {{--                                        voluptate velit.--}}
    {{--                                    </li>--}}
    {{--                                    <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo--}}
    {{--                                        consequat.--}}
    {{--                                    </li>--}}
    {{--                                </ul>--}}
    {{--                                <p>--}}
    {{--                                    Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in--}}
    {{--                                    reprehenderit in voluptate--}}
    {{--                                    velit esse cillum dolore eu fugiat nulla pariatur--}}
    {{--                                </p>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div><!-- End testimonial item -->--}}

    {{--                    <div class="swiper-slide">--}}
    {{--                        <div class="row event-item">--}}
    {{--                            <div class="col-lg-6">--}}
    {{--                                <img src="{{asset('assets/img/event11.jpg')}}" class="img-fluid" alt="">--}}
    {{--                            </div>--}}
    {{--                            <div class="col-lg-6 pt-4 pt-lg-0 content">--}}
    {{--                                <h3>Hiking</h3>--}}
    {{--                                <div class="price">--}}
    {{--                                    <p><span>$99</span></p>--}}
    {{--                                </div>--}}
    {{--                                <p class="fst-italic">--}}
    {{--                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor--}}
    {{--                                    incididunt ut labore et dolore--}}
    {{--                                    magna aliqua.--}}
    {{--                                </p>--}}
    {{--                                <ul>--}}
    {{--                                    <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo--}}
    {{--                                        consequat.--}}
    {{--                                    </li>--}}
    {{--                                    <li><i class="bi bi-check-circle"></i> Duis aute irure dolor in reprehenderit in--}}
    {{--                                        voluptate velit.--}}
    {{--                                    </li>--}}
    {{--                                    <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo--}}
    {{--                                        consequat.--}}
    {{--                                    </li>--}}
    {{--                                </ul>--}}
    {{--                                <p>--}}
    {{--                                    Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in--}}
    {{--                                    reprehenderit in voluptate--}}
    {{--                                    velit esse cillum dolore eu fugiat nulla pariatur--}}
    {{--                                </p>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div><!-- End testimonial item -->--}}

    {{--                </div>--}}
    {{--                <div class="swiper-pagination"></div>--}}
    {{--            </div>--}}

    {{--        </div>--}}
    {{--    </section><!-- End Events Section -->--}}

</main><!-- End #main -->


<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-md-6">
                    <div class="footer-info">
                        <h3>North Trip Cycle</h3>
                        <p class="pb-3"><em>We Plan, We Design, We Serve .</em></p>
                        <p>
                            INCUBATION CENTER <br>
                            NEAR KIU, GB<br><br>
                            <strong>Phone:</strong> +92 313 8796 45<br>
                            <strong>Email:</strong> northtripcycle72@gmail.com<br>
                        </p>
                        <div class="social-links mt-3">
                            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul style="text-align: left;">
                        <li><i class=""></i> <a href="#">Home</a></li>
                        <li><i class=""></i> <a href="#">About us</a></li>
                        <li><i class=""></i> <a href="#">Services</a></li>
                        <li><i class=""></i> <a href="#">Terms of service</a></li>
                        <li><i class=""></i> <a href="#">Privacy policy</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Our Services</h4>
                    <ul style="text-align: left;">
                        <li><i class=""></i> <a href="#">Hotel</a></li>
                        <li><i class=""></i> <a href="#">Transportation</a></li>
                        <li><i class=""></i> <a href="#">Tour Guide</a></li>
                        <li><i class=""></i> <a href="#">Mechanical Support</a></li>
                        <li><i class=""></i> <a href="#">Call Center</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6">
                    <h4>Our Newsletter</h4>
                    <p>Comming Soon.....</p>
                    <form action="" method="post">
                        <input type="email" class="form-control"
                               style="width: 320px; margin-left: 20px; height: 30px; font-size: 12px;" name="email"><br>
                        <a href="{{route('adminPage')}}" class="book-a-table-btn scrollto text-center"
                           style="width: 100px; font-size: 12px; height: 10px; border-radius: 6px;">Subscribe</a>

                        {{--                        <input type="email" name="email"><input type="submit" class="subcribe-btn scrollto text-center " value="Subscribe">--}}
                    </form>

                </div>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong><span>North Trip Cycle</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/multi-responsive-bootstrap-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>
</footer><!-- End Footer -->


<!-- Vendor JS Files -->
<script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
<script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>

<!-- Template Main JS File -->
<script src="{{asset('assets/js/main.js')}}"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

{{--    Country wise Provinces--}}
<script>
    $(document).ready(function () {
        $("#country").change(function () {
            let country_id = this.value;

            $.get('/get_provinces?country=' + country_id, function (data) {
                $("#province").html(data);
            })
        })
    })

</script>


{{--    Province wise cities--}}
<script>
    $(document).ready(function () {
        $("#province").change(function () {
            let province_id = this.value;

            $.get('/get_cities?province=' + province_id, function (data) {
                // console.log(data);
                $("#city").html(data);
            })
        })
    })

</script>

</body>
</html>
