@extends('admin.layouts.main')
@section('breadcrump')
    <h1>
        Order OR{{$order->id}}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{route('orders')}}">Orders</a></li>
        <li class="active">OR{{$order->id}}</li>
    </ol>
@endsection
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Order OR{{$order->id}}<a href="{{route('orders')}}"
                                                            class="btn btn-default pull-right">Back</a>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-6">
                    <p class="text-center"><b>Names</b></p>
                    <p class="text-center">{{$order->names}}</p>
                    <p class="text-center"><b>Country</b></p>
                    <p class="text-center">{{$countries[$order->country]}}</p>
                    <p class="text-center"><b>County</b></p>
                    <p class="text-center">{{$order->county}}</p>
                </div>
                <div class="col-sm-6">
                    <p class="text-center"><b>Email</b></p>
                    <p class="text-center">{{$order->email}}</p>
                    <p class="text-center"><b>Phone</b></p>
                    <p class="text-center">{{$order->phone_number}}</p>
                    <p class="text-center"><b>Nearest Town</b></p>
                    <p class="text-center">{{$order->nearest_town}}</p>
                </div>
            </div>
        </div>
    </div>
    <h2 class="text-center">Ordered Items</h2>
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    <ul class="list-group">
                        @foreach($items->items as $product)
                            <li class="list-group-item">
                                <span class="badge">{{ $product['qty'] }} Kg(s)</span>
                                <strong>{{$product['item']['name']}}</strong>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection