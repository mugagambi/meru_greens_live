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
                        <div class="col-md-3 col-lg-3 mt-4">
                            <div class="card">
                                @if(!$product->images->isEmpty())
                                    <a href="{{route('product',['slug' => $product->slug])}}"><img
                                                class="card-img-top img-responsive"
                                                src="{{asset('uploads/'.$product->images->first()->image)}}"></a>
                                @endif
                                <div class="card-block">
                                    <h4 class="card-title text-center">{{$product->name}}</h4>
                                    <div class="card-text">
                                        {{ str_limit($product->description, $limit = 200, $end = '...') }}
                                    </div>
                                </div>
                                <p class="text-center"><a
                                            href="{{route('product',['slug' => $product->slug])}}">Read
                                        More</a></p>
                                <div class="card-footer text-center">
                                    <div class="row">
                                        <div class="col-md-6 text-center">
                                            <p>
                                                <a class="btn btn-theme"
                                                   href="{{route('add_to_cart', ['id' => $product->id])}}">Order
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
                <div class="row">
                    <p class="text-center"><a href="{{route('product-category',['category' => 'fruits'])}}" class="btn btn-theme">View all fruits</a></p>
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
                            <div class="col-md-3 col-lg-3 mt-4">
                                <div class="card">
                                    @if(!$product->images->isEmpty())
                                        <a href="{{route('product',['slug' => $product->slug])}}"><img
                                                    class="card-img-top img-responsive"
                                                    src="{{asset('uploads/'.$product->images->first()->image)}}"></a>
                                    @endif
                                    <div class="card-block">
                                        <h4 class="card-title text-center">{{$product->name}}</h4>
                                        <div class="card-text">
                                            {{ str_limit($product->description, $limit = 200, $end = '...') }}
                                        </div>
                                    </div>
                                    <p class="text-center"><a
                                                href="{{route('product',['slug' => $product->slug])}}">Read
                                            More</a></p>
                                    <div class="card-footer text-center">
                                        <div class="row">
                                            <div class="col-md-6 text-center">
                                                <p>
                                                    <a class="btn btn-theme"
                                                       href="{{route('add_to_cart', ['id' => $product->id])}}">Order
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
                    <div class="row">
                        <p class="text-center"><a href="{{route('product-category',['category' => 'vegetables'])}}"
                                                  class="btn btn-theme">View vegetables</a>
                        </p>
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
                        <div class="col-md-3 col-lg-3 mt-4">
                            <div class="card">
                                @if(!$product->images->isEmpty())
                                    <a href="{{route('product',['slug' => $product->slug])}}"><img
                                                class="card-img-top img-responsive"
                                                src="{{asset('uploads/'.$product->images->first()->image)}}"></a>
                                @endif
                                <div class="card-block">
                                    <h4 class="card-title text-center">{{$product->name}}</h4>
                                    <div class="card-text">
                                        {{ str_limit($product->description, $limit = 200, $end = '...') }}
                                    </div>
                                </div>
                                <p class="text-center"><a
                                            href="{{route('product',['slug' => $product->slug])}}">Read
                                        More</a></p>
                                <div class="card-footer text-center">
                                    <div class="row">
                                        <div class="col-md-6 text-center">
                                            <p>
                                                <a class="btn btn-theme"
                                                   href="{{route('add_to_cart', ['id' => $product->id])}}">Order
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
                <div class="row">
                    <p class="text-center"><a href="{{route('product-category',['category' => 'others'])}}" class="btn btn-theme">View all Other Categories</a>
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