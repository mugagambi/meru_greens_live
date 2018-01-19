@extends('layouts.master')
@section('title')
    Quality Control Policy -
@endsection
@section('breadcrump')
    <section id="inner-headline">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb">
                        <li><a href="{{route('index')}}"><i class="fa fa-home"></i></a></li>
                        <li class="active">Our Quality Control Policy</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('content')
    <section id="content">
        <div class="container">
            @if($quality)
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h3 class="text-center">Quality Control Policy</h3>
                        <p><b>Last Updated: {{$quality->updated_at->toDayDateTimeString()}}</b></p>
                        {!! $quality->quality_control !!}
                    </div>
                </div>
            @else
                <h1>Our quality control policy not yet updated.Check back later. </h1>
            @endif
        </div>
    </section>
@endsection