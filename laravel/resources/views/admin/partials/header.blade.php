<header class="main-header">

    <!-- Logo -->
    <a href="{{route('admin.dashboard')}}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>M </b>Gr</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Meru  </b>Greens</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown messages-menu">
                    <!-- Menu toggle button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <span class="label label-success">{{$unread_count}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have {{$unread_count}} messages</li>
                        <li>
                            <!-- inner menu: contains the messages -->
                            <ul class="menu">
                                @foreach($unread_messages as $message)
                                    <li><!-- start message -->
                                        <a href="#">
                                            <!-- Message title and timestamp -->
                                            <h4>
                                                {{$message->name}}
                                                <small>
                                                    <i class="fa fa-clock-o"></i> {{$message->created_at->diffForHumans()}}
                                                </small>
                                            </h4>
                                            <!-- The message -->
                                            <p>{{$message->subject}}</p>
                                        </a>
                                    </li>
                            @endforeach
                            <!-- end message -->
                            </ul>
                            <!-- /.menu -->
                        </li>
                        <li class="footer"><a href="{{route('mailbox.index')}}">See All Messages</a></li>
                    </ul>
                </li>
                <!-- /.messages-menu -->
                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                        @if(Auth::guard('admin')->user()->pic)
                            <img src="{{asset('storage/'.Auth::guard('admin')->user()->pic)}}"
                                 class="user-image"
                                 alt="User Image">
                    @endif
                    <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span class="hidden-xs">{{Auth::guard('admin')->user()->name}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                            @if(Auth::guard('admin')->user()->pic)
                                <img src="{{asset('storage/'.Auth::guard('admin')->user()->pic)}}"
                                     class="img-circle"
                                     alt="User Image">
                            @endif

                            <p>
                                {{Auth::guard('admin')->user()->name}}
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"
                                   class="btn btn-default btn-flat">Sign out</a>
                                <form id="frm-logout" action="{{ route('admin.logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>