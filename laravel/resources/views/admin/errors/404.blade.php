@extends('admin.layouts.main')
@section('breadcrump')
    <h1>
        404 Error Page
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">404 error</li>
    </ol>
@endsection
@section('content')
    <section class="content">
        <div class="error-page">
            <h2 class="headline text-yellow"> 404</h2>

            <div class="error-content">
                <h3><i class="fa fa-warning text-yellow"></i> Oops! Page not found.</h3>

                <p>
                    {{ $error }}.
                    Meanwhile, you may <a href="{{route('admin.dashboard')}}">return to dashboard.</a>
                </p>

            </div>
            <!-- /.error-content -->
        </div>
        <!-- /.error-page -->
    </section>
@endsection