@extends('layouts.master')
@section('title')
    Confirm Order -
@endsection
@section('breadcrump')
    <section id="inner-headline">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb">
                        <li><a href="{{route('index')}}"><i class="fa fa-home"></i></a></li>
                        <li class="active">Confirm order</li>
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
                    <h1>Confirm order</h1>
                    @if (\Session::has('success'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                            </button>
                            <h4><i class="icon fa fa-check"></i> Success!</h4>
                            <p>{{ \Session::get('success') }}</p>
                        </div><br/>
                    @endif
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <div class="card">
                                <div class="card-block">
                                    <h4 class="card-title text-center">Your Details</h4>
                                    <div class="card-text text-center">
                                        <p><b>First Name: </b>{{$user->first_name}}</p>
                                        <p><b>Last Name: </b>{{$user->last_name}}</p>
                                        <p><b>Email: </b>{{$user->email}}</p>
                                        <p><b>Phone Number</b> {{$user->phone}}</p>
                                    </div>
                                    <div class="card-footer text-center">
                                        <p><a href="{{route('update-form')}}" class="btn btn-theme">Update your
                                                details</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-center">
                            <div class="card">
                                <div class="card-block">
                                    <h4 class="card-title text-center">Shopping cart</h4>
                                    <div class="card-text text-center">
                                        <ul class="list-group">
                                            @foreach($cart as $item)
                                                <li class="list-group-item">{{$item->product->name}}
                                                    , {{$item->quantity}} unit(s) <span
                                                            class="pull-right"><form class="delete"
                                                                                     action="{{route('remove_from_cart',['item' => $item->id])}}"
                                                                                     method="post">
                                            {{csrf_field()}}
                                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-danger btn-sm"
                                                    onclick="return ConfirmDelete()"
                                                    type="submit">Remove
                                            </button>
                                        </form> </span></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="card-footer text-center">
                                        <p><a href="{{route('cart')}}" class="btn btn-theme">Update items</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 text-left">
                            <a href="{{route('products')}}" class="btn btn-default">continue browsing items</a>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{route('place-order')}}" class="btn btn-theme">Complete order</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script type="text/javascript">
        function ConfirmDelete() {
            return confirm("Remove this item from the cart?")
        }
    </script>
@endpush