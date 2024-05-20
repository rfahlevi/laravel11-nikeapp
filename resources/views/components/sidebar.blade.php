<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">NikeApp</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">Na</a>
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
            <li class="nav-item {{ $type_menu == 'category' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('productCategory.index') }}">
                    <i class="fa-solid fa-list"></i>
                    <span>Category</span></a>
            </li>
        </ul>
    </aside>
</div>
