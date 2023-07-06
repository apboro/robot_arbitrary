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
                @can('view-admin-panel', auth()->user())
                    <li class="nav-item">
                        <a href="{{ route('admin.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-user-cog"></i>
                            <p>Администрирование <i class="fas fa-angle-right right"></i></p>
                        </a>
                    </li>
                @endcan
                @can('view-curator-panel', auth()->user())
                    <li class="nav-item">
                        <a href="{{ route('curator.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-wrench"></i>
                            <p>Управление группой <i class="fas fa-angle-right right"></i></p>
                        </a>
                    </li>
                @endcan
                @can('view-claim-panel', auth()->user())
                    <li class="nav-item">
                        <a href="{{ route('claim.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-file"></i>
                            <p>Докладная <i class="fas fa-angle-right right"></i></p>
                        </a>
                    </li>
                @endcan
                {{--                @can('view-educational-panel', auth()->user())--}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-graduate"></i>
                        <p>
                            Учебная часть
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="{{ route('reference.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-file-word"></i>
                                <p>Заказать справку</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{--                @endcan--}}
                {{--                @can('view-management-educational-panel', auth()->user())--}}
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-user-graduate"></i>
                        <p>Учебный отдел <i class="fas fa-angle-right right"></i></p>
                    </a>
                </li>
                {{--                @endcan--}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<!-- ./Main Sidebar Container -->
