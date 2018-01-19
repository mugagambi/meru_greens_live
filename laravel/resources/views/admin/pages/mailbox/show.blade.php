@extends('admin.layouts.main')
@section('breadcrump')
    <h1>
        Read Message
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{route('mailbox.index')}}"> Mailbox</a></li>
        <li class="active">Read Message -</li>
    </ol>
@endsection
@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Read Mail</h3>

            <div class="box-tools pull-right">
                <a href="{{route('mailbox.index')}}" class="btn btn-success">Back</a>
                <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Previous"><i
                            class="fa fa-chevron-left"></i></a>
                <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Next"><i
                            class="fa fa-chevron-right"></i></a>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
            <div class="mailbox-read-info">
                <h3>Subject: {{$message->subject}}</h3>
                <h5>From
                    <span class=""><b>Name: </b>{{$message->name}}</span>
                    <span class=""><b>Email: </b><a href="mailto:{{$message->email}}">{{$message->email}}</a></span>
                    <span class="mailbox-read-time pull-right">{{$message->created_at->diffForHumans()}}</span></h5>
            </div>
            <!-- /.mailbox-read-info -->
            <div class="mailbox-read-message">
                <h4>Message:</h4>
                <p>{{$message->message}}</p>
            </div>
            <!-- /.mailbox-read-message -->
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /. box -->
@endsection