<template>
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
            <a class="navbar-brand brand-logo" href="index.html">
                <img :src="'img/logo.png'" alt="logo" />
            </a>
            <a class="navbar-brand brand-logo-mini" href="index.html">
                <img :src="'img/logo-mini.png'" alt="logo" />
            </a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center">
            <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
                <li class="nav-item active">
                    <router-link to="/" class="nav-link">
                        <i class="mdi mdi-shopping"></i>Shopping Cart
                    </router-link>
                </li>
                <li class="nav-item">
                    <router-link to="/sales-report" class="nav-link">
                        <i class="mdi mdi-chart-gantt"></i>Sales Report
                    </router-link>
                </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item d-none d-lg-block dropdown">
                    <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                        <img class="img-xs rounded-circle" :src="'img/faces/face4.jpg'" alt="Administrator">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                        <router-link to="/profile" class="dropdown-item preview-item">
                            <i class="mdi mdi-account"></i> Profile
                        </router-link>
                        <div class="dropdown-divider"></div>
                        <router-link to="/lock-screen" class="dropdown-item preview-item">
                            <i class="mdi mdi-lock"></i> Lock Screen
                        </router-link>
                        <div class="dropdown-divider"></div>
                        <router-link to="/logout" class="dropdown-item preview-item">
                            <i class="mdi mdi-logout"></i> Logout
                        </router-link>
                        <div class="dropdown-divider"></div>
                    </div>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="icon-menu"></span>
            </button>
        </div>
    </nav>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
