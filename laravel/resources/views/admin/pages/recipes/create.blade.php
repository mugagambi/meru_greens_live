@extends('admin.layouts.main')
@push('styles')
    <link rel="stylesheet" href="{{asset('admin/select2/dist/css/select2.min.css')}}">
@endpush
@section('breadcrump')
    <h1>
        Add Recipe
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{route('products.index')}}"><i class="fa fa-users"></i> products</a></li>
        <li class="active">Add Recipe</li>
    </ol>
@endsection
@section('content')
    <div class="row" id="admin">
        <div class="col-md-8 col-md-offset-2">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Recipe</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="POST" action="{{route('recipes.store')}}"
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
                            <label for="inputName" class="col-sm-2 control-label">Recipe Name</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" id="inputName"
                                       value="{{ old('name') }}"
                                       placeholder="Recipe Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPic" class="col-sm-2 control-label">Product</label>
                            <div class="col-sm-10">
                                <select class="form-control select2" style="width: 100%;" name="product_id">
                                    @foreach($products as $main)
                                        <option value="{{$main->id}}">{{$main->name}}</option>
                                    @endforeach
                                </select>
                                <p class="text-center"><a href="{{route('products.create')}}">add a product</a></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputSynopsis" class="col-sm-2 control-label">Recipe Description</label>

                            <div class="col-sm-10">
                                <textarea class="form-control" rows="3"
                                          placeholder="recipe description"
                                          name="description">{{ old('description') }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPic" class="col-sm-2 control-label">Recipe Featured Image
                                <sup>*</sup></label>

                            <div class="col-sm-10">
                                <input type="file" name="image"
                                       value="{{ old('image') }}"
                                       id="inputPic">
                            </div>
                        </div>
                        <h3 class="text-center">Recipe Images </h3>
                        <hr>
                        <div id="images">
                            <div class="form-group{{ $errors->has('images.image') ? ' has-error' : '' }}">
                                <label for="inputPic" class="col-sm-2 control-label">Image
                                    <sup>*</sup></label>

                                <div class="col-sm-6">
                                    <input type="file" name="images[]"
                                           id="inputPic">
                                    @if ($errors->has('images.image'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('images.image') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-sm-4"><p class="pull-right" id="removeImage"
                                                         style="cursor: pointer;"><i
                                                class="fa fa-remove"
                                                style="color: red;"></i>
                                        remove this
                                        image</p></div>
                            </div>
                        </div>
                        <p class="text-center"><a href="#" id="addImage"><i class="fa fa-plus"></i> Add one more
                                image
                            </a>
                        </p>
                        <hr>
                        <h3 class="text-center">Recipe Ingredients </h3>
                        <div id="ingredients">
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Recipe Ingredient</label>

                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="ingredient[]" id="inputName"
                                           placeholder="Recipe Ingredient">
                                </div>
                                <div class="col-sm-4"><p class="pull-right" id="remove"
                                                         style="cursor: pointer;"><i
                                                class="fa fa-remove"
                                                style="color: red;"></i>
                                        remove this
                                        ingredient</p></div>
                            </div>
                        </div>
                        <p class="text-center"><a id="add"><i class="fa fa-plus"></i> Add one more ingredient
                            </a>
                        </p>
                        <hr>
                        <h3 class="text-center">Recipe Procedure </h3>
                        <div id="procedures">
                            <div class="form-group">
                                <label for="inputSynopsis" class="col-sm-2 control-label">Procedure</label>

                                <div class="col-sm-8">
                                <textarea class="form-control" rows="3"
                                          placeholder="Recipe procedure"
                                          name="procedure[]"></textarea>
                                </div>
                                <div class="col-sm-2"><p class="pull-right" id="removeProcedure"
                                                         style="cursor: pointer;"><i
                                                class="fa fa-remove"
                                                style="color: red;"></i>
                                        remove this
                                        procedure</p></div>
                            </div>
                        </div>
                        <p class="text-center"><a href="#" id="addProcedure"><i class="fa fa-plus"></i> Add one more
                                procedure
                            </a>
                        </p>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{route('recipes.index')}}" class="btn btn-default">Cancel</a>
                        <button type="submit" class="btn btn-success pull-right">Add Recipe</button>
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
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2();
        });
    </script>
    <script>
        $(document).ready(function () {
            var add = $('#add');
            var wrapper = $('#ingredients');
            var fieldHTML = '<div class="form-group">\n' +
                '                                <label for="inputName" class="col-sm-2 control-label">Recipe Ingredient</label>\n' +
                '\n' +
                '                                <div class="col-sm-6">\n' +
                '                                    <input type="text" class="form-control" name="ingredient[]" id="inputName"\n' +
                '                                           placeholder="Recipe Ingredient">\n' +
                '                                </div>\n' +
                '                                <div class="col-sm-4"><p class="pull-right" id="remove" style="cursor: pointer;"><i\n' +
                '                                                class="fa fa-remove"\n' +
                '                                                style="color: red;"></i>\n' +
                '                                        remove this\n' +
                '                                        ingredient</p></div>\n' +
                '                            </div>';
            $(add).on('click', function () {
                $(wrapper).append(fieldHTML);
                return false;
            });
            $(wrapper).on('click', '#remove', function (e) {
                $(this).parents('.form-group').remove();
            });
            var addProcedure = $('#addProcedure');
            var procedureWrapper = $('#procedures');
            var fieldHTMLProcedure = '<div class="form-group">\n' +
                '                                <label for="inputSynopsis" class="col-sm-2 control-label">Procedure</label>\n' +
                '\n' +
                '                                <div class="col-sm-8">\n' +
                '                                <textarea class="form-control" rows="3"\n' +
                '                                          placeholder="Recipe procedure"\n' +
                '                                          name="procedure[]"></textarea>\n' +
                '                                </div>\n' +
                '                                <div class="col-sm-2"><p class="pull-right" id="removeProcedure" style="cursor: pointer;"><i\n' +
                '                                                class="fa fa-remove"\n' +
                '                                                style="color: red;"></i>\n' +
                '                                        remove this\n' +
                '                                        procedure</p></div>\n' +
                '                            </div>';
            $(addProcedure).on('click', function () {
                $(procedureWrapper).append(fieldHTMLProcedure);
                return false;
            });
            $(procedureWrapper).on('click', '#removeProcedure', function (e) {
                $(this).parents('.form-group').remove();
            });
            var addImage = $('#addImage');
            var imageWrapper = $('#images');
            var fieldHTMLImage = '<div class="form-group">\n' +
                '                                <label for="inputPic" class="col-sm-2 control-label">Image\n' +
                '                                    <sup>*</sup></label>\n' +
                '\n' +
                '                                <div class="col-sm-6">\n' +
                '                                    <input type="file" name="images[]"\n' +
                '                                           id="inputPic">\n' +
                '                                </div>\n' +
                '                                <div class="col-sm-4"><p class="pull-right" id="removeImage"\n' +
                '                                                         style="cursor: pointer;"><i\n' +
                '                                                class="fa fa-remove"\n' +
                '                                                style="color: red;"></i>\n' +
                '                                        remove this\n' +
                '                                        image</p></div>\n' +
                '                            </div>';
            $(addImage).on('click', function () {
                $(imageWrapper).append(fieldHTMLImage);
                return false;
            });
            $(imageWrapper).on('click', '#removeImage', function (e) {
                $(this).parents('.form-group').remove();
            });
        });
        // TODO return false on all a click events to maintain scroll position
    </script>
@endpush