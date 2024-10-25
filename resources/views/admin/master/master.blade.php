@include('admin/modules/header')

<body class="sb-nav-fixed">
    @include('admin.modules.navbar')

    <div id="layoutSidenav">
        @include('admin.modules.sidebar')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4 ">
                    {{-- <h1 class="mt-4">@yield('title')</h1> --}}
                    <h3></h3>
                    @yield('content')
                </div>
            </main>
            @include('admin.modules.footer')
        </div>
    </div>

    @include('admin.modules.script')
</body>

</html>
