@extends('layouts.master')
@section('title')
    About Us -
@endsection
@section('breadcrump')
    <section id="inner-headline">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb">
                        <li><a href="{{route('index')}}"><i class="fa fa-home"></i></a></li>
                        <li class="active">Our history,mission and vision</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('content')
    <section id="content">
        <div class="container">
            @if($about)
                <h1>About Us
                    <small>Our company history,motto, mission and vision</small>
                </h1>
                <hr class="colorgraph">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-sm-6 col-lg-6">
                                <h4><u>Our Mission</u></h4>
                                <p><strong>{{$about->mission}}</strong></p>
                                <br>
                                <h4><u>Our Vision</u></h4>
                                <p><strong>{{$about->vision}}</strong></p>
                                <br>
                                <h4><u>Our History</u></h4>
                                {!! $about->about_us !!}
                            </div>
                            <div class="col-sm-6 col-lg-6">
                                <h4>Welcome to our company</h4>
                                <div class="video-container">
                                    <iframe src="https://www.youtube.com/embed/BVuM6J5hbg8">
                                    </iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
            <h5 class="text-center">
                    Our company history,motto, mission and vision not yet updated.Check back latter
            </h5>
            @endif
        </div>
    </section>
@endsection
