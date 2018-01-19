@extends('admin.layouts.main')
@section('breadcrump')
    <h1>
        Add Team Member
        <small>Add Team Member</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{route('teams.index')}}"><i class="fa fa-users"></i> Teams</a></li>
        <li class="active">Add Team Member</li>
    </ol>
@endsection
@section('content')
    <div class="row" id="admin">
        <div class="col-md-8 col-md-offset-2">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Team Member</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="POST" action="{{route('teams.store')}}"
                      enctype="multipart/form-data">
                    {{csrf_field()}}
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
                            <label for="inputName" class="col-sm-2 control-label">Name <sup>*</sup></label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" id="inputName"
                                       value="{{ old('name') }}"
                                       placeholder="Team Member Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputJob" class="col-sm-2 control-label">Job Title <sup>*</sup></label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="job_title" id="inputJob"
                                       value="{{ old('job_title') }}"
                                       placeholder="Admin Job Title">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPic" class="col-sm-2 control-label">Featured Pic <sup>*</sup></label>

                            <div class="col-sm-10">
                                <input type="file" name="pic"
                                       value="{{ old('pic') }}"
                                       id="inputPic">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Facebook Account</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputPassword3"
                                       value="{{ old('facebook') }}" name="facebook"
                                       placeholder="Facebook account url">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Twitter Account</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputPassword3"
                                       value="{{ old('twitter') }}" name="twitter"
                                       placeholder="Twitter account url">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">About Team Member <sup>*</sup></label>
                            <div class="col-sm-10">
                            <textarea class="form-control" rows="3" name="about"
                                      placeholder="short detail about this team member">{{ old('about') }}</textarea>
                            </div>
                        </div>
                        <p class="text-center"><span class="help-block">
                        <strong><sup>*</sup> Fields are required</strong>
                    </span></p>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{route('teams.index')}}" class="btn btn-default">Cancel</a>
                        <button type="submit" class="btn btn-success pull-right">Add Team Member</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection