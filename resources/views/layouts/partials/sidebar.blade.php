<ul class="sidebar navbar-nav">
    <li class="nav-item {{ Route::currentRouteName() == 'index' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="nav-item" title="This is not calculate in Income/Expense">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-sticky-note"></i>
            <span>Menu</span></a>
    </li>

</ul>
