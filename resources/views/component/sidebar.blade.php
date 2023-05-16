<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="/dashboard"> <img alt="image" src="{{ asset('admin/assets/img/logo.png') }}" class="header-logo" />
                <span class="logo-name">Rizqi</span>
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown {{ Request::path() === 'dashboard' ? 'active' : '' }}">
                <a href="/dashboard" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>

            <li class="dropdown {{ Request::path() === 'user' ? 'active' : '' }}"><a class="nav-link" href="/user"><i
                        data-feather="user"></i><span>User</span></a>
            </li>
            <li class="dropdown {{ Request::path() === 'lomba' ? 'active' : '' }}"><a class="nav-link" href="/lomba"><i
                        data-feather="hard-drive"></i><span>Lomba</span></a>
            </li>
        </ul>
    </aside>
</div>
