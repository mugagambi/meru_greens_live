@extends('admin.layouts.main')
@push('styles')
    <link rel="stylesheet" href="{{asset('admin/select2/dist/css/select2.min.css')}}">
@endpush
@section('breadcrump')
    <h1>
        Add Product
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{route('products.index')}}"><i class="fa fa-users"></i> products</a></li>
        <li class="active">Add Product</li>
    </ol>
@endsection
@section('content')
    <div class="row" id="admin">
        <div class="col-md-8 col-md-offset-2">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Product</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="POST" action="{{route('products.store')}}"
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
                        @if (\Session::has('error'))
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                                </button>
                                <h4><i class="icon fa fa-check"></i> Error!</h4>
                                <p>{{ \Session::get('error') }}</p>
                            </div><br/>
                        @endif
                        <div class="form-group">
                            <label for="inputName" class="col-sm-2 control-label">Name</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" id="inputName"
                                       value="{{ old('name') }}"
                                       placeholder="Product Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPic" class="col-sm-2 control-label">Category</label>
                            <div class="col-sm-10">
                                <select class="form-control select2" name="category">
                                    <option value="Fruits">Fruits</option>
                                    <option value="Vegetables">Vegetables</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputSynopsis" class="col-sm-2 control-label">Product Description</label>

                            <div class="col-sm-10">
                                <textarea class="form-control" rows="3"
                                          placeholder="product description"
                                          name="description">{{ old('description') }}</textarea>
                            </div>
                        </div>
                        <h3 class="text-center">Product Images </h3>
                        <div id="images">
                            <div class="form-group">
                                <label for="inputPic" class="col-sm-2 control-label">Image</label>

                                <div class="col-sm-10">
                                    <p class="pull-right" id="remove" style="cursor: pointer;"><i class="fa fa-remove"
                                                                                                  style="color: red;"></i>
                                        remove this
                                        image</p>
                                    <input type="file" name="pic[]"
                                           id="inputPic">
                                </div>
                            </div>
                        </div>
                        <p class="text-center"><a href="#" id="add"><i class="fa fa-plus"></i> Add one more image </a>
                        </p>

                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{route('products.index')}}" class="btn btn-default">Cancel</a>
                        <button type="submit" class="btn btn-success pull-right">Add Product</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{asset('admin/select2/dist/js/select2.full.min.js')}}"></script>
    <script src="{{asset('admin/js/create-product.js')}}">

    </script>
@endpush