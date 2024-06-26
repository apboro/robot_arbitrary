<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Logo -->
    <a href="{{ route('main.index') }}" class="brand-link text-decoration-none">
        <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Рапортичка</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        @include('includes.user-info')

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('main.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Главная <i class="fas fa-angle-right right"></i></p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('curator.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-wrench"></i>
                        <p>Управление группой <i class="fas fa-angle-right right"></i></p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('curator.profile.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-info-circle"></i>
                        <p>Профиль группы <i class="fas fa-angle-right right"></i></p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<!-- ./Main Sidebar Container -->
