<!DOCTYPE html>
<html lang="en" >

@include('admin.fixed.head')

<body>
    <div id="wrapper">
        <!-- Navigation -->
        @include('admin.fixed.navigation')
        @include('admin.fixed.sideNav')

        <!-- Page Content -->
        @yield('content')

        <!-- Footer -->
        @include('admin.fixed.footer')

    </div>
@include('admin.fixed.scripts')

</body>

</html>
