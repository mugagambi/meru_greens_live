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
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h1>Shopping Cart</h1>
                    @if (\Session::has('success'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                            </button>
                            <h4><i class="icon fa fa-check"></i> Success!</h4>
                            <p>{{ \Session::get('success') }}</p>
                        </div><br/>
                    @endif
                    @if(!$cart->isEmpty())
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>
                                    Product Image
                                </th>
                                <th>
                                    Product Name
                                </th>
                                <th>
                                    Product Description
                                </th>
                                <th>
                                    Quantity
                                </th>
                                <th>
                                    Remove Item
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cart as $item)
                                <tr>
                                    <td>
                                        <img src="{{asset('uploads/'.$item->product->images->first()->image)}}"
                                             class="img-responsive">
                                    </td>
                                    <td>
                                        {{$item->product->name}}
                                    </td>
                                    <td>
                                        {{str_limit($item->product->description, 100)}}
                                        <a href="{{route('product', ['product' => $item->product->id])}}">Read more</a>
                                    </td>
                                    <td contenteditable='true'>
                                    {{$item->quantity}}
                                    <td>
                                        <form class="delete"
                                              action="{{route('remove_from_cart',['item' => $item->id])}}"
                                              method="post">
                                            {{csrf_field()}}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-danger btn-sm"
                                                    onclick="return ConfirmDelete()"
                                                    type="submit">Remove
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-6 text-left">
                                <a href="{{route('products')}}" class="btn btn-default">continue browsing items</a>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{route('confirm-order')}}" class="btn btn-theme">place order</a>
                            </div>
                        </div>
                    @else
                        <p class="text-center"><b>No items in the cart</b></p>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Change Quantity</h4>
                </div>
                <div class="modal-body">
                    <form class="form-inline">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail2">Quantity</label>
                            <input type="number" class="form-control" id="exampleInputEmail2"
                                   placeholder="Number of items to order" value="1">
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
@push('scripts')
    <script type="text/javascript">
        function ConfirmDelete() {
            return confirm("Remove this item from the cart?")
        }
    </script>
@endpush