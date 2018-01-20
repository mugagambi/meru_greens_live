@extends('admin.layouts.main')
@push('styles')
    <link rel="stylesheet" href="{{asset('admin/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endpush
@section('breadcrump')
    <h1>
        Services
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboards</a></li>
        <li class="active">Services</li>
    </ol>
@endsection
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"> Services
                        <small>You can add a maximum of 3 services</small>
                    </h3>
                    <a href="{{route('services.create')}}" role="link" class="btn btn-success pull-right btn-flat">ADD
                        SERVICE</a>
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
                    @elseif (\Session::has('error'))
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                            </button>
                            <h4><i class="icon fa fa-check"></i> Error!</h4>
                            <p>{{ \Session::get('error') }}</p>
                        </div><br/>
                    @endif
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Featured Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($services as $service)
                            <tr>
                                <td>
                                    {{$service->name}}
                                </td>
                                <td>
                                    <a href="{{asset('storage/'.$service->featured_image)}}">
                                        view image</a>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a href="{{route('services.edit', ['service' => $service->id])}}"
                                               class="btn btn-success btn-sm btn-flat">edit</a>
                                        </div>
                                        <div class="col-md-6">
                                            <form class="delete"
                                                  action="{{route('services.destroy',['service' => $service->id])}}"
                                                  method="post">
                                                {{csrf_field()}}
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button class="btn btn-danger btn-flat btn-sm" type="submit"
                                                        onclick="return ConfirmDelete()">Remove
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
        function ConfirmDelete() {
            return confirm("Delete Service?")
        }
    </script>
@endpush