<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title') Meru Greens</title>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-121775474-2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'UA-121775474-2');
    </script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="Meru greens groceries"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#9AC43C">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#9AC43C">
    <!-- css -->
    @yield('flexslider')
    <link href="{{asset('css/styles.css')}}" rel="stylesheet" type="text/css">
    @stack('styles')
</head>

<body>


<div id="wrapper">
    <!-- start header -->
    <header>
        <div class="top">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="topleft-info">
                            <li><i class="fa fa-phone"></i> For HQ call +254 709 751 992 / For EPZ call +254 750 511 081
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <div id="sb-search" class="sb-search">
                            <form>
                                <input class="sb-search-input" placeholder="Enter your search term..." type="text"
                                       value="" name="search" id="search">
                                <input class="sb-search-submit" type="submit" value="">
                                <span class="sb-icon-search" title="Click to start searching"></span>
                            </form>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{route('index')}}"><img src="{{asset('img/logo.jpg')}}" alt=""
                                                                           height="71"/></a>
                </div>
                <div class="navbar-collapse collapse ">
                    <ul class="nav navbar-nav">
                        <li><a href="{{route('index')}}">Home</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown"
                               data-delay="0" data-close-others="false">About Us <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{route('about')}}">About Us, mission and vision</a></li>
                                <li><a href="{{route('team')}}">Our Team</a></li>
                                <li><a href="{{route('csr')}}">Our Corporate Social Responsibility</a></li>
                            </ul>

                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown"
                               data-delay="0" data-close-others="false">Products <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{route('product-category',['category' => 'fruits'])}}">Fruits</a></li>
                                <li><a href="{{route('product-category',['category' => 'vegetables'])}}">vegetables</a>
                                </li>
                                <li><a href="{{route('product-category',['category' => 'others'])}}">Others</a></li>
                            </ul>

                        </li>
                        <li><a href="{{route('quality-control')}}">Quality Control</a></li>
                        <li><a href="{{route('jobs')}}">Careers</a></li>
                        <li><a href="{{route('contact')}}">Contact Us</a></li>
                        @auth
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   data-hover="dropdown" data-delay="0" data-close-others="false"
                                   aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->first_name }} <i class="fa fa-angle-down"></i>
                                </a>

                                <ul class="dropdown-menu">
                                    <li><a href="">My orders</a></li>
                                    <li><a href="{{route('update-form')}}">Update my details</a></li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>

                        @endauth
                        @guest
                            <li><a href="{{route('login')}}">Login</a></li>
                        @endguest
                        <li>
                            <a href="{{ route('product.shopping-cart') }}">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                Shopping Cart <span
                                        class="badge">{{ Session::has('cart') ? count(Session::get('cart')->items) : '' }}</span>
                            </a>
                        </li>
                        @auth('admin')
                            <li><a href="{{route('admin.dashboard')}}">Admin</a></li>
                        @endauth
                        <li class="hidden-md hidden-lg hidden-sm"><a href="#">Log In</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!-- end header -->
    @yield('breadcrump')
    @yield('content')
    @if (\Session::has('item-added'))
        <div class="myAlert-top alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            <strong>Success!</strong> {{Session::get('item-added')}}
        </div>
    @endif
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-3 col-lg-3">
                    <div class="widget">
                        <h4>Get in touch with us</h4>
                        <address>
                            <strong>Meru Greens Horticulture Ltd</strong><br>
                            P.O BOX 1730 - 60200<br>
                            Meru,Kenya
                        </address>
                        <p>
                            <i class="fa fa-map-marker"> Gatimbi, Meru County, Kenya</i><br>
                            <i class="fa fa-phone"></i> For HQ call +254709751992 / For EPZ call +254 750 511 081 <br>
                            <i class="fa fa-envelope"></i> info@merugreens.com<br>
                            <i class="fa fa-envelope"></i> sales@merugreens.com<br>
                            <i class="fa fa-envelope"></i> careers@merugreens.com<br>
                        </p>
                    </div>
                </div>
                <div class="col-sm-3 col-lg-3">
                    <div class="widget">
                        <h4>Information</h4>
                        <ul class="link-list">
                            <li><a href="#">News</a></li>
                            <li><a href="{{route('terms')}}">Terms and conditions</a></li>
                            <li><a href="{{route('privacy')}}">Privacy policy</a></li>
                            <li><a href="{{route('jobs')}}">Career center</a></li>
                            <li><a href="{{route('contact')}}">Contact us</a></li>
                        </ul>
                    </div>

                </div>
                <div class="col-sm-3 col-lg-3">
                    <div class="widget">
                        <h4>Pages</h4>
                        <ul class="link-list">
                            <li><a href="{{route('products')}}">Products</a></li>
                            <li><a href="{{route('product-category',['category' => 'fruits'])}}">Fruits</a></li>
                            <li><a href="{{route('product-category',['category' => 'vegetables'])}}">Vegetables</a></li>
                            <li><a href="{{route('product-category',['category' => 'others'])}}">Other Categories</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3 col-lg-3">
                    <div class="widget">
                        <h4>Newsletter</h4>
                        <p>Fill your email and sign up for monthly newsletter to keep updated</p>
                        <div class="form-group multiple-form-group input-group">
                            <input type="email" name="email" class="form-control">
                            <span class="input-group-btn">
                            <button type="button" class="btn btn-theme btn-add">Subscribe</button>
                        </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="sub-footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="copyright">
                                    <p>&copy; {{date("Y")}}, Meru Greens Horticulture Ltd</p>
                                </div>
                            </div>
                            <div class="col-lg-6"><p>Developed by: <a href="#">Indevs Digital</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="row">
                            <div class="col-xs-12 col-xs-offset-2">
                                <ul class="social-network">
                                    <li><a href="#" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li><a href="#" data-placement="top" title="Twitter"><i
                                                    class="fa fa-twitter"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>

<!-- Placed at the end of the document so the pages load faster -->
<script src="{{asset('js/scripts.js')}}"></script>
@yield('scripts')
@stack('scripts')
</body>

</html>
