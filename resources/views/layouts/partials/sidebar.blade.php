<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('assets/images/avatar.png')}}" class="img-circle" alt="User Image">
            </div>

            <div class="pull-left info">
                <p>{{auth()->user()->name}}</p>
                <a href="javascript:void()"><i class="fa fa-circle text-success"> Online</i></a>
            </div>
        </div>

        <ul class="sidebar-menu">
            <!--====== Dashboard========-->
            <li>
                <a href="{{url('dashboard')}}">
                    <i class="fa fa-tachometer"></i>
                    <span>Dashboard</span>
                    <span class="pull-right-container">
                        <i class="pull-right"></i>
                    </span>
                </a>
            </li>

        @if(auth()->guard()->check())
            @if(auth()->user()->role===1)
                <!--====== Users========-->
                    <li>
                        <a href="{{url('users')}}">
                            <i class="fa fa-user"></i>
                            <span>User</span>
                            <span class="pull-right-container">
                        <i class="pull-right"></i>
                    </span>
                        </a>
                    </li>
                @endif
            @endif

            <li class="header">MAIN PANEL</li>

            {{--Copyright--}}
            <li class="header copyright_custom">
                &copy; 2020, <span>
                    <a target="_blank" href="https://learning.megaminds.technology/">
                        MegaMinds Learning</a>
                </span>
            </li>
        </ul>
    </section>
</aside>
