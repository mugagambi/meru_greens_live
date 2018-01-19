@extends('admin.layouts.main')
@push('styles')
    <link href="{{asset('admin/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}" rel="stylesheet">
@endpush
@section('breadcrump')
    <h1>
        Add new vacancy
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{route('careers.index')}}"><i class="fa fa-users"></i> Job Vacancies</a></li>
        <li class="active">Add new vacancy</li>
    </ol>
@endsection
@section('content')
    <div class="row" id="admin">
        <div class="col-md-8 col-md-offset-2">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Add new vacancy</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="POST" action="{{route('careers.store')}}"
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
                            <label for="inputName" class="col-sm-2 control-label">Job Name</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" id="inputName"
                                       value="{{ old('name') }}"
                                       placeholder="Job Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Application Email</label>

                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="email" id="inputEmail3"
                                       value="{{ old('email') }}"
                                       placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPic" class="col-sm-2 control-label">Feature Job Image</label>

                            <div class="col-sm-10">
                                <input type="file" name="pic"
                                       value="{{ old('pic') }}"
                                       id="inputPic">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputSynopsis" class="col-sm-2 control-label">Job Short Description</label>

                            <div class="col-sm-10">
                                <textarea class="form-control" rows="3"
                                          placeholder="Job short description"
                                          name="short_description">{{ old('short_description') }}</textarea>
                            </div>
                        </div>
                        <textarea class="textarea"
                                  placeholder="Job full description, application details and requirements to apply"
                                  name="description"
                                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('description') }}</textarea>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{route('admins.index')}}" class="btn btn-default">Cancel</a>
                        <button type="submit" class="btn btn-success pull-right">Add vacancy</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{asset('admin/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
    <script>
        $('.textarea').wysihtml5()
    </script>
@endpush