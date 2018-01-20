@extends('admin.layouts.main')
@section('breadcrump')
    <h1>
        Update Slider Image
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{route('slider.index')}}"><i class="fa fa-users"></i> Slider Images</a></li>
        <li class="active">Update Slider Image</li>
    </ol>
@endsection
@section('content')
    <div class="row" id="admin">
        <div class="col-md-8 col-md-offset-2">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Update Slider Image</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="POST"
                      action="{{route('slider.update', ['couresel' => $slider->id])}}"
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
                            <label for="inputTitle" class="col-sm-2 control-label">Title</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="title" id="inputTitle"
                                       value="{{ $slider->title }}"
                                       placeholder="Slider Title">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPic" class="col-sm-2 control-label">Image</label>

                            <div class="col-sm-10">
                                <input type="file" name="image"
                                       value="{{ old('image') }}"
                                       id="inputPic">
                                <p><b>Previous Image </b><a href="{{asset('uploads').'/'.$slider->image}}">
                                        {{$slider->image}}</a></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputTitle" class="col-sm-2 control-label">Short description</label>

                            <div class="col-sm-10">
                                    <textarea class="form-control" rows="3"
                                              placeholder="Description"
                                              name="short_synopsis">{{ $slider->short_synopsis }}</textarea>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{route('slider.index')}}" class="btn btn-default">Cancel</a>
                        <button type="submit" class="btn btn-success pull-right">update Item</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection