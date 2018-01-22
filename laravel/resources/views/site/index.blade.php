@extends('layouts.master')
@section('flexslider')
    <link href="{{asset('plugins/flexslider/flexslider.css')}}" rel="stylesheet" media="screen"/>
@endsection
@section('content')
    @if(!$sliders->isEmpty())
        <section id="featured" class="bg">
            <!-- start slider -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Slider -->
                        <div id="main-slider" class="main-slider flexslider">
                            <ul class="slides">
                                @foreach($sliders as $slider)
                                    <li>
                                        <img src="{{asset('uploads/'.$slider->image)}}" alt="" height="400"
                                             style="object-fit: cover;"/>
                                        <div class="flex-caption">
                                            <h3>{{$slider->title}}</h3>
                                            <p>{{$slider->short_synopsis}}</p>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- end slider -->
                    </div>
                </div>
            </div>


        </section>
    @endif
    <section class="callaction">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="cta-text">
                        <h2>Gold is yellow ... soil is Gold</h2>
                        <p>We are the best fruit and vegetable producer and marketer in the region</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cta-btn">
                        <a href="{{route('products')}}" class="btn btn-theme btn-lg">Browse Products <i
                                    class="fa fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-8">
                            <h4>About our company</h4>
                            @if($about_us)
                                <p>
                                    {{$about_us->synopsis}}
                                </p>

                                <a href="{{route('about')}}" class="btn btn-theme">Read More About Us</a>
                            @else
                                <p>About us not updated yet.Check back later</p>
                            @endif
                        </div>
                        <div class="col-md-4">
                            <h4 class="text-center">Quick Contacts</h4>
                            <address>
                                <strong>Meru Greens Horticulture Ltd, Headquarters</strong><br>
                                P.O BOX 1730 - 60200<br>
                                MERU, KENYA
                            </address>
                            <p><b>Location: </b>Gatimbi, Meru County, Kenya</p>
                            <p><b>Mobile Phone:</b> +254709751992</p>
                            <p><b>Email:</b> <a href="mailto:info@merugreens.com">info@merugreens.com</a></p>
                            <p><b>Email:</b> <a href="mailto:sales@merugreens.com">sales@merugreens.com</a></p>
                            <hr>
                            <address>
                                <strong>Meru Greens Horticulture Ltd, EPZ</strong><br>
                                P.O BOX 607 - 00242<br>
                                KITENGELA, KENYA
                            </address>
                            <p><b>Location: </b>EPZ, Athi River, Off Jacaranda Road,
                                Kenya</p>
                            <p><b>Telephone:</b> 064-30529</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if(!$services->isEmpty())
            <div style="background-color: #fafafa;">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-center">
                                <h1>Our Services</h1>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($services as $service)
                            <div class="col-md-4 col-sm-6">
                                <div class="card">
                                    <img
                                            class="card-img-top img-responsive"
                                            data-src="{{asset('storage/'.$service->featured_image)}}">
                                    <div class="card-block">
                                        <h4 class="card-title text-center">{{$service->name}}</h4>
                                        <div class="card-text">
                                            {{$service->synopsis}}
                                        </div>
                                    </div>
                                    <div class="card-footer text-center">
                                        <p>
                                            <a class="btn btn-theme"
                                               href="#">Read more</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

    <!-- divider -->
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="solidline">
                    </div>
                </div>
            </div>
        </div>
        <!-- end divider -->
        @if(!$fruits->isEmpty())
            <div class="container">
                <h1 class="text-center">Our Top Fruits</h1>
                <p class="text-center">Click on a fruit to view it's products </p>
                <div class="row">
                    @foreach($fruits as $product)
                        <div class="col-md-3 col-lg-3 mt-4">
                            <div class="card">
                                @if(!$product->images->isEmpty())
                                    <a href="{{route('product',['slug' => $product->slug])}}"><img
                                                class="card-img-top img-responsive"
                                                src="{{asset('uploads/'.$product->images->first()->image)}}"></a>
                                @endif
                                <div class="card-block">
                                    <h4 class="card-title text-center">{{$product->name}}</h4>
                                    <div class="card-text">
                                        {{ str_limit($product->description, $limit = 200, $end = '...') }}
                                    </div>
                                </div>
                                <p class="text-center"><a
                                            href="{{route('product',['slug' => $product->slug])}}">Read
                                        More</a></p>
                                <div class="card-footer text-center">
                                    <div class="row">
                                        <div class="col-md-6 text-center">
                                            <p>
                                                @if(Auth::check())
                                                    <a class="btn btn-theme"
                                                       href="{{route('add_to_cart')}}?product={{$product->id}}">Order
                                                        now</a>
                                                @else
                                                    <button type="button" class="btn btn-theme"
                                                            data-toggle="modal"
                                                            data-target="#cartModal">Order
                                                        now
                                                    </button>
                                                @endif
                                            </p>
                                        </div>
                                        <div class="col-md-6 text-center">
                                            <p>
                                                <a href="{{route('recipes')}}?product={{$product->id}}"
                                                   class="btn btn-default float-right">view
                                                    recipes
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <p class="text-center"><a href="{{route('product-category',['category' => 'fruits'])}}"
                                              class="btn btn-theme">View fruits</a></p>
                </div>
            </div>
    @endif
    <!-- end divider -->
        <div style="background-color: #fafafa;">
            @if(!$vegs->isEmpty())
                <div class="container">
                    <h1 class="text-center">Our Top Vegetables</h1>
                    <p class="text-center">Click on a vegetable to view it's products </p>
                    <div class="row">
                        @foreach($vegs as $product)
                            <div class="col-md-3 col-lg-3 mt-4">
                                <div class="card">
                                    @if(!$product->images->isEmpty())
                                        <a href="{{route('product',['slug' => $product->slug])}}"><img
                                                    class="card-img-top img-responsive"
                                                    src="{{asset('uploads/'.$product->images->first()->image)}}"></a>
                                    @endif
                                    <div class="card-block">
                                        <h4 class="card-title text-center">{{$product->name}}</h4>
                                        <div class="card-text">
                                            {{ str_limit($product->description, $limit = 200, $end = '...') }}
                                        </div>
                                    </div>
                                    <p class="text-center"><a
                                                href="{{route('product',['slug' => $product->slug])}}">Read
                                            More</a></p>
                                    <div class="card-footer text-center">
                                        <div class="row">
                                            <div class="col-md-6 text-center">
                                                <p>
                                                    @if(Auth::check())
                                                        <a class="btn btn-theme"
                                                           href="{{route('add_to_cart')}}?product={{$product->id}}">Order
                                                            now</a>
                                                    @else
                                                        <button type="button" class="btn btn-theme"
                                                                data-toggle="modal"
                                                                data-target="#cartModal">Order
                                                            now
                                                        </button>
                                                    @endif
                                                </p>
                                            </div>
                                            <div class="col-md-6 text-center">
                                                <p>
                                                    <a href="{{route('recipes')}}?product={{$product->id}}"
                                                       class="btn btn-default float-right">view
                                                        recipes
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <p class="text-center"><a href="{{route('product-category',['category' => 'fruits'])}}" class="btn btn-theme">View vegetables</a>
                        </p>
                    </div>
                </div>
            @endif
        </div>
        <!-- end divider -->
        <!-- contact -->
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2>Contact us
                        <small>get in touch with us by filling form below</small>
                    </h2>
                    <hr class="colorgraph">
                    <div id="sendmessage">Your message has been sent.We will get back to you. Thank you!</div>
                    <div id="errormessage"></div>
                    <form action="" method="post" role="form" class="contactForm">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name"
                                   data-rule="minlen:4" data-msg="Please enter at least 4 chars"/>
                            <div class="validation"></div>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" id="email"
                                   placeholder="Your Email"
                                   data-rule="email" data-msg="Please enter a valid email"/>
                            <div class="validation"></div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="subject" id="subject"
                                   placeholder="Subject"
                                   data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject"/>
                            <div class="validation"></div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="message" id="text-area" rows="5" data-rule="required"
                                      data-msg="Please write something for us" placeholder="Message"></textarea>
                            <div class="validation"></div>
                        </div>

                        <div class="text-center">
                            <button type="submit" id="send" class="btn btn-theme btn-block btn-md">Send Message
                            </button>
                        </div>
                    </form>
                    <p id="sending"></p>
                    <hr class="colorgraph">

                </div>
            </div>
        </div>
        <!-- end contact -->

    </section>
@endsection