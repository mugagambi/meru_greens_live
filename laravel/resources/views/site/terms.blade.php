@extends('layouts.master')
@section('title')
    Our Terms & Conditions -
@endsection
@section('breadcrump')
    <section id="inner-headline">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb">
                        <li><a href="{{route('index')}}"><i class="fa fa-home"></i></a></li>
                        <li class="active">Our Terms & Conditions</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('content')
    <section id="content">
        <div class="container">
            @if($terms)
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h3 class="text-center">Terms and Conditions</h3>
                        <p><b>Last Updated: {{$terms->updated_at->toDayDateTimeString()}}</b></p>
                        {!! $terms->terms !!}
                    </div>
                </div>
            @else
                <div class="container">
                    <h5 class="text-center">Our Terms & Conditions have not yet updated.Check back later.</h5>
                </div>
            @endif
        </div>
    </section>
@endsection