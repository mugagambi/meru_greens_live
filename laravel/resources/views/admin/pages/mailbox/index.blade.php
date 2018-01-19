@extends('admin.layouts.main')
@section('breadcrump')
    <h1>
        Mailbox
        <small>{{$unread_count}} new messages</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Mailbox</li>
    </ol>
@endsection
@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Inbox</h3>

            <div class="box-tools pull-right">
                <div class="has-feedback">
                    <input type="text" class="form-control input-sm" placeholder="Search Mail">
                    <span class="glyphicon glyphicon-search form-control-feedback"></span>
                </div>
            </div>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
            <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                    <thead>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Read</th>
                    <th>Sent</th>
                    </thead>
                    <tbody>
                    @foreach($messages as $message)
                        <tr>
                            <td class="mailbox-name"><a
                                        href="{{route('mailbox.show', ['mailbox' => $message->id])}}">{{$message->name}}
                                </a>
                            </td>
                            <td class="mailbox-subject">{{$message->email}}</td>
                            <td class="mailbox-subject">{{$message->subject}}
                            </td>
                            @if($message->read)
                                <td class="mailbox-attachment"><i class="fa fa-check-circle" style="color: green;"></i>
                                    Read
                                </td>
                            @else
                                <td class="mailbox-attachment"><i class="fa fa-times-circle-o" style="color: red;"></i>
                                    Not Read
                                </td>
                            @endif
                            <td class="mailbox-date">{{$message->created_at->diffForHumans()}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <!-- /.table -->
            </div>
            <!-- /.mail-box-messages -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer no-padding">
            <div class="mailbox-controls">
                <div class="pull-right">
                    1-50/200
                    <div class="btn-group">
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i>
                        </button>
                    </div>
                    <!-- /.btn-group -->
                </div>
                <!-- /.pull-right -->
            </div>
        </div>
    </div>
    <!-- /. box -->
@endsection