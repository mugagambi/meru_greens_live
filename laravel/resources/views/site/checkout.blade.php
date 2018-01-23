@extends('layouts.master')
@section('title')
    Check Out -
@endsection
@section('breadcrump')
    <section id="inner-headline">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb">
                        <li><a href="{{route('index')}}"><i class="fa fa-home"></i></a></li>
                        <li class="active">Check Out</li>
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
                <div class="col-sm-6 col-sm-offset-3">
                    <h4 class="text-center">
                        Complete Order
                    </h4>
                    <p>Complete this order by signing in.</p>
                    <p><i>If you sign in, your order will be saved and you can access it latter in your account</i></p>
                    <a class="btn btn-theme btn-block" href="{{route('login')}}">Sign In</a>
                    <hr>
                    <h5 class="text-center">
                        or fill in the form to quickly complete the order
                    </h5>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{route('placeOrder')}}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="names">Full Name <sup>*</sup></label>
                            <input type="text" name="full_name" class="form-control" id="names" placeholder="John Doe"
                                   required value="{{ old('full_name') }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" name="email" id="exampleInputEmail1"
                                   placeholder="doe@gmail.com" value="{{ old('email') }}">
                            <p class="help-text">The email is optional</p>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number <sup>*</sup></label>
                            <input type="string" class="form-control" name="phone_number" id="phone_number"
                                   placeholder="0712345678" value="{{ old('phone_number') }}"
                                   required>
                        </div>
                        <div class="form-group">
                            <label for="county">County <sup>*</sup></label>
                            <input type="text" class="form-control" id="county" name="county"
                                   value="{{ old('county') }}" placeholder="Meru"
                                   required>
                        </div>
                        <div class="form-group">
                            <label for="town">Nearest Town <sup>*</sup></label>
                            <input type="text" class="form-control" id="town" name="nearest_town"
                                   placeholder="Meru Town" value="{{ old('nearest_town') }}"
                                   required>
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                    <p class="help-text"><sup>*</sup> Fields are required</p>
                </div>
            </div>
        </div>
    </section>
@endsection