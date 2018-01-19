@extends('layouts.master')
@section('title')
    Update profile details
@endsection
@section('breadcrump')
    <section id="inner-headline">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb">
                        <li><a href="{{route('index')}}"><i class="fa fa-home"></i></a></li>
                        <li class="active">Update profile details</li>
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
                <div class="col-md-6 col-md-offset-3">
                    <h3 class="text-center">Update profile details</h3>
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                            </button>
                            <h4><i class="icon fa fa-ban"></i> Error!</h4>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (\Session::has('success'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                            </button>
                            <h4><i class="icon fa fa-check"></i> Success!</h4>
                            <p>{{ \Session::get('success') }}</p>
                        </div><br/>
                    @endif
                    <form action="{{route('store-update-form')}}" method="POST">
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="PUT">
                        <div class="form-group">
                            <label for="email">First Name:</label>
                            <input type="text" class="form-control" id="email" name="first_name"
                                   value="{{$user->first_name}}">
                        </div>
                        <div class="form-group">
                            <label for="email">Last Name:</label>
                            <input type="text" class="form-control" id="email" name="last_name"
                                   value="{{$user->last_name}}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email address:</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}">
                        </div>
                        <div class="form-group">
                            <label for="email">Phone Number:</label>
                            <input type="text" class="form-control" id="email" name="phone" value="{{$user->phone}}">
                        </div>
                        <button type="submit" class="btn btn-theme">Update</button>
                        <a href="{{route('change-password')}}">change password</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection