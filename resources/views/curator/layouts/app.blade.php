<!DOCTYPE html>
<html lang="en">
@include('includes.head')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    @include('includes.preloader')
    @include('includes.navbar')
    @include('includes.curator-sidebar')

    <!-- Content -->
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">@yield('title')</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <section class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </section>
    </div>
    @include('includes.footer')
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
</div>
@include('includes.scripts')
</body>
</html>
