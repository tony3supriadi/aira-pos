<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>@yield('title')AiraPOS | Point Of Sales</title>

    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" />
</head>

<body>
    <div id="app">
        <div class="container-scroller">
            <!-- partial:partials/NavbarComponent.vue -->
            <navbar-component></navbar-component>
            <!-- partial -->

            <div class="container-fluid page-body-wrapper">
                <!-- partial:partials/SidebarComponent.vue -->
                <sidebar-component></sidebar-component>
                <!-- partial -->

                <div class="main-panel">
                    <!-- partial:partials/SidebarComponent.vue -->
                    <container-component></container-component>
                    <!-- partial -->

                    <!-- partial:partials/_footer.html -->
                    <footer class="footer">
                        <footer-component></footer-component>
                    </footer>
                    <!-- partial -->
                </div>
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
    </div>

    <script src="{{ asset('/js/app.js') }}"></script>
</body>

</html>