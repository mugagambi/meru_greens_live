@extends('admin.layouts.main')
@push('styles')
    <link rel="stylesheet" href="{{asset('admin/select2/dist/css/select2.min.css')}}">
@endpush
@section('breadcrump')
    <h1>
        Update Recipe
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{route('recipes.index')}}"><i class="fa fa-users"></i> recipes</a></li>
        <li class="active">Update Recipe</li>
    </ol>
@endsection
@section('content')
    <div class="row" id="admin">
        <div class="col-md-8 col-md-offset-2">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Update Recipe</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="POST"
                      action="{{route('recipes.update', ['recipe' => $recipe->id])}}" enctype="multipart/form-data">
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
                            <label for="inputName" class="col-sm-2 control-label">Recipe Name</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" id="inputName"
                                       value="{{$recipe->name}}"
                                       placeholder="Recipe Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPic" class="col-sm-2 control-label">Product</label>
                            <div class="col-sm-10">
                                <select class="form-control select2" style="width: 100%;" name="product_id">
                                    @foreach($products as $main)
                                        <option value="{{$main->id}}"
                                                {{ ($main->id == $recipe->product->id) ? 'selected="selected"' : '' }}>{{$main->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputSynopsis" class="col-sm-2 control-label">Recipe Description</label>

                            <div class="col-sm-10">
                                <textarea class="form-control" rows="3"
                                          placeholder="recipe description"
                                          name="description">{{ $recipe->description  }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPic" class="col-sm-2 control-label">Featured Image</label>

                            <div class="col-sm-10">
                                <input type="file" name="image"
                                       value="{{ old('image') }}"
                                       id="inputPic">
                                <p><b>previous featured image : </b><a
                                            href="{{asset('storage').'/'.$recipe->featured_image}}">view image</a>
                                </p>
                            </div>
                        </div>
                        <h3 class="text-center">Recipe Images </h3>
                        <hr>
                        <div id="images">

                        </div>
                        <p class="text-center"><a href="#" id="addImage"><i class="fa fa-plus"></i> Add one more
                                image
                            </a>
                        </p>
                        <h3 class="text-center">Recipe Ingredients </h3>
                        <hr>
                        <div id="ingredients">
                            @foreach($recipe->ingredients as $ingredient)
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Recipe Ingredient</label>

                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="ingredient[]" id="inputName"
                                               placeholder="Recipe Ingredient" value="{{$ingredient->name}}">
                                    </div>
                                    <div class="col-sm-4"><p class="pull-right" id="remove"
                                                             style="cursor: pointer;"><i
                                                    class="fa fa-remove"
                                                    style="color: red;"></i>
                                            remove this
                                            ingredient</p></div>
                                </div>
                            @endforeach
                        </div>
                        <p class="text-center"><a href="#" id="add"><i class="fa fa-plus"></i> add one more ingredient
                            </a>
                        </p>
                        <hr>
                        <h3 class="text-center">Recipe Procedure </h3>
                        <div id="procedures">
                            @foreach($recipe->procedures as $procedure)
                                <div class="form-group">
                                    <label for="inputSynopsis" class="col-sm-2 control-label">Procedure</label>

                                    <div class="col-sm-8">
                                <textarea class="form-control" rows="3"
                                          placeholder="Recipe procedure"
                                          name="procedure[]">{{$procedure->procedure}}</textarea>
                                    </div>
                                    <div class="col-sm-2"><p class="pull-right" id="removeProcedure"
                                                             style="cursor: pointer;"><i
                                                    class="fa fa-remove"
                                                    style="color: red;"></i>
                                            remove this
                                            procedure</p></div>
                                </div>
                            @endforeach
                        </div>
                        <p class="text-center"><a href="#" id="addProcedure"><i class="fa fa-plus"></i> add one more
                                procedure
                            </a>
                        </p>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{route('recipes.index')}}" class="btn btn-default">Cancel</a>
                        <button type="submit" class="btn btn-success pull-right">Update Recipe</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
                <h3 class="text-center">Current Recipe Images </h3>
                @foreach($recipe->images->chunk(4) as $chunk)
                    <div class="row">
                        @foreach($chunk as $image)
                            <div class="col-md-3">
                                <div class="thumbnail">
                                    <a href="{{asset('storage/'.$image->image)}}"> <img
                                                src="{{asset('storage/'.$image->image)}}"
                                                class="img-responsive"></a>
                                    <div class="caption">
                                        <form class="delete"
                                              action="{{route('destroy-recipe-image',['recipe' => $recipe->id,'image' => $image->id])}}"
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
    </script>
@endpush