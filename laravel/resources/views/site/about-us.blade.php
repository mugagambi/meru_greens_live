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
                            <div class="col-md-8">
                                <h4>Our Mission</h4>
                                <p>{{$about->mission}}</p>
                                <br>
                                <h4>Our Vision</h4>
                                <p>{{$about->vision}}</p>
                                <br>
                                <h4>About Us</h4>
                                {!! $about->about_us !!}
                            </div>
                            <div class="col-md-4">
                                @include('partials.contact')
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
