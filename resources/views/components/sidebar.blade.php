<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand mb-3">
            <a href="index.html"><img src="{{ asset('img/TripTix.png') }}" alt="logo" width="80"></a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item {{ $type_menu == 'home' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="fa-solid fa-chart-line"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="menu-header">Master</li>
            <li class="nav-item {{ $type_menu == 'users' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('users.index') }}">
                    <i class="fa-solid fa-user"></i>
                    <span>User</span></a>
            </li>
        </ul>
    </aside>
</div>
