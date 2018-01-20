<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            @if(Auth::guard('admin')->user()->pic)
                <div class="pull-left image">
                    <img src="{{asset('storage/'.Auth::guard('admin')->user()->pic)}}" class="img-circle"
                         alt="User Image">
                </div>
            @endif
            <div class="pull-left info">
                <p>{{Auth::guard('admin')->user()->name}}</p>
                <!-- Status -->
                <a href="#">
                    <i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li>
                <a href="{{route('index')}}">
                    <i class="fa fa-globe"></i>
                    <span>View Site</span>
                </a>
            </li>
            <li class="header">MAIN NAVIGATION</li>
            <!-- Optionally, you can add icons to the links -->
            <li>
                <a href="{{route('admin.dashboard')}}">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li @if($url=='users' ) class="active" @endif>
                <a href="{{route('registered-users')}}">
                    <i class="fa fa-user"></i>
                    <span>Registered Users</span>
                </a>
            </li>
            <li @if($url=='admins' ) class="active" @endif>
                <a href="{{route('admins.index')}}">
                    <i class="fa fa-users"></i>
                    <span>Admins</span>
                </a>
            </li>
            <li @if($url=='teams' ) class="active" @endif>
                <a href="{{route('teams.index')}}">
                    <i class="fa fa-users"></i>
                    <span>Team</span>
                </a>
            </li>
            <li @if($url=='csr' ) class="active" @endif>
                <a href="{{route('admin.csr')}}">
                    <i class="fa fa-briefcase"></i>
                    <span>CSR</span>
                </a>
            </li>
            <li @if($url=='quality' ) class="active" @endif>
                <a href="{{route('admin.quality')}}">
                    <i class="fa fa-tachometer"></i>
                    <span>Quality Control Policy</span>
                </a>
            </li>
            <li @if($url=='about_us' ) class="active" @endif>
                <a href="{{route('admin.about')}}">
                    <i class="fa fa-address-book"></i>
                    <span>About Us</span>
                </a>
            </li>
            <li @if($url=='services' ) class="active" @endif>
                <a href="{{route('services.index')}}">
                    <i class="fa fa-cogs"></i>
                    <span>Our Services</span>
                </a>
            </li>
            <li @if($url=='slider' ) class="active" @endif>
                <a href="{{route('slider.index')}}">
                    <i class="fa fa-picture-o"></i>
                    <span>Front Page Image Slider</span>
                </a>
            </li>
            <li @if($url=='sub-category' ) class="active" @endif>
                <a href="{{route('sub-category.index')}}">
                    <i class="fa fa-th-list"></i>
                    <span>Sub Categories</span>
                </a>
            </li>
            <li @if($url=='products' ) class="active" @endif>
                <a href="{{route('products.index')}}">
                    <i class="fa fa-suitcase"></i>
                    <span>Products</span>
                </a>
            </li>
            <li @if($url=='orders' ) class="active" @endif>
                <a href="{{route('orders')}}">
                    <i class="fa fa-shopping-cart"></i>
                    <span>Orders</span>
                </a>
            </li>
            <li @if($url=='recipes' ) class="active" @endif>
                <a href="{{route('recipes.index')}}">
                    <i class="fa fa-cutlery"></i>
                    <span>Recipes</span>
                </a>
            </li>
            <li @if($url=='mailbox' ) class="active" @endif>
                <a href="{{route('mailbox.index')}}">
                    <i class="fa fa-envelope"></i>
                    <span>MailBox</span>
                </a>
            </li>
            <li @if($url=='jobs' ) class="active" @endif>
                <a href="{{route('careers.index')}}">
                    <i class="fa fa-tasks"></i>
                    <span>Job Vacancies</span>
                </a>
            </li>
            <li @if($url=='terms' ) class="active" @endif>
                <a href="{{route('admin.terms')}}">
                    <i class="fa fa-check-square-o"></i>
                    <span>Terms & Conditions</span>
                </a>
            </li>
            <li @if($url=='privacy' ) class="active" @endif>
                <a href="{{route('admin.privacy')}}">
                    <i class="fa fa-user-secret"></i>
                    <span>Privacy Policy</span>
                </a>
            </li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>