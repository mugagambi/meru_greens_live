@extends('layouts.master')
@section('title')
    {{$product->name}} recipes -
@endsection
@section('breadcrump')
    <section id="inner-headline">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb">
                        <li><a href="{{route('index')}}"><i class="fa fa-home"></i></a></li>
                        <li><a href="{{route('products')}}">Products</a></li>
                        @if($product->sub_category->category == 'Fruits')
                            <li><a href="{{route('fruits')}}">Fruits</a></li>
                        @elseif($product->sub_category->category == 'Vegetables')

                            <li><a href="{{route('vegs')}}">Vegetables</a></li>
                        @endif
                        <li><a href="{{route('product', ['product_id' => $product->id])}}">{{$product->name}}</a></li>
                        <li class="active"><a href="#">{{$product->name}} recipes</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('content')
    <section id="content">
        <div class="container">
            <h1>{{$product->name}} recipes
            </h1>
            <hr class="colorgraph">
            @if(!$product->recipes->isEmpty())
                <div class="container">
                    <h1 class="text-center">{{$product->name}} recipes</h1>
                    <p class="text-center">Click on the recipe to view more details</p>
                    @foreach($product->recipes->chunk(4) as $chunk)
                        <div class="row">
                            @foreach($chunk as $recipe)
                                <div class="col-sm-6 col-md-3 col-lg-3 mt-4">
                                    <div class="card">
                                        <a href="{{route('recipe', ['recipe' => $recipe->id])}}"><img
                                                    class="card-img-top"
                                                    src="{{asset('storage/'.$recipe->featured_image)}}"
                                                    class="img-responsive"></a>
                                        <div class="card-block">
                                            <h4 class="card-title text-center">{{$recipe->name}}</h4>
                                            <div class="meta text-center">
                                                <a href="{{route('product', ['product_id' => $product->id])}}"><span
                                                            class="label label-success">{{$product->name}}</span></a>
                                            </div>
                                            <div class="card-text">
                                                {{ str_limit($recipe->description, $limit = 200, $end = '...') }}
                                            </div>
                                        </div>
                                        <p class="text-center"><a
                                                    href="{{route('recipe', ['recipe' => $recipe->id])}}">Read
                                                More</a></p>
                                        <div class="card-footer text-center">
                                            <p>
                                                <a class="btn btn-theme"
                                                   href="{{route('recipe', ['recipe' => $recipe->id])}}">Ingredients &
                                                    Procedure</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            @else
                <div class="container">
                    <h5 class="text-center">sorry, there are no {{$product->name}} recipe currently.Check back
                        later.</h5>
                </div>
            @endif
        </div>
    </section>
@endsection