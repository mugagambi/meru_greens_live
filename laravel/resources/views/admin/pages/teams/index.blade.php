@extends('admin.layouts.main')
@push('styles')
    <link rel="stylesheet" href="{{asset('admin/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endpush
@section('breadcrump')
    <h1>
        Team
        <small>team</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboards</a></li>
        <li class="active">Team</li>
    </ol>
@endsection
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Team</h3>
                    <a href="{{route('teams.create')}}" role="link" class="btn btn-success pull-right btn-flat">ADD TEAM
                        MEMBER</a>
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
                            <th>Job Title</th>
                            <th>Featured Pic</th>
                            <th>Facebook Account</th>
                            <th>Twitter Account</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($teams as $team)
                            <tr>
                                <td>{{$team->name}}</td>
                                <td>{{$team->job_title}}</td>
                                <td>
                                    <a href="{{asset('uploads').'/'.$team->pic}}">
                                        {{$team->pic}}</a>
                                </td>
                                @if($team->facebook)
                                    <td>{{$team->facebook}}</td>
                                @else
                                    <td>-</td>
                                @endif
                                @if($team->twitter)
                                    <td>{{$team->twitter}}</td>
                                @else
                                    <td>-</td>
                                @endif
                                <td>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a href="{{route('teams.edit', ['team' => $team->id])}}"
                                               class="btn btn-success btn-sm btn-flat">edit</a>
                                        </div>
                                        <div class="col-md-6">
                                            <form class="delete"
                                                  action="{{route('teams.destroy',['team' => $team->id])}}"
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
                            <th>Job Title</th>
                            <th>Featured Pic</th>
                            <th>Facebook Account</th>
                            <th>Twitter Account</th>
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
                    "targets": 5,
                    "orderable": false,
                    "searchable": false
                }]
            });
        });
        function ConfirmDelete() {
            return confirm("Delete Team Member?")
        }
    </script>.

@endpush