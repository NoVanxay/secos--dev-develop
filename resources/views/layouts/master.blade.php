<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="{{ trans('panel.site_title') }}">
    <meta name="keywords" content="Sangha Education Commission Office of Savannakhet">
    <meta name="author" content="Sangha Education Commission Office of Savannakhet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('frontend/images/favicon.png') }}">
    <link rel="stylesheet" href=" {{ asset(mix('/css/libs.css', 'frontend')) }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    @yield("extraStyle")
</head>
<body>

    @include('partials.header')

    @yield('pageContent')

    <section id="slider-part" class="slider-active">
        <div class="single-slider bg_cover pt-150" style="background-image: url(images/slider/s-1.jpg)" data-overlay="4">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7 col-lg-9">
                        <div class="slider-cont">
                            <h1 data-animation="bounceInLeft" data-delay="1s">Choose the right theme for education</h1>
                            <p data-animation="fadeInUp" data-delay="1.3s">Donec vitae sapien ut libearo venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt  Sed fringilla mauri amet nibh.</p>
                            <ul>
                                <li><a data-animation="fadeInUp" data-delay="1.6s" class="main-btn" href="#">Read More</a></li>
                                <li><a data-animation="fadeInUp" data-delay="1.9s" class="main-btn main-btn-2" href="#">Get Started</a></li>
                            </ul>
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- single slider -->

        <div class="single-slider bg_cover pt-150" style="background-image: url(images/slider/s-2.jpg)" data-overlay="4">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7 col-lg-9">
                        <div class="slider-cont">
                            <h1 data-animation="bounceInLeft" data-delay="1s">Choose the right theme for education</h1>
                            <p data-animation="fadeInUp" data-delay="1.3s">Donec vitae sapien ut libearo venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt  Sed fringilla mauri amet nibh.</p>
                            <ul>
                                <li><a data-animation="fadeInUp" data-delay="1.6s" class="main-btn" href="#">Read More</a></li>
                                <li><a data-animation="fadeInUp" data-delay="1.9s" class="main-btn main-btn-2" href="#">Get Started</a></li>
                            </ul>
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- single slider -->

        <div class="single-slider bg_cover pt-150" style="background-image: url(images/slider/s-3.jpg)" data-overlay="4">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7 col-lg-9">
                        <div class="slider-cont">
                            <h1 data-animation="bounceInLeft" data-delay="1s">Choose the right theme for education</h1>
                            <p data-animation="fadeInUp" data-delay="1.3s">Donec vitae sapien ut libearo venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt  Sed fringilla mauri amet nibh.</p>
                            <ul>
                                <li><a data-animation="fadeInUp" data-delay="1.6s" class="main-btn" href="#">Read More</a></li>
                                <li><a data-animation="fadeInUp" data-delay="1.9s" class="main-btn main-btn-2" href="#">Get Started</a></li>
                            </ul>
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- single slider -->
    </section>

    <!--====== SLIDER PART ENDS ======-->

    <!--====== CATEGORY PART START ======-->

    <section id="category-part">
        <div class="container">
            <div class="category pt-40 pb-80">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="category-text pt-40">
                            <h2>Best platform to learn everything</h2>
                        </div>
                    </div>
                    <div class="col-lg-6 offset-lg-1 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-8 offset-2">
                        <div class="row category-slied mt-40">
                            <div class="col-lg-4">
                                <a href="#">
                                    <span class="singel-category text-center color-1">
                                        <span class="icon">
                                            <img src="images/all-icon/ctg-1.png" alt="Icon">
                                        </span>
                                        <span class="cont">
                                            <span>Language</span>
                                        </span>
                                    </span> <!-- singel category -->
                                </a>
                            </div>
                            <div class="col-lg-4">
                                <a href="#">
                                    <span class="singel-category text-center color-2">
                                        <span class="icon">
                                            <img src="images/all-icon/ctg-2.png" alt="Icon">
                                        </span>
                                        <span class="cont">
                                            <span>Business</span>
                                        </span>
                                    </span> <!-- singel category -->
                                </a>
                            </div>
                            <div class="col-lg-4">
                                <a href="#">
                                    <span class="singel-category text-center color-3">
                                        <span class="icon">
                                            <img src="images/all-icon/ctg-3.png" alt="Icon">
                                        </span>
                                        <span class="cont">
                                            <span>Literature</span>
                                        </span>
                                    </span> <!-- singel category -->
                                </a>
                            </div>
                            <div class="col-lg-4">
                                <a href="#">
                                    <span class="singel-category text-center color-1">
                                        <span class="icon">
                                            <img src="images/all-icon/ctg-1.png" alt="Icon">
                                        </span>
                                        <span class="cont">
                                            <span>Language</span>
                                        </span>
                                    </span> <!-- singel category -->
                                </a>
                            </div>
                            <div class="col-lg-4">
                                <a href="#">
                                    <span class="singel-category text-center color-2">
                                        <span class="icon">
                                            <img src="images/all-icon/ctg-2.png" alt="Icon">
                                        </span>
                                        <span class="cont">
                                            <span>Business</span>
                                        </span>
                                    </span> <!-- singel category -->
                                </a>
                            </div>
                            <div class="col-lg-4">
                                <a href="#">
                                    <span class="singel-category text-center color-3">
                                        <span class="icon">
                                            <img src="images/all-icon/ctg-3.png" alt="Icon">
                                        </span>
                                        <span class="cont">
                                            <span>Literature</span>
                                        </span>
                                    </span> <!-- singel category -->
                                </a>
                            </div>
                        </div> <!-- category slied -->
                    </div>
                </div> <!-- row -->
            </div> <!-- category -->
        </div> <!-- container -->
    </section>

    <!--====== CATEGORY PART ENDS ======-->


    <!--====== ABOUT PART START ======-->

    <section id="about-part" class="pt-65">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="section-title mt-50">
                        <h5>About us</h5>
                        <h2>Welcome to Edubin </h2>
                    </div> <!-- section title -->
                    <div class="about-cont">
                        <p>Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt  mauris. <br> <br> auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt  mauris</p>
                        <a href="#" class="main-btn mt-55">Learn More</a>
                    </div>
                </div> <!-- about cont -->
                <div class="col-lg-6 offset-lg-1">
                    <div class="about-event mt-50">
                        <div class="event-title">
                            <h3>Upcoming events</h3>
                        </div> <!-- event title -->
                        <ul>
                            <li>
                                <div class="singel-event">
                                    <span><i class="fa fa-calendar"></i> 2 December 2018</span>
                                    <a href="events-singel.html"><h4>Campus clean workshop</h4></a>
                                    <span><i class="fa fa-clock-o"></i> 10:00 Am - 3:00 Pm</span>
                                    <span><i class="fa fa-map-marker"></i> Rc Auditorim</span>
                                </div>
                            </li>
                            <li>
                                <div class="singel-event">
                                    <span><i class="fa fa-calendar"></i> 2 December 2018</span>
                                    <a href="events-singel.html"><h4>Tech Summit</h4></a>
                                    <span><i class="fa fa-clock-o"></i> 10:00 Am - 3:00 Pm</span>
                                    <span><i class="fa fa-map-marker"></i> Rc Auditorim</span>
                                </div>
                            </li>
                            <li>
                                <div class="singel-event">
                                    <span><i class="fa fa-calendar"></i> 2 December 2018</span>
                                    <a href="events-singel.html"><h4>Enviroement conference</h4></a>
                                    <span><i class="fa fa-clock-o"></i> 10:00 Am - 3:00 Pm</span>
                                    <span><i class="fa fa-map-marker"></i> Rc Auditorim</span>
                                </div>
                            </li>
                        </ul>
                    </div> <!-- about event -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
        <div class="about-bg">
            <img src="images/about/bg-1.png" alt="About">
        </div>
    </section>

    <!--====== ABOUT PART ENDS ======-->


    <!--====== NEWS PART START ======-->

    <section id="news-part" class="pt-115 pb-110">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title pb-50">
                        <h5>Latest News</h5>
                        <h2>From the news</h2>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="singel-news mt-30">
                        <div class="news-thum pb-25">
                            <img src="images/news/n-1.jpg" alt="News">
                        </div>
                        <div class="news-cont">
                            <ul>
                                <li><a href="#"><i class="fa fa-calendar"></i>2 December 2018 </a></li>
                                <li><a href="#"> <span>By</span> Adam linn</a></li>
                            </ul>
                            <a href="blog-singel.html"><h3>Tips to grade high cgpa in university life</h3></a>
                            <p>Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt .</p>
                        </div>
                    </div> <!-- singel news -->
                </div>
                <div class="col-lg-6">
                    <div class="singel-news news-list">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="news-thum mt-30">
                                    <img src="images/news/ns-1.jpg" alt="News">
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="news-cont mt-30">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-calendar"></i>2 December 2018 </a></li>
                                        <li><a href="#"> <span>By</span> Adam linn</a></li>
                                    </ul>
                                    <a href="blog-singel.html"><h3>Intellectual communication</h3></a>
                                    <p>Gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum auci elit cons  vel.</p>
                                </div>
                            </div>
                        </div> <!-- row -->
                    </div> <!-- singel news -->
                    <div class="singel-news news-list">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="news-thum mt-30">
                                    <img src="images/news/ns-2.jpg" alt="News">
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="news-cont mt-30">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-calendar"></i>2 December 2018 </a></li>
                                        <li><a href="#"> <span>By</span> Adam linn</a></li>
                                    </ul>
                                    <a href="blog-singel.html"><h3>Study makes you perfect</h3></a>
                                    <p>Gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum auci elit cons  vel.</p>
                                </div>
                            </div>
                        </div> <!-- row -->
                    </div> <!-- singel news -->
                    <div class="singel-news news-list">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="news-thum mt-30">
                                    <img src="images/news/ns-3.jpg" alt="News">
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="news-cont mt-30">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-calendar"></i>2 December 2018 </a></li>
                                        <li><a href="#"> <span>By</span> Adam linn</a></li>
                                    </ul>
                                    <a href="blog-singel.html"><h3>Technology edcution is now....</h3></a>
                                    <p>Gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum auci elit cons  vel.</p>
                                </div>
                            </div>
                        </div> <!-- row -->
                    </div> <!-- singel news -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>




    <!--====== PUBLICATION PART START ======-->

    <section id="publication-part" class="pt-115 pb-120 gray-bg">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-lg-6 col-md-8 col-sm-7">
                    <div class="section-title pb-60">
                        <h5>Publications</h5>
                        <h2>From Store </h2>
                    </div> <!-- section title -->
                </div>
                <div class="col-lg-6 col-md-4 col-sm-5">
                    <div class="products-btn text-right pb-60">
                        <a href="#" class="main-btn">All Products</a>
                    </div> <!-- products btn -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6 col-sm-8">
                    <div class="singel-publication mt-30">
                        <div class="image">
                            <img src="images/publication/p-1.jpg" alt="Publication">
                            <div class="add-cart">
                                <ul>
                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                    <li><a href="#"><i class="fa fa-heart-o"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="cont">
                            <div class="name">
                                <a href="shop-singel.html"><h6>Set for life </h6></a>
                                <span>By Scott Trench</span>
                            </div>
                            <div class="button text-right">
                                <a href="#" class="main-btn">Buy Now ($50)</a>
                            </div>
                        </div>
                    </div> <!-- singel publication -->
                </div>
                <div class="col-lg-3 col-md-6 col-sm-8">
                    <div class="singel-publication mt-30">
                        <div class="image">
                            <img src="images/publication/p-2.jpg" alt="Publication">
                            <div class="add-cart">
                                <ul>
                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                    <li><a href="#"><i class="fa fa-heart-o"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="cont">
                            <div class="name">
                                <a href="shop-singel.html"><h6>A Daughters </h6></a>
                                <span>By Scott Trench</span>
                            </div>
                            <div class="button text-right">
                                <a href="#" class="main-btn">Buy Now ($30)</a>
                            </div>
                        </div>
                    </div> <!-- singel publication -->
                </div>
                <div class="col-lg-3 col-md-6 col-sm-8">
                    <div class="singel-publication mt-30">
                        <div class="image">
                            <img src="images/publication/p-3.jpg" alt="Publication">
                            <div class="add-cart">
                                <ul>
                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                    <li><a href="#"><i class="fa fa-heart-o"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="cont">
                            <div class="name">
                                <a href="shop-singel.html"><h6>A Magnet </h6></a>
                                <span>By Scott Trench</span>
                            </div>
                            <div class="button text-right">
                                <a href="#" class="main-btn">Buy Now ($20)</a>
                            </div>
                        </div>
                    </div> <!-- singel publication -->
                </div>
                <div class="col-lg-3 col-md-6 col-sm-8">
                    <div class="singel-publication mt-30">
                        <div class="image">
                            <img src="images/publication/p-4.jpg" alt="Publication">
                            <div class="add-cart">
                                <ul>
                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                    <li><a href="#"><i class="fa fa-heart-o"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="cont">
                            <div class="name">
                                <a href="shop-singel.html"><h6>Pices of light</h6></a>
                                <span>By Scott Trench</span>
                            </div>
                            <div class="button text-right">
                                <a href="#" class="main-btn">Buy Now ($75)</a>
                            </div>
                        </div>
                    </div> <!-- singel publication -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

<a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>

@include('partials.footer')
<script src="{{ asset(mix('/js/libs.js', 'frontend')) }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDC3Ip9iVC0nIxC6V14CKLQ1HZNF_65qEQ"></script>
@yield("extraScript")
</body>
</html>
