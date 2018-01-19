@extends('layouts.master')
@section('title')
    Corporate Social Responsibility -
@endsection
@section('breadcrump')
    <section id="inner-headline">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb">
                        <li><a href="{{route('index')}}"><i class="fa fa-home"></i></a></li>
                        <li class="active">Our Corporate Social Responsibility</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('content')
    <section id="content">
        <div class="container">
            @if($csr)
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        {!! $csr->csr !!}
                    </div>
                </div>
                @else
                <h1>Our Corporate Social Responsibility not yet updated.Check back later. </h1>
            @endif
        </div>
    </section>
@endsection