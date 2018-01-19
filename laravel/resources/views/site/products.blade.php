@extends('layouts.master')
@section('title')
    {{$cat->name}} products -
@endsection
@section('breadcrump')
    <section id="inner-headline">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb">
                        <li><a href="{{route('index')}}"><i class="fa fa-home"></i></a></li>
                        <li><a href="{{route('products')}}">Products</a></li>
                        @if($cat->category == 'Fruits')
                            <li><a href="{{route('fruits')}}">Fruits</a></li>
                        @elseif($cat->category == 'Vegetables')
                            <li><a href="{{route('vegs')}}">Vegetables</a></li>
                        @endif
                        <li class="active"><a href="#">{{$cat->name}} products</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('content')
    <section id="content">
        <div class="container">
            <h1>{{$cat->name}} products
            </h1>
            <hr class="colorgraph">
            @if(!$cat->products->isEmpty())
                <div class="container">
                    <h1 class="text-center">{{$cat->name}} products</h1>
                    <p class="text-center">Click on the product to view more details and recipe </p>
                    @foreach($cat->products->chunk(4) as $chunk)
                        <div class="row">
                            @foreach($chunk as $product)
                                <div class="col-sm-6 col-md-3 col-lg-3 mt-4">
                                    <div class="card">
                                        @if(!$product->images->isEmpty())
                                            <a href="{{route('product',['product_id'=> $product->id])}}"><img
                                                        class="card-img-top"
                                                        src="{{asset('uploads/'.$product->images->first()->image)}}"
                                                        class="img-responsive"></a>
                                        @endif
                                        <div class="card-block">
                                            <h4 class="card-title text-center">{{$product->name}}</h4>
                                            <div class="meta text-center">
                                                @if($cat->category == 'Fruits')
                                                    <a href="{{route('fruits')}}"><span
                                                                class="label label-success">{{$cat->category}}</span></a>
                                                @elseif($cat->category == 'Vegetables')
                                                    <a href="{{route('vegs')}}"><span
                                                                class="label label-success">{{$cat->category}}</span></a>
                                                @endif
                                                <a href="{{route('product_items')}}?category={{$cat->name}}"><span
                                                            class="label label-success">{{$cat->name}}</span></a>
                                            </div>
                                            <div class="card-text">
                                                {{ str_limit($product->description, $limit = 200, $end = '...') }}
                                            </div>
                                        </div>
                                        <p class="text-center"><a
                                                    href="{{route('product',['product_id'=> $product->id])}}">Read
                                                More</a></p>
                                        <div class="card-footer text-center">
                                            <div class="row">
                                                <div class="col-md-6 text-center">
                                                    <p>
                                                        <a class="btn btn-theme"
                                                           href="{{route('add_to_cart')}}?product={{$product->id}}">Order
                                                            now</a>
                                                    </p>
                                                </div>
                                                <div class="col-md-6 text-center">
                                                    <p>
                                                        <a href="{{route('recipes')}}?product={{$product->id}}"
                                                           class="btn btn-default float-right">view
                                                            recipes
                                                        </a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            @else
                <div class="container">
                    <h5 class="text-center">sorry, there are no {{$cat->name}} products currently.Check back later.</h5>
                </div>
            @endif
        </div>
    </section>
@endsection