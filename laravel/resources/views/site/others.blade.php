@extends('layouts.master')
@section('title')
    Other  Categories -
@endsection
@section('breadcrump')
    <section id="inner-headline">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb">
                        <li><a href="{{route('index')}}"><i class="fa fa-home"></i></a></li>
                        <li><a href="{{route('products')}}">Products</a></li>
                        <li class="active">Others</li>
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
                <h1 class="text-center">Other Category</h1>
                <p class="text-center">Click on a category to view it's products </p>
                @foreach($subs->chunk(6) as $chunk)
                    <div class="row">
                        @foreach($chunk as $product)
                            <div class="col-sm-3 col-md-2 col-lg-2">
                                <a href="{{route('product_items')}}?category={{$product->name}}"
                                   title="click to view {{$product->name}} products"><img
                                            class="card-img-top img-responsive"
                                            src="{{asset('uploads/'.$product->pic)}}"></a>
                                <p class="text-center"><b><u><a
                                                    href="{{route('product_items')}}?category={{$product->name}}"
                                                    title="click to view {{$product->name}} products">{{$product->name}}</a></u></b>
                                </p>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        @else
            <div class="container">
                <h5 class="text-center">Sorry, there are no other categories right now.Check back later.</h5>
            </div>

        @endif
    </section>
@endsection