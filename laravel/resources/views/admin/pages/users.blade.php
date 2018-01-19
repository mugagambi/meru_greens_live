@extends('admin.layouts.main')
@push('styles')
    <link rel="stylesheet" href="{{asset('admin/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endpush
@section('breadcrump')
    <h1>
        Registered Users
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboards</a></li>
        <li class="active">Registered Users</li>
    </ol>
@endsection
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Registered Users</h3>
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
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->first_name}}</td>
                                <td>{{$user->last_name}}</td>
                                <td>{{$user->phone}}</td>
                                <td>{{$user->email}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Phone</th>
                            <th>Email</th>
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
            return confirm("Do you want to remove this user? The user wouldn't be able to order items and view " +
                "their previous ordered items")
        }
    </script>
@endpush