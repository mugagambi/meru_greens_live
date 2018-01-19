@extends('admin.layouts.main')
@push('styles')
    <link rel="stylesheet" href="{{asset('admin/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endpush
@section('breadcrump')
    <h1>
        Sub Categories
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboards</a></li>
        <li class="active">Sub Categories</li>
    </ol>
@endsection
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Sub Categories</h3>
                    <a href="{{route('sub-category.create')}}" role="link" class="btn btn-success pull-right btn-flat">ADD
                       SUB CATEGORY</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    @if (\Session::has('success'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                            </button>
                            <h4><i class="icon fa fa-check"></i> Success!</h4>
                            <p>{{ \Session::get('success') }}</p>
                        </div><br/>
                    @endif
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Featured Image</th>
                            <th>Main Category</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$category->name}}</td>
                                <td>
                                    <a href="{{asset('uploads').'/'.$category->pic}}">
                                        {{$category->pic}}</a>
                                </td>
                                <td>{{$category->category}}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a href="{{route('sub-category.edit', ['sub_category' => $category->id])}}"
                                               class="btn btn-success btn-sm btn-flat">edit</a>
                                        </div>
                                        <div class="col-md-6">
                                            <form class="delete"
                                                  action="{{route('sub-category.destroy',['sub_category' => $category->id])}}"
                                                  method="post">
                                                {{csrf_field()}}
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button class="btn btn-danger btn-flat btn-sm"
                                                        onclick="return ConfirmDelete()"
                                                        type="submit">Remove
                                                </button>
                                            </form>

                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Featured Image</th>
                            <th>Main Category</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{asset('admin/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script>
        $(function () {
            $('#example1').DataTable({
                'paging': true,
                'lengthChange': true,
                'searching': true,
                'ordering': true,
                'info': true,
                'autoWidth': true,
                "columnDefs": [{
                    "targets": 3,
                    "orderable": false,
                    "searchable": false
                }]
            });
        });

        function ConfirmDelete() {
            return confirm("Delete this category?")
        }
    </script>
@endpush