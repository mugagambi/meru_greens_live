@extends('layouts.master')
@section('title')
    Change password
@endsection
@section('breadcrump')
    <section id="inner-headline">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb">
                        <li><a href="{{route('index')}}"><i class="fa fa-home"></i></a></li>
                        <li class="active">Change password</li>
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
                    <h3 class="text-center">Change password</h3>
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
                    @if (\Session::has('error'))
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                            </button>
                            <h4><i class="icon fa fa-check"></i> Error!</h4>
                            <p>{{ \Session::get('error') }}</p>
                        </div><br/>
                    @endif
                    <form action="{{route('store-change-password')}}" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="email">Old password:</label>
                            <input type="password" class="form-control" id="email" name="old_password">
                        </div>
                        <div class="form-group">
                            <label for="email">New password:</label>
                            <input type="password" class="form-control" id="email" name="new_password">
                        </div>
                        <div class="form-group">
                            <label for="email">Confirm new password:</label>
                            <input type="password" class="form-control" id="email" name="new_password_confirmation">
                        </div>
                        <button type="submit" class="btn btn-theme">Change Password</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection