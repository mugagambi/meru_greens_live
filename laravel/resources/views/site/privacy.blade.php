@extends('layouts.master')
@section('title')
    Our Privacy Policy -
@endsection
@section('breadcrump')
    <section id="inner-headline">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb">
                        <li><a href="{{route('index')}}"><i class="fa fa-home"></i></a></li>
                        <li class="active">Our Privacy Policy</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('content')
    <section id="content">
        <div class="container">
            @if($privacy)
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h3 class="text-center">Privacy Policy</h3>
                        <p><b>Last Updated: {{$privacy->updated_at->toDayDateTimeString()}}</b></p>
                        {!! $privacy->privacy !!}
                    </div>
                </div>
            @else
                <div class="container">
                    <h5 class="text-center">Our privacy policy have not yet updated.Check back later.</h5>
                </div>
            @endif
        </div>
    </section>
@endsection