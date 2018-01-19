@extends('admin.layouts.main')
@push('styles')
    <link href="{{asset('admin/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}" rel="stylesheet">
@endpush
@section('breadcrump')
    <h1>
        About Us
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">About Us</li>
    </ol>
@endsection
@section('content')
    <div class="row" id="admin">
        <div class="col-md-8 col-md-offset-2">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">About Us</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="POST" action="{{route('admin.about.store')}}">
                    {{csrf_field()}}
                    <input type="hidden" value="{{$about->id}}" name="id">
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
                            <label for="inputMission" class="col-sm-2 control-label">Our Mission</label>

                            <div class="col-sm-10">
                                <textarea class="form-control" rows="3"
                                          placeholder="Our Mission"
                                          name="mission">{{ $about->mission }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputVision" class="col-sm-2 control-label">Our Vision</label>

                            <div class="col-sm-10">
                                <textarea class="form-control" rows="3"
                                          placeholder="Our Vision"
                                          name="vision">{{ $about->vision }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputSynopsis" class="col-sm-2 control-label">About Synopsis</label>

                            <div class="col-sm-10">
                                <textarea class="form-control" rows="3"
                                          placeholder="About us synopsis"
                                          name="synopsis">{{ $about->synopsis }}</textarea>
                            </div>
                        </div>
                        <textarea class="textarea" placeholder="About Us, full story, history and future ambitions"
                                  name="about_us"
                                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $about->about_us }}</textarea>
                        <p class="text-center"><span class="help-block">
                    </span></p>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-right">save about us</button>
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