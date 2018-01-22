@extends('admin.layouts.main')
@push('styles')
    <link rel="stylesheet" href="{{asset('admin/select2/dist/css/select2.min.css')}}">
@endpush
@section('breadcrump')
    <h1>
        Update Product
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{route('products.index')}}"><i class="fa fa-users"></i> products</a></li>
        <li class="active">Update Product</li>
    </ol>
@endsection
@section('content')
    <div class="row" id="admin">
        <div class="col-md-8 col-md-offset-2">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Update Product</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="POST"
                      action="{{route('products.update', ['product' => $product->id])}}"
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
                                       value="{{ $product->name }}"
                                       placeholder="Product Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPic" class="col-sm-2 control-label">Sub Category</label>
                            <div class="col-sm-10">
                                <select class="form-control select2" name="category">
                                    <option value="Fruits" {{ ($product->category == 'Fruits') ? 'selected="selected"' : '' }}>
                                        Fruits
                                    </option>
                                    <option value="Vegetables" {{ ($product->category == 'Vegetables') ? 'selected="selected"' : '' }}>
                                        Vegetables
                                    </option>
                                    <option value="Others" {{ ($product->category == 'Others') ? 'selected="selected"' : '' }}>
                                        Others
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputSynopsis" class="col-sm-2 control-label">Product Description</label>

                            <div class="col-sm-10">
                                <textarea class="form-control" rows="3"
                                          placeholder="product description"
                                          name="description">{{ $product->description  }}</textarea>
                            </div>
                        </div>
                        <div id="images">
                        </div>
                        <p class="text-center"><a href="#" id="add"><i class="fa fa-plus"></i> Add one more image </a>
                        </p>

                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{route('products.index')}}" class="btn btn-default">Cancel</a>
                        <button type="submit" class="btn btn-success pull-right">Update Product</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
                <h3 class="text-center">Product Images </h3>
                @foreach($product->images->chunk(4) as $chunk)
                    <div class="row">
                        @foreach($chunk as $image)
                            <div class="col-md-3">
                                <div class="thumbnail">
                                    <a href="{{asset('uploads/'.$image->image)}}"> <img
                                                src="{{asset('uploads/'.$image->image)}}"
                                                class="img-responsive"></a>
                                    <div class="caption">
                                        <form class="delete"
                                              action="{{route('destroy-image',['product' => $product->id,'image' => $image->id])}}"
                                              method="post">
                                            {{csrf_field()}}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-danger btn-flat btn-sm"
                                                    onclick="return ConfirmDelete()"
                                                    type="submit">Remove this image
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{asset('admin/select2/dist/js/select2.full.min.js')}}"></script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2();
        });
    </script>
    <script>
        $(document).ready(function () {
            var add = $('#add');
            var wrapper = $('#images');
            var fieldHTML = '<div class="form-group">\n' +
                '                                <label for="inputPic" class="col-sm-2 control-label">Image</label>\n' +
                '\n' +
                '                                <div class="col-sm-10">\n' +
                '                                    <p class="pull-right" id="remove" style="cursor: pointer;"><i class="fa fa-remove"\n' +
                '                                                                                                  style="color: red;"></i>\n' +
                '                                        remove this\n' +
                '                                        image</p>\n' +
                '                                    <input type="file" name="pic[]"\n' +
                '                                           id="inputPic">\n' +
                '                                </div>\n' +
                '                            </div>';
            $(add).on('click', function () {
                $(wrapper).append(fieldHTML);
            });
            $(wrapper).on('click', '#remove', function (e) {
                $(this).parents('.form-group').remove();
            })
        });

        function ConfirmDelete() {
            return confirm("Delete this image?")
        }
    </script>
@endpush