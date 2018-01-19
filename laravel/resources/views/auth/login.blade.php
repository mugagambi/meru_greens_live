@extends('layouts.master')
@push('styles')
    <link rel="stylesheet" href="{{asset('css/bootstrap-social.css')}}">
@endpush
@section('title')
    Log in -
@endsection
@section('breadcrump')
    <section id="inner-headline">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb">
                        <li><a href="{{route('index')}}"><i class="fa fa-home"></i></a></li>
                        <li class="active">Log In</li>
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
                <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
                    <form role="form" class="register-form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <h2>Sign in
                            <small>To view your order history and continue ordering items</small>
                        </h2>
                        <hr class=" colorgraph">
                        <div class="row">
                            <label class="col-sm-3 control-label">Log In With:
                            </label>
                            <div class="col-sm-9">
                                <a class="btn btn-social-icon btn-twitter" title="log in with twitter"
                                   href="{{ url('login/twitter') }}">
                                    <span class="fa fa-twitter"></span>
                                </a>
                                <a class="btn btn-social-icon btn-facebook" title="log in with facebook"
                                   href="{{ url('login/facebook') }}">
                                    <span class="fa fa-facebook"></span>
                                </a>
                                <a class="btn btn-social-icon btn-google" title="log in with google"
                                   href="{{ url('login/google') }}">
                                    <span class="fa fa-google"></span>
                                </a>
                            </div>
                        </div>
                        <br/>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control input-lg"
                                   placeholder="Email Address" tabindex="4" value="{{ old('email') }}" required
                                   autofocus>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control input-lg" id="exampleInputPassword1"
                                   placeholder="Password" name="password" required>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="row">
                            <div class="col-xs-4 col-sm-3 col-md-3">
                                <div class="checkbox">
                                    <label><input type="checkbox" name="terms" {{ old('remember') ? 'checked' : '' }}>
                                        Remember me</label>
                                </div>
                            </div>
                        </div>

                        <hr class="colorgraph">
                        <div class="row">
                            <div class="col-xs-12 col-md-6"><input type="submit" value="Sign in"
                                                                   class="btn btn-theme  btn-block btn-lg"
                                                                   tabindex="7"></div>
                            <div class="col-xs-12 col-md-6">Don't have an account? <a
                                        href="{{route('register')}}">Register</a><br><a class=""
                                                                                        href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>
@endsection