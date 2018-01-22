@extends('admin.layouts.main')
@section('breadcrump')
    <h1>
        Dashboard
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li class="active">Dashboard</li>
    </ol>
@endsection
@section('content')
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{$orders_count}}</h3>

                        <p>Total Orders</p>
                        <small></small>
                    </div>
                    <div class="icon">
                        <i class="ion ion-android-cart"></i>
                    </div>
                    <a href="" class="small-box-footer">View All Orders <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{{$products_count}}</h3>

                        <p>Total Products</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{route('products.index')}}" class="small-box-footer">view more products <i
                                class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>{{$total_users}}</h3>

                        <p>Total User Registrations</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{route('registered-users')}}" class="small-box-footer">view registered users <i
                                class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
            <div class="col-md-6">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Latest Orders</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                        class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table no-margin">
                                <thead>
                                <tr>
                                    <th>Order</th>
                                    <th>Names</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Items</th>
                                    <th>status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td><a href="#">OR{{$order->id}}</a></td>
                                        <td>{{$order->user->first_name}} {{$order->user->last_name}}</td>
                                        <td>{{$order->user->phone}}</td>
                                        <td>{{$order->user->email}}</td>
                                        <td>{{$order->items->count()}} item(s), <a href="#">view items</a></td>
                                        <td>
                                            @if($order->processed)
                                                <span class="label label-success">Processed</span>
                                            @else
                                                <span class="label label-warning">Pending</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <a href="#" class="btn btn-sm btn-default btn-flat pull-right">View All
                            Orders</a>
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->
            </div>
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Recently Added Products</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                        class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <ul class="products-list product-list-in-box">
                            @foreach($latest_products as $product)
                                <li class="item">
                                    @if(!$product->images->isEmpty())
                                        <div class="product-img">
                                            <img src="{{asset('uploads/'.$product->images->first()->image)}}"
                                                 alt="Product Image">
                                        </div>
                                    @endif
                                    <div class="product-info">
                                        <a href="{{route('products.edit', ['product' => $product->id])}}"
                                           class="product-title">{{$product->name}}
                                            <span class="label label-success pull-right">{{$product->category}}</span></a>
                                        <span class="product-description">
                          {{str_limit($product->description,70)}}
                        </span>
                                    </div>
                                </li>
                        @endforeach
                        <!-- /.item -->
                        </ul>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer text-center">
                        <a href="{{route('products.index')}}" class="uppercase">View All Products</a>
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Unread Contact Messages</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                        class="fa fa-times"></i></button>
                        </div>

                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <div class="table-responsive mailbox-messages">
                            @if(!$unread_messages->isEmpty())

                                <table class="table table-hover table-striped">
                                    <thead>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Read</th>
                                    <th>Sent</th>
                                    </thead>
                                    <tbody>
                                    @foreach($unread_messages as $message)
                                        <tr>
                                            <td class="mailbox-name"><a
                                                        href="{{route('mailbox.show', ['mailbox' => $message->id])}}">{{$message->name}}
                                                </a>
                                            </td>
                                            <td class="mailbox-subject">{{$message->email}}</td>
                                            <td class="mailbox-subject">{{$message->subject}}
                                            </td>
                                            @if($message->read)
                                                <td class="mailbox-attachment"><i class="fa fa-check-circle"
                                                                                  style="color: green;"></i>
                                                    Read
                                                </td>
                                            @else
                                                <td class="mailbox-attachment"><i class="fa fa-times-circle-o"
                                                                                  style="color: red;"></i>
                                                    Not Read
                                                </td>
                                            @endif
                                            <td class="mailbox-date">{{$message->created_at->diffForHumans()}}</td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            @else
                                No unread messages
                        @endif
                        <!-- /.table -->
                        </div>
                        <!-- /.mail-box-messages -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer no-padding">
                        <div class="mailbox-controls">
                            <!-- /.pull-right -->
                        </div>
                    </div>
                </div>
                <!-- /. box -->
            </div>
            <div class="col-md-4">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Latest Registered Users</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                        class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <ul class="users-list clearfix">
                            @foreach($latest_users as $user)
                                <li>
                                    <img src="{{asset('uploads/thumbnails/default.png')}}" alt="User Image">
                                    <a class="users-list-name" href="#">{{$user->name}}</a>
                                    <span class="users-list-date">{{$user->created_at->diffForHumans()}}</span>
                                </li>
                            @endforeach
                        </ul>
                        <!-- /.users-list -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer text-center">
                        <a href="{{route('registered-users')}}" class="uppercase">View All Users</a>
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!--/.box -->
            </div>
        </div>
    </section>
@endsection