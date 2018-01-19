@extends('admin.layouts.main')
@section('breadcrump')
    <h1>
        Update Admin Details
        <small>update system Admin</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{route('admins.index')}}"><i class="fa fa-users"></i> Admins</a></li>
        <li class="active">update Admin</li>
    </ol>
@endsection
@section('content')
    <div class="row" id="admin">
        <div class="col-md-8 col-md-offset-2">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Update system Admin Details</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="post" action="{{route('admins.update', ['admin' => $admin])}}"
                      enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="PUT">
                    <div class="box-body">
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
                        <div class="form-group">
                            <label for="inputName" class="col-sm-2 control-label">Name</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" id="inputName"
                                       value="{{ $admin->name }}"
                                       placeholder="Admin Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Email</label>

                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="email" id="inputEmail3"
                                       value="{{ $admin->email }}"
                                       placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputJob" class="col-sm-2 control-label">Job Title</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="job_title" id="inputJob"
                                       value="{{$admin->job_title}}"
                                       placeholder="Admin Job Title">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPic" class="col-sm-2 control-label">Profile Pic</label>

                            <div class="col-sm-10">
                                <input type="file" name="pic"
                                       value="{{ old('pic') }}"
                                       id="inputPic">
                                <p><b>previous profile pic : </b><a
                                            href="{{asset('uploads/thumbnails').'/'.$admin->pic}}">{{$admin->pic}}</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{route('admins.index')}}" class="btn btn-default">Cancel</a>
                        <button type="submit" class="btn btn-success pull-right">Update Admin Details</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection