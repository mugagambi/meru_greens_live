@extends('layouts.master')
@section('title')
    The Vegetables Categories -
@endsection
@section('breadcrump')
    <section id="inner-headline">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb">
                        <li><a href="{{route('index')}}"><i class="fa fa-home"></i></a></li>
                        <li><a href="{{route('products')}}">Products</a></li>
                        <li class="active">vegetables</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('content')
    <section id="content">
        @if(!$subs->isEmpty())
            <div class="container">
                <h1 class="text-center">Vegetables</h1>
                <p class="text-center">Click on a vegetable to view it's products </p>
                @foreach($subs->chunk(6) as $chunk)
                    <div class="row">
                        @foreach($chunk as $product)
                            <div class="col-sm-3 col-md-2 col-lg-2">
                                <a href="{{route('product_items')}}?category={{$product->name}}"
                                   ><img
                                            class="card-img-top img-responsive"
                                            data-src="{{asset('uploads/'.$product->pic)}}"></a>
                                <p class="text-center"><b>{{$product->name}}</b>
                                </p>
                                <p class="text-center">
                                    <a
                                            href="{{route('product_items')}}?category={{$product->name}}">view products
                                    </a>
                                </p>
                            </div>
                        @endforeach
                    </div>
                @endforeach
                @else
                    <div class="container">
                        <h5 class="text-center">Sorry, there are no vegetable categories right now.Check back later.</h5>
                    </div>
        @endif
    </section>
@endsection