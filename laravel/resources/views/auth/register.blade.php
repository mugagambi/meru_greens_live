@extends('layouts.master')
@push('styles')
    <link rel="stylesheet" href="{{asset('css/bootstrap-social.css')}}">
@endpush
@section('title')
    Register -
@endsection
@section('breadcrump')
    <section id="inner-headline">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb">
                        <li><a href="{{route('index')}}"><i class="fa fa-home"></i></a></li>
                        <li class="active">Register</li>
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
                    <form role="form" class="register-form" method="POST" action="{{route('register')}}">
                        <h2>Please Sign Up
                            <small>To start ordering items</small>
                        </h2>
                        {{ csrf_field() }}
                        <hr class="colorgraph">
                        @if(empty($email))
                            <div class="row">
                                <label class="col-sm-4 control-label">Sign Up With:
                                </label>
                                <div class="col-sm-8">
                                    <a class="btn btn-social-icon btn-twitter" title="register with twitter"
                                       href="{{ url('login/twitter') }}">
                                        <span class="fa fa-twitter"></span>
                                    </a>
                                    <a class="btn btn-social-icon btn-facebook" title="register with facebook"
                                       href="{{ url('login/facebook') }}">
                                        <span class="fa fa-facebook"></span>
                                    </a>
                                    <a class="btn btn-social-icon btn-google" title="register with google"
                                       href="{{ url('login/google') }}">
                                        <span class="fa fa-google"></span>
                                    </a>
                                </div>
                            </div>
                        @else
                            <div class="alert alert-warning alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                Now complete the following fields.
                                <ul>
                                    <li>Phone Number</li>
                                    <li>Password</li>
                                </ul>
                            </div>
                        @endif
                        <br/>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                    <label for="first_name">First Name</label>
                                    @if(!empty($first_name))
                                        <input type="text" name="first_name" id="first_name"
                                               class="form-control input-lg"
                                               placeholder="First Name" tabindex="1" value="{{ $first_name }}"
                                               required
                                               autofocus>
                                    @else
                                        <input type="text" name="first_name" id="first_name"
                                               class="form-control input-lg"
                                               placeholder="First Name" tabindex="1" value="{{ old('first_name') }}"
                                               required
                                               autofocus>
                                    @endif
                                    @if ($errors->has('first_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                    <label for="last_name">Last Name</label>
                                    @if(!empty($last_name))
                                        <input type="text" name="last_name" id="last_name" class="form-control input-lg"
                                               placeholder="Last Name" tabindex="2" value="{{ $last_name }}"
                                               required
                                               autofocus>
                                    @else
                                        <input type="text" name="last_name" id="last_name" class="form-control input-lg"
                                               placeholder="Last Name" tabindex="2" value="{{ old('last_name') }}"
                                               required
                                               autofocus>
                                    @endif
                                    @if ($errors->has('last_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
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
                                       placeholder="Email Address" tabindex="4" value="{{ old('email') }}" required>
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
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control input-lg"
                                           placeholder="Password" tabindex="5" required>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                           class="form-control input-lg" placeholder="Confirm Password" tabindex="6">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-4 col-sm-3 col-md-3">
                                <div class="checkbox">
                                    <label><input type="checkbox" name="terms"> I agree to <a
                                                href="#" data-toggle="modal" data-target="#t_and_c_m">Terms and
                                            Conditions</a></label>
                                    @if ($errors->has('terms'))
                                        <span class="help-block">
                                        <strong style="color: red">{{ $errors->first('terms') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-xs-8 col-sm-9 col-md-9">
                                By clicking <strong class="label label-success">Register</strong>, you agree to the <a
                                        href="#" data-toggle="modal" data-target="#t_and_c_m">Terms and Conditions</a>
                                set out by this site, including our Cookie Use.
                            </div>
                        </div>

                        <hr class="colorgraph">
                        <div class="row">
                            <div class="col-xs-12 col-md-6"><input type="submit" value="Register"
                                                                   class="btn btn-theme btn-block btn-lg" tabindex="7">
                            </div>
                            <div class="col-xs-12 col-md-6">Already have an account? <a href="{{route('login')}}">Sign
                                    In</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="t_and_c_m" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title" id="myModalLabel">Terms & Conditions</h4>
                        </div>
                        <div class="modal-body">
                            <h3 class="text-center">Terms and Conditions</h3>
                            <p><b>Last Updated: {{$terms->updated_at->toDayDateTimeString()}}</b></p>
                            {!! $terms->terms !!}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
        </div>
    </section>

@endsection