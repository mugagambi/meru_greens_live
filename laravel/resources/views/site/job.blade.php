@extends('layouts.master')
@section('title')
    {{$job->name}} -
@endsection
@section('breadcrump')
    <section id="inner-headline">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb">
                        <li><a href="{{route('index')}}"><i class="fa fa-home"></i></a></li>
                        <li><a href="{{route('jobs')}}"> Open Job Vacancies</a></li>
                        <li class="active"><a href="">{{$job->name}}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('content')
    <section id="content">
        <div class="container">
            @if($job)
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <img
                                class="card-img-top"
                                src="{{asset('storage/'.$job->image)}}"
                                class="img-responsive">
                        <h3 class="text-center">{{$job->name}}</h3>
                        <p><b>Posted: {{$job->created_at->toDayDateTimeString()}}</b></p>
                        <p class="text-center pull-right"><a
                                    href="mailto:{{$job->application_email}}?subject=application%20for%20job%20vacancy%20{{str_slug($job->name)}}"
                                    class="btn btn-default">Send application</a></p>
                        {!! $job->description !!}
                        <hr>
                        <p>To apply, send your application to <a
                                    href="mailto:{{$job->application_email}}?subject=application%20for%20job%20vacancy%20{{str_slug($job->name)}}">{{$job->application_email}}</a>
                        </p>
                    </div>
                </div>
            @else
                <h1>Our quality control policy not yet updated.Check back later. </h1>
            @endif
        </div>
    </section>
@endsection