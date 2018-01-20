@extends('layouts.master')
@section('title')
    Products -
@endsection
@section('breadcrump')
    <section id="inner-headline">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb">
                        <li><a href="{{route('index')}}"><i class="fa fa-home"></i></a></li>
                        <li class="active"><a href="#">Products</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('content')
    <section id="content">
        @if(!$fruits->isEmpty())
            <div class="container">
                <h1 class="text-center">Our Top Fruits</h1>
                <p class="text-center">Click on a fruit to view it's products </p>
                <div class="row">
                    @foreach($fruits as $product)
                        <div class="col-sm-6 col-xs-6 col-md-2 col-lg-2">
                            <a href="{{route('product_items')}}?category={{$product->name}}"
                               title="click to view {{$product->name}} products"><img
                                        class="card-img-top img-responsive"
                                        data-src="{{asset('uploads/'.$product->pic)}}"></a>
                            <p class="text-center"><b><u><a
                                                href="{{route('product_items')}}?category={{$product->name}}"
                                                title="click to view {{$product->name}} products">{{$product->name}}</a></u></b>
                            </p>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <p class="text-center"><a href="{{route('fruits')}}" class="btn btn-theme">View all fruits</a></p>
                </div>
            </div>

            <!-- divider -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="solidline">
                        </div>
                    </div>
                </div>
            </div>
        @endif
    <!-- end divider -->
        @if(!$vegs->isEmpty())
            <div class="container">
                <h1 class="text-center">Our Top Vegetables</h1>
                <p class="text-center">Click on a vegetable to view it's products </p>
                <div class="row">
                    @foreach($vegs as $product)
                        <div class="col-sm-6 col-xs-6 col-md-2 col-lg-2">
                            <a href="{{route('product_items')}}?category={{$product->name}}"
                               title="click to view {{$product->name}} products"><img
                                        class="card-img-top img-responsive"
                                        data-src="{{asset('uploads/'.$product->pic)}}"></a>
                            <p class="text-center"><b><u><a
                                                href="{{route('product_items')}}?category={{$product->name}}"
                                                title="click to view {{$product->name}} products">{{$product->name}}</a></u></b>
                            </p>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <p class="text-center"><a href="{{route('vegs')}}" class="btn btn-theme">View all vegetables</a>
                    </p>
                </div>
            </div>

            <!-- divider -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="solidline">
                        </div>
                    </div>
                </div>
            </div>
        @endif
    <!-- end divider -->
        @if(!$others->isEmpty())
            <div class="container">
                <h1 class="text-center">Other Categories</h1>
                <p class="text-center">Click on a category to view it's products </p>
                <div class="row">
                    @foreach($others as $product)
                        <div class="col-sm-6 col-xs-6 col-md-2 col-lg-2">
                            <a href="{{route('product_items')}}?category={{$product->name}}"
                               title="click to view {{$product->name}} products"><img
                                        class="card-img-top img-responsive"
                                        data-src="{{asset('uploads/'.$product->pic)}}"></a>
                            <p class="text-center"><b><u><a
                                                href="{{route('product_items')}}?category={{$product->name}}"
                                                title="click to view {{$product->name}} products">{{$product->name}}</a></u></b>
                            </p>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <p class="text-center"><a href="{{route('vegs')}}" class="btn btn-theme">View all Other Categories</a>
                    </p>
                </div>
            </div>

            <!-- divider -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="solidline">
                        </div>
                    </div>
                </div>
            </div>
    @endif
    <!-- end divider -->
    </section>
@endsection