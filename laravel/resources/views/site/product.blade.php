@extends('layouts.master')
@section('flexslider')
    <link href="{{asset('plugins/flexslider/flexslider.css')}}" rel="stylesheet" media="screen"/>
@endsection
@section('title')
    {{$product->name}} details -
@endsection
@section('breadcrump')
    <section id="inner-headline">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb">
                        <li><a href="{{route('index')}}"><i class="fa fa-home"></i></a></li>
                        <li><a href="{{route('products')}}">Products</a></li>
                        <li class="active"><a href="#">{{$product->name}} details</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('content')
    <section id="content">
        <div class="container">
            <h1>{{$product->name}} details</h1>
            <hr class="colorgraph">
            <div class="row">
                @if(!$product->images->isEmpty())
                    <div class="col-md-6">
                        <div class="main-slider flexslider">
                            <ul class="slides">
                                @foreach($product->images as $image)
                                    <li>
                                        <img src="{{asset('uploads/'.$image->image)}}">
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
                <div class="col-md-6">
                    <h3 class="text-center">{{$product->name}}</h3>
                    <br>
                    <div class="text-center">
                        @if($product->sub_category->category == 'Fruits')
                            <a href="{{route('fruits')}}"><span
                                        class="label label-success">{{$product->sub_category->category}}</span></a>
                        @elseif($product->sub_category->category == 'Vegetables')
                            <a href="{{route('vegs')}}"><span
                                        class="label label-success">{{$product->sub_category->category}}</span></a>
                        @endif
                        <a href="{{route('product_items')}}?category={{$product->sub_category->name}}"><span
                                    class="label label-success">{{$product->sub_category->name}}</span></a>
                    </div>
                    <hr>
                    <p>
                        {{$product->description}}
                    </p>
                    <hr>
                    <div class="text-center">
                        <a class="btn btn-theme"
                           href="{{route('add_to_cart')}}?product={{$product->id}}"> Order
                            now
                        </a>
                        <a class="btn btn-primary float-right" href="{{route('recipes')}}?product={{$product->id}}">view
                            recipes</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection