<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <div class="col-12 d-flex justify-content-between">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item mr-2">
                <a href="{{ route('profile.index') }}" class="btn btn-outline-dark"><i class="fas fa-user-alt"></i>
                    Профиль</a>
            </li>
            <li class="nav-item">
                <form action="" method="post">
                    <button type="submit" class="btn btn-outline-dark"><i class="fas fa-sign-out-alt"></i> Выйти
                    </button>
                </form>
            </li>
        </ul>
    </div>
</nav>
<!-- /.navbar -->
