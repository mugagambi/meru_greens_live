@extends('layouts.master')
@section('title')
    Open job Vacancies -
@endsection
@section('breadcrump')
    <section id="inner-headline">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb">
                        <li><a href="{{route('index')}}"><i class="fa fa-home"></i></a></li>
                        <li class="active"><a href="#"> Open Job Vacancies</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('content')
    <section id="content">
        <div class="container">
            <h1>Open job Vacancies
            </h1>
            <hr class="colorgraph">
            @if(!$jobs->isEmpty())
                <div class="container">
                    <h1 class="text-center">Open job Vacancies</h1>
                    <p class="text-center">Click on the vacancy to view more details </p>
                    @foreach($jobs->chunk(4) as $chunk)
                        <div class="row">
                            @foreach($chunk as $job)
                                <div class="col-sm-6 col-md-3 col-lg-3 mt-4">
                                    <div class="card">
                                        <a href="{{route('job',['job'=> $job->id])}}"><img
                                                    class="card-img-top"
                                                    src="{{asset('storage/'.$job->image)}}"
                                                    class="img-responsive"></a>
                                        <div class="card-block">
                                            <h4 class="card-title text-center">{{$job->name}}</h4>
                                            <div class="meta">
                                                <p><b>posted: {{$job->created_at->toDayDateTimeString()}}</b></p>
                                            </div>
                                            <div class="card-text">
                                                {{ $job->short_description }}
                                                <hr>
                                                <p>To apply, send your application to <a
                                                            href="mailto:{{$job->application_email}}?subject=application%20for%20job%20vacancy%20{{str_slug($job->name)}}">{{$job->application_email}}</a>
                                                </p>
                                            </div>
                                        </div>
                                        <p class="text-center"><a href="{{route('job',['job'=> $job->id])}}">View more
                                                details</a></p>
                                        <div class="card-footer text-center">
                                            <a href="mailto:{{$job->application_email}}?subject=application%20for%20job%20vacancy%20{{str_slug($job->name)}}"
                                               class="btn btn-default">Send application</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            @else
                <div class="container">
                    <h5 class="text-center">Sorry, there are no open job vacancies.Check back
                        later.</h5>
                </div>
            @endif
        </div>
    </section>
@endsection