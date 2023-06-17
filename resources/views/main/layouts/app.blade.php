<!DOCTYPE html>
<html lang="en">
@include('main.includes.head')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    @include('main.includes.preloader')
    @include('main.includes.navbar')
    @include('main.includes.sidebar')

    <!-- Content -->
    @yield('content')
    @include('main.includes.footer')
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
</div>
@include('main.includes.scripts')
</body>
</html>
