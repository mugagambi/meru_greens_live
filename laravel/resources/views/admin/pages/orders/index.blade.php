@extends('admin.layouts.main')
@push('styles')
    <link rel="stylesheet" href="{{asset('admin/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endpush
@section('breadcrump')
    <h1>
        Orders
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Orders</li>
    </ol>
@endsection
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Orders</h3>
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
                            <th>Order</th>
                            <th>Names</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>County</th>
                            <th>Nearest Town</th>
                            <th>status</th>
                            <th>View Order</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td><a href="{{route('order', ['order' => $order->id])}}">OR{{$order->id}}</a></td>
                                <td>{{$order->names}}</td>
                                <td>{{$order->phone_number}}</td>
                                <td>{{$order->email}}</td>
                                <td>{{$order->county}}</td>
                                <td>{{$order->nearest_town}}</td>
                                <td>{{$order->seen ? 'Seen' : 'Not Seen'}} </td>
                                <td><a href="{{route('order', ['id' => $order->id])}}">view order</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Order</th>
                            <th>Names</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>County</th>
                            <th>Nearest Town</th>
                            <th>status</th>
                            <td>View Order</td>
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
                'autoWidth': true
            });
        });
    </script>
@endpush