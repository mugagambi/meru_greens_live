@extends('layouts.master')
@section('title')
    404 Not Found -
@endsection
@section('breadcrump')
    <section id="inner-headline">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb">
                        <li><a href="{{route('index')}}"><i class="fa fa-home"></i></a></li>
                        <li class="active">404 Not Found</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('content')
    <section id="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <h2 class="error">404</h2>
                        <p class="lead">Sorry your requested page not exist</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection