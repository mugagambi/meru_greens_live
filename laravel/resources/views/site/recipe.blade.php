@extends('layouts.master')
@section('flexslider')
    <link href="{{asset('plugins/flexslider/flexslider.css')}}" rel="stylesheet" media="screen"/>
@endsection
@section('title')
    {{$recipe->name}} recipe details -
@endsection
@section('breadcrump')
    <section id="inner-headline">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb">
                        <li><a href="{{route('index')}}"><i class="fa fa-home"></i></a></li>
                        <li><a href="{{route('products')}}">Products</a></li>
                        @if($recipe->product->sub_category->category == 'Fruits')
                            <li><a href="{{route('fruits')}}">Fruits</a></li>
                        @elseif($recipe->product->sub_category->category == 'Vegetables')

                            <li><a href="{{route('vegs')}}">Vegetables</a></li>
                        @endif
                        <li>
                            <a href="{{route('product', ['product_id' => $recipe->product->id])}}">{{$recipe->product->name}}</a>
                        </li>
                        <li class="active"><a href="#">{{$recipe->name}} recipe details</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('content')
    <section id="content">
        <div class="container">
            <h1>{{$recipe->name}} recipe details</h1>
            <hr class="colorgraph">
            <div class="row">
                @if(!$recipe->images->isEmpty())
                    <div class="col-md-6">
                        <div class="main-slider flexslider">
                            <ul class="slides">
                                @foreach($recipe->images as $image)
                                    <li>
                                        <img src="{{asset('storage/'.$image->image)}}">
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
                <div class="col-md-6">
                    <h3 class="text-center">{{$recipe->name}}</h3>
                    <br>
                    <div class="text-center">
                        @if($recipe->product->sub_category->category == 'Fruits')
                            <a href="{{route('fruits')}}"><span
                                        class="label label-success">{{$recipe->product->sub_category->category}}</span></a>
                        @elseif($recipe->product->sub_category->category == 'Vegetables')
                            <a href="{{route('vegs')}}"><span
                                        class="label label-success">{{$recipe->product->sub_category->category}}</span></a>
                        @endif
                        <a href="{{route('product_items')}}?category={{$recipe->product->sub_category->name}}"><span
                                    class="label label-success">{{$recipe->product->sub_category->name}}</span></a>
                        <a href="{{route('product', ['product_id' => $recipe->product->id])}}"><span
                                    class="label label-success">{{$recipe->product->name}}</span></a>
                    </div>
                    <hr>
                    <p>
                        {{$recipe->description}}
                    </p>
                    <hr>
                    <h4 class="text-center">Ingredients</h4>
                    <div>
                        <ul>
                            @foreach($recipe->ingredients as $ingredient)
                                <li>{{$ingredient->name}}</li>
                            @endforeach
                        </ul>
                    </div>
                    <hr>
                    <h4 class="text-center">How to make it</h4>
                    @foreach($recipe->procedures as $procedure)
                        <h5>step {{$loop->iteration}}</h5>
                        <p>{{$procedure->procedure}}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection