@extends('layouts.master')
@section('title')
    Shopping Cart -
@endsection
@section('breadcrump')
    <section id="inner-headline">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb">
                        <li><a href="{{route('index')}}"><i class="fa fa-home"></i></a></li>
                        <li class="active">Shopping Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('content')
    <section id="content">
        <div class="container">
            <h3 class="text-center">My Shopping Cart</h3>
            @if (\Session::has('order-received'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <strong>Success!</strong> {{Session::get('order-received')}}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(Session::has('cart'))
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <ul class="list-group">
                            @foreach($products as $product)
                                <li class="list-group-item">
                                    <span class="badge">{{ $product['qty'] }} Kg(s)</span>
                                    <strong>{{$product['item']['name']}}</strong>
                                    <button type="button" class="btn btn-primary btn-xs dropdown-toggle"
                                            data-toggle="dropdown">Action <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#" data-toggle="modal" data-target="#myModal"
                                               data-id="{{$product['item']['id']}}"
                                               data-name="{{$product['item']['name']}}">Change No. of Kgs</a>
                                        </li>
                                        <li><a href="{{route('remove_from_cart',['item' => $product['item']['id']])}}">Remove
                                                item from cart</a></li>
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <a href="{{route('checkout')}}" class="btn btn-theme">Checkout</a>
                        <a href="{{route('emptyCart')}}" class="btn btn-danger pull-right">empty cart</a>
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <h5 class="text-center">No items in cart</h5>
                    </div>
                </div>
            @endif
        </div>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"></h4>
                </div>
                <div class="modal-body">
                    <form class="form-inline" method="post" action="{{route('updateQty')}}">
                        {{ csrf_field() }}
                        <input type="hidden" id="product_id" name="product_id">
                        <div class="form-group">
                            <label for="exampleInputEmail2">Kgs</label>
                            <input type="number" name="amount" class="form-control" id="exampleInputEmail2"
                                   placeholder="Number of kilos to order">
                        </div>
                        <button type="submit" class="btn btn-theme">Update</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
@endsection