<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>REJMUSIC | BLOG</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="lds-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">
        <!-- Navbar Area -->
        <div class="oneMusic-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
 <nav class="classy-navbar justify-content-between" id="oneMusicNav">

                        <!-- Nav brand -->
                        <a href="{{ url('/') }}" class="nav-brand"><h1 style="color: white;">RAJMUSIC</h1></a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li><a href="{{ url('/') }}">Home</a></li>
                                    <li><a href="#">Songs</a>
                                         <ul class="dropdown">
                                        @foreach($categories as $category)
                                            <li><a href="#">{{ $category->name }}</a></li>
                                        @endforeach

                                          <!--   <li><a href="#">Dropdown</a>
                                                <ul class="dropdown">
                                                    <li><a href="#">Even Dropdown</a></li>
                                                    <li><a href="#">Even Dropdown</a></li>
                                                    <li><a href="#">Even Dropdown</a></li>
                                                    <li><a href="#">Even Dropdown</a>
                                                        <ul class="dropdown">
                                                            <li><a href="#">Deeply Dropdown</a></li>
                                                            <li><a href="#">Deeply Dropdown</a></li>
                                                            <li><a href="#">Deeply Dropdown</a></li>
                                                            <li><a href="#">Deeply Dropdown</a></li>
                                                            <li><a href="#">Deeply Dropdown</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="#">Even Dropdown</a></li>
                                                </ul>
                                            </li> -->
                                        </ul>
                                    </li>
                                    <li><a href="{{ url('events') }}">Events</a></li>
                                    <li><a href="{{ url('blog') }}">News</a></li>
                                    <li>
                                        @if (Route::has('login'))     
                                        @auth
                                        @if (Auth::user()->role == 0)
                                            <a href="{{ url('profile') }}">Profile</a>
                                        @elseif (Auth::user()->role == 1)
                                            <a href="{{ route('dashboard')}}">
                                                <button style="color: white; background: transparent;" class="btn">
                                                    Admin Board
                                                </button>
                                            </a>  
                                        @endif
                    
                                        @else
                                            <a href="#">Contact</a>
                                            @endif
                                        @endauth
                                        
                                    </li>
                                    @if (Route::has('login'))
                                     @auth
                                    <li><form action="{{ route('logout') }}" method="POST">
                                                @csrf
                                                 <button class="btn " style="color: white; font-weight: bolder; background: transparent;" :href="route('logout')"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                             </button>
                                            </form> 
                                    </li>
                                      @endif
                                    @endauth
                                </ul>

                                <!-- Login/Register & Cart Button -->
                                <div class="login-register-cart-button d-flex align-items-center">
                                    <!-- Login/Register -->
                                    <div class="login-register-btn mr-50">
                                         @if (Route::has('login'))     
                                        @auth
                                            <h4 style="color: white;">{{ Auth::user()->name }}</h4>    
                                        @else
                                            <a href="{{ url('login') }}" id="loginBtn">Login / Register</a>
                                            @endif
                                        @endauth
                                        
                                    </div>

                                    <!-- Cart Button -->
                                    <div class="cart-btn">
                                        <p><span class="fa fa-music"></span></p>
                                    </div>
                                </div>
                            </div>
                            <!-- Nav End -->

                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img bg-overlay" style="background-image: url(https://img.freepik.com/free-photo/professional-microphone-blurred-background-sound-recording-concept_169016-23574.jpg?uid=R155244718&ga=GA1.1.1867707626.1720561323&semt=ais_hybrid);">
        <div class="bradcumbContent">
            <p>See what’s new</p>
            <h2>News</h2>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Blog Area Start ##### -->
    <div class="blog-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-9">

                    <!-- Single Post Start -->
                    <div class="single-blog-post mb-100 wow fadeInUp" data-wow-delay="100ms">
                        <!-- Post Thumb -->
                        <div class="blog-post-thumb mt-30">
                            <a href="#"><img src="img/bg-img/blog1.jpg" alt=""></a>
                            <!-- Post Date -->
                            <div class="post-date">
                                <span>15</span>
                                <span>June ‘18</span>
                            </div>
                        </div>

                        <!-- Blog Content -->
                        <div class="blog-content">
                            <!-- Post Title -->
                            <a href="#" class="post-title">5 Festivals you shouldn’t miss this summer</a>
                            <!-- Post Meta -->
                            <div class="post-meta d-flex mb-30">
                                <p class="post-author">By<a href="#"> Admin</a></p>
                                <p class="tags">in<a href="#"> Events</a></p>
                                <p class="tags"><a href="#">2 Comments</a></p>
                            </div>
                            <!-- Post Excerpt -->
                            <p>Pellentesque sit amet velit a libero viverra porta non eu justo. Vivamus mollis metus sem, ac sodales dui lobortis. Pellentesque sit amet velit a libero viverra porta non eu justo. Vivamus mollis metus sem, ac sodales dui lobortis.</p>
                        </div>
                    </div>

                    <!-- Single Post Start -->
                    <div class="single-blog-post mb-100 wow fadeInUp" data-wow-delay="100ms">
                        <!-- Post Thumb -->
                        <div class="blog-post-thumb mt-30">
                            <a href="#"><img src="img/bg-img/blog2.jpg" alt=""></a>
                            <!-- Post Date -->
                            <div class="post-date">
                                <span>15</span>
                                <span>June ‘18</span>
                            </div>
                        </div>

                        <!-- Blog Content -->
                        <div class="blog-content">
                            <!-- Post Title -->
                            <a href="#" class="post-title">5 Festivals you shouldn’t miss this summer</a>
                            <!-- Post Meta -->
                            <div class="post-meta d-flex mb-30">
                                <p class="post-author">By<a href="#"> Admin</a></p>
                                <p class="tags">in<a href="#"> Events</a></p>
                                <p class="tags"><a href="#">2 Comments</a></p>
                            </div>
                            <!-- Post Excerpt -->
                            <p>Pellentesque sit amet velit a libero viverra porta non eu justo. Vivamus mollis metus sem, ac sodales dui lobortis. Pellentesque sit amet velit a libero viverra porta non eu justo. Vivamus mollis metus sem, ac sodales dui lobortis.</p>
                        </div>
                    </div>

                    <!-- Single Post Start -->
                    <div class="single-blog-post mb-100 wow fadeInUp" data-wow-delay="100ms">
                        <!-- Post Thumb -->
                        <div class="blog-post-thumb mt-30">
                            <a href="#"><img src="img/bg-img/blog3.jpg" alt=""></a>
                            <!-- Post Date -->
                            <div class="post-date">
                                <span>15</span>
                                <span>June ‘18</span>
                            </div>
                        </div>

                        <!-- Blog Content -->
                        <div class="blog-content">
                            <!-- Post Title -->
                            <a href="#" class="post-title">5 Festivals you shouldn’t miss this summer</a>
                            <!-- Post Meta -->
                            <div class="post-meta d-flex mb-30">
                                <p class="post-author">By<a href="#"> Admin</a></p>
                                <p class="tags">in<a href="#"> Events</a></p>
                                <p class="tags"><a href="#">2 Comments</a></p>
                            </div>
                            <!-- Post Excerpt -->
                            <p>Pellentesque sit amet velit a libero viverra porta non eu justo. Vivamus mollis metus sem, ac sodales dui lobortis. Pellentesque sit amet velit a libero viverra porta non eu justo. Vivamus mollis metus sem, ac sodales dui lobortis.</p>
                        </div>
                    </div>

                    <!-- Pagination -->
                    <div class="oneMusic-pagination-area wow fadeInUp" data-wow-delay="300ms">
                        <nav>
                            <ul class="pagination">
                                <li class="page-item active"><a class="page-link" href="#">01</a></li>
                                <li class="page-item"><a class="page-link" href="#">02</a></li>
                                <li class="page-item"><a class="page-link" href="#">03</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <div class="col-12 col-lg-3">
                    <div class="blog-sidebar-area">

                        <!-- Widget Area -->
                        <div class="single-widget-area mb-30">
                            <div class="widget-title">
                                <h5>Categories</h5>
                            </div>
                            <div class="widget-content">
                                <ul>
                                @foreach($categories as $category)
                                    <li><a href="#">{{ $category->name }}</a></li>
                                @endforeach
                                </ul>
                            </div>
                        </div>

                        <!-- Widget Area
                        <div class="single-widget-area mb-30">
                            <div class="widget-title">
                                <h5>Archive</h5>
                            </div>
                            <div class="widget-content">
                                <ul>
                                    <li><a href="#">February 2024</a></li>
                                    <li><a href="#">March 2024</a></li>
                                    <li><a href="#">April 2024</a></li>
                                    <li><a href="#">May 2024</a></li>
                                    <li><a href="#">June 2024</a></li>
                                </ul>
                            </div>
                        </div> -->

                        <!-- Widget Area -->
                        <div class="single-widget-area mb-30">
                            <div class="widget-title">
                                <h5>Tags</h5>
                            </div>
                            <div class="widget-content">
                                <ul class="tags">
                                    <li><a href="#">music</a></li>
                                    <li><a href="#">events</a></li>
                                    <li><a href="#">artists</a></li>
                                    <li><a href="#">press</a></li>
                                    <li><a href="#">mp3</a></li>
                                    <li><a href="#">videos</a></li>
                                    <li><a href="#">concerts</a></li>
                                    <li><a href="#">performers</a></li>
                                </ul>
                            </div>
                        </div>

                        <!-- Widget Area -->
                        <div class="single-widget-area mb-30">
                            <a href="#"><img src="https://img.freepik.com/free-photo/portrait-charming-curly-brunette-darkskinned-woman-pink-hoodie-colorful-sunglasses-drinking-coffee-listening-music-headphones-near-black-fence_197531-29454.jpg?uid=R155244718&ga=GA1.1.1867707626.1720561323&semt=ais_hybrid" alt="ads image 1"></a>
                        </div>

                        <!-- Widget Area -->
                        <div class="single-widget-area mb-30">
                            <a href="#"><img src="https://img.freepik.com/free-photo/flat-lay-composition-with-microphone-podcasts-black-studio-headphones-brown-background-with-coffee-laptop-learning-online-education-conceptxa_501050-117.jpg?uid=R155244718&ga=GA1.1.1867707626.1720561323&semt=ais_hybrid" alt="ads image 1"></a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Blog Area End ##### -->

    <!-- ##### Contact Area Start ##### -->
    <section class="contact-area section-padding-100 bg-img bg-overlay bg-fixed has-bg-img" style="background-image: url(img/bg-img/bg-2.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading white">
                        <p>See what’s new</p>
                        <h2>Get In Touch</h2>
                    </div>
                </div>
            </div>
                @if (session('status'))
                  <div class="alert alert-success">
                    {{ session('status') }}
                  </div>
                @endif
            <div class="row">
                <div class="col-12">
                    <!-- Contact Form Area -->
                    <div class="contact-form-area">
                        <form action="{{ route('home.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group wow fadeInUp" data-wow-delay="100ms">
                                        <input type="text" class="form-control" name="name" id="name" style="color: black;" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group wow fadeInUp" data-wow-delay="200ms">
                                        <input type="email" class="form-control" name="email" id="email" style="color: black;" placeholder="E-mail">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group wow fadeInUp" data-wow-delay="300ms">
                                        <input type="text" class="form-control" name="subject" id="subject" style="color: black;" placeholder="Subject">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group wow fadeInUp" data-wow-delay="400ms">
                                        <textarea name="message" class="form-control" name="message" id="message" style="color: black;" cols="30" rows="10" placeholder="Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-12 text-center wow fadeInUp" data-wow-delay="500ms">
                                    <button class="btn oneMusic-btn mt-30" type="submit">Send <i class="fa fa-angle-double-right"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Contact Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area">
        <div class="container">
            <div class="row d-flex flex-wrap align-items-center">
                <div class="col-12 col-md-6">
                    <a href="{{ url('/') }}"><h1 style="color: white;">RAJMUSIC</h1></a>
                    <p class="copywrite-text"><a href="#"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved 2024</a>
                </div>

                <div class="col-12 col-md-6">
                    <div class="footer-nav">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Albums</a></li>
                            <li><a href="#">Events</a></li>
                            <li><a href="#">News</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area Start ##### -->

    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
</body>

</html>