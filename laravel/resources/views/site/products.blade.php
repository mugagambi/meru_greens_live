@extends('layouts.master')
@section('title')
    {{$cat}} products -
@endsection
@section('breadcrump')
    <section id="inner-headline">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb">
                        <li><a href="{{route('index')}}"><i class="fa fa-home"></i></a></li>
                        <li><a href="{{route('products')}}">Products</a></li>
                        @if($cat== 'fruits')
                            <li><a href="{{route('product-category',['category' => 'fruits'])}}">Fruits</a></li>
                        @elseif($cat == 'vegetables')
                            <li><a href="">Vegetables</a></li>
                        @elseif($cat == 'others')
                            <li><a href="">Others</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('content')
    <section id="content">
        <div class="container">
            <h1>{{$cat}} products
            </h1>
            <hr class="colorgraph">
            @if(!$products->isEmpty())
                <div class="container">
                    @if($cat == 'fruits')
                        <h1 class="text-center">Fruits</h1>
                    @elseif($cat == 'vegetables')
                        <h1 class="text-center">Vegetables</h1>
                    @else
                        <h1 class="text-center">Others</h1>
                    @endif

                    @foreach($products->chunk(4) as $chunk)
                        <div class="row">
                            @foreach($chunk as $product)
                                <div class="col-sm-6 col-md-3 col-lg-3 mt-4">
                                    <div class="card">
                                        @if(!$product->images->isEmpty())
                                            <a href="{{route('product',['slug' => $product->slug])}}"><img
                                                        class="card-img-top img-responsive"
                                                        data-src="{{asset('uploads/'.$product->images->first()->image)}}"></a>
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
                    @endforeach
                    {{ $products->links() }}
                </div>
            @else
                <div class="container">
                    <h5 class="text-center">sorry, there are no {{$cat}} products currently.Check back later.</h5>
                </div>
            @endif
        </div>
    </section>
    <div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <p class="text-center"><b>Order</b></p>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            <form role="form" class="register-form" method="POST" action="{{route('register')}}">
                                <h2>Fill the form
                                    <small>and start ordering items</small>
                                </h2>
                                {{ csrf_field() }}
                                <hr class="colorgraph">
                                <div class="row">
                                    <div class="">
                                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                            <label for="first_name"> Name</label>
                                            <input type="text" name="first_name" id="first_name"
                                                   class="form-control input-lg"
                                                   placeholder="First Name" tabindex="1"
                                                   value="{{ old('first_name') }}"
                                                   required
                                                   autofocus>
                                            @if ($errors->has('first_name'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email">Email</label>
                                    @if(!empty($email))
                                        <input type="email" name="email" id="email" class="form-control input-lg"
                                               placeholder="Email Address" tabindex="4" value="{{ $email }}" required>
                                    @else
                                        <input type="email" name="email" id="email" class="form-control input-lg"
                                               placeholder="Email Address" tabindex="4" value="{{ old('email') }}"
                                               required>
                                    @endif
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                    <label for="phone_number">Phone Number</label>
                                    <input type="text" name="phone" id="phone_number" class="form-control input-lg"
                                           placeholder="Phone Number" tabindex="3" value="{{ old('phone') }}" required
                                           autofocus>
                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <hr class="colorgraph">
                                <div class="row">
                                    <div class="col-xs-12 col-md-6"><input type="submit" value=""
                                                                           class="btn btn-theme btn-block btn-lg"
                                                                           tabindex="7">
                                    </div>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
    </div>
@endsection