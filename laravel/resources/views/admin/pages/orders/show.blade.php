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
        <div class="panel-body"></div>
        <div class="row">
            <div class="col-sm-6">
                <p class="text-center"><b>Names</b></p>
                <p class="text-center">{{$order->user->first_name}} {{$order->user->last_name}}</p>
                <p class="text-center"><b>Items</b></p>
                <p class="text-center">{{$order->items->count()}} item(s)</p>
            </div>
            <div class="col-sm-6">
                <p class="text-center"><b>Email</b></p>
                <p class="text-center">{{$order->user->email}}</p>
                <p class="text-center"><b>Phone</b></p>
                <p class="text-center">{{$order->user->phone}}</p>
            </div>
        </div>
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Product Name</th>
                <th>Qty</th>
            </tr>
            </thead>
            <tbody>
            @foreach($order->items as $product)
                <tr>
                    <td>{{$product->product->name}}</td>
                    <td>{{$product->quantity}} unit(s)</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection