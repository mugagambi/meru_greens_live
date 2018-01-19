@extends('layouts.master')
@section('title')
    The Team -
@endsection
@section('breadcrump')
    <section id="inner-headline">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb">
                        <li><a href="{{route('index')}}"><i class="fa fa-home"></i></a></li>
                        <li class="active">Our Team</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('content')
    <section id="content">
        @if(!$members->isEmpty())
            <div class="container">
                <div class="heading-title text-center">
                    <h1>Our professionals </h1>
                    <p class="p-top-30 half-txt">Nam pulvinar vitae neque et porttitor. Praesent sed nisi eleifend.
                        Nam
                        pulvinar vitae neque et porttitor. Praesent sed nisi eleifend. </p>
                </div>
                @foreach($members->chunk(3) as $chunk)
                    <div class="row">
                        @foreach($chunk as $member)
                            <div class="col-md-4 col-sm-4">
                                <div class="team-member">
                                    <div class="team-img">
                                        <img src="{{asset('uploads/'.$member->pic)}}"
                                             alt="team member" class="img-responsive">
                                    </div>
                                    <div class="team-hover">
                                        <div class="desk">
                                            <p>{{$member->about}}</p>
                                        </div>
                                        <div class="s-link">
                                            <a href="{{$member->facebook}}" target="_blank"><i
                                                        class="fa fa-facebook"></i></a>
                                            <a href="{{$member->twitter}}" target="_blank"><i class="fa fa-twitter"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="team-title">
                                    <h5>{{$member->name}}</h5>
                                    <span>{{$member->job_title}}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
           @else
            <h1>The team details have not been updated yet.Check back later</h1>
        @endif
    </section>
@endsection