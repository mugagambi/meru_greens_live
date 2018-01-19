@extends('admin.layouts.main')
@push('styles')
    <link rel="stylesheet" href="{{asset('admin/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endpush
@section('breadcrump')
    <h1>
        Admins
        <small>System admins</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboards</a></li>
        <li class="active">Admins</li>
    </ol>
@endsection
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">System Admins</h3>
                    <a href="{{route('admins.create')}}" role="link" class="btn btn-success pull-right btn-flat">ADD
                        ADMIN</a>
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
                            <th>Email</th>
                            <th>Job Title</th>
                            <th>Profile Pic</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($admins as $admin)
                            <tr>
                                <td>{{$admin->name}}</td>
                                <td>{{$admin->email}}</td>
                                <td>{{$admin->job_title}}</td>
                                <td>
                                    <a href="{{asset('storage/'.$admin->pic)}}">
                                        view image</a>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a href="{{route('admins.edit', ['admin' => $admin->id])}}"
                                               class="btn btn-success btn-sm btn-flat">edit</a>
                                        </div>
                                        <div class="col-md-6">
                                            <form class="delete"
                                                  action="{{route('admins.destroy',['admin' => $admin->id])}}"
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
                            <th>Email</th>
                            <th>Job Title</th>
                            <th>Profile Pic</th>
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
                    "targets": 4,
                    "orderable": false,
                    "searchable": false
                }]
            });
        });

        function ConfirmDelete() {
            return confirm("Delete Admin?")
        }
    </script>
@endpush