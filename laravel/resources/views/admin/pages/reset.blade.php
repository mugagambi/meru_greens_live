<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Meru Greens | Reset Password</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{asset('admin/css/admin_login.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="{{route('admin.dashboard')}}"><b>Meru </b> Greens Admin</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        @if (\Session::has('error'))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                </button>
                <h4><i class="icon fa fa-check"></i> Error!</h4>
                <p>{!!   \Session::get('error') !!}</p>
            </div><br/>
        @endif
        <p class="login-box-msg">Reset Password</p>

        <form action="{{route('admin-reset')}}" method="POST" role="form">
            {!! csrf_field() !!}
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
                <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}"
                       required>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }} has-feedback">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password"
                       required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </div>
            <button type="submit" class="btn btn-primary btn-block btn-flat">Reset Password</button>
        </form>
    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<script src="{{asset('/admin/js/admin_login.js')}}"></script>
</body>
</html>
