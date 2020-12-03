<header class="main-header">
    <a href="{{url('dashboard')}}" class="logo" style="background-color: #6d9b9d  !important; color: #fff;">
        <span class="logo-mini"><b><i class="fa fa-leanpub"></i> </b></span>
        <span class="logo-lg"> <i class="fa fa-leanpub"></i> <b>LMS</b></span>
    </a>
    <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav" style="text-align: right;">

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class=""> <i class="fa fa-user"> </i> {{auth()->user()->name}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <p>{{auth()->user()->name}}
                                <small>Admin</small>
                            </p>
                        </li>
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Update Password</a>
                            </div>
                            <div class="pull-right">
                                <form action="{{url('logout')}}" method="post">
                                    @method('POST')
                                    @csrf
                                    <button type="submit" class="btn btn-default btn-flat">Logout</button>

                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>