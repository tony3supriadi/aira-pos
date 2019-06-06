<template>
    <div class="navigation">
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item nav-profile">
                    <div class="nav-link">
                        <div class="profile-image">
                            <img :src="'img/faces/face4.jpg'" alt="image" />
                        </div>
                        <div class="profile-name">
                            <p class="name">Toni Tri Supriadi</p>
                            <p class="designation">Owner</p>
                        </div>
                    </div>
                </li>
            </ul>
            <div v-slimscroll="options">
                <ul class="nav nav-items">
                    <li class="nav-item">
                        <router-link class="nav-link" to="dashboard">
                            <span class="menu-icon mdi mdi-view-dashboard"></span>
                            <span class="menu-title">Dashboard</span>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#library-items" aria-expanded="false" aria-controls="library-items">
                            <span class="menu-icon mdi mdi-cube"></span>
                            <span class="menu-title">Library</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="library-items">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <router-link to="library" class="nav-link">
                                        <i class="mdi mdi-chevron-double-right"></i>&nbsp; Item Library
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link to="stock-keeping-unit" class="nav-link">
                                        <i class="mdi mdi-chevron-double-right"></i>&nbsp; Stock Keeping Unit
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link to="categories" class="nav-link">
                                        <i class="mdi mdi-chevron-double-right"></i>&nbsp; Categories
                                    </router-link>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#inventory" aria-expanded="false" aria-controls="inventory">
                            <span class="menu-icon mdi mdi-download"></span>
                            <span class="menu-title">Inventory</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="inventory">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <router-link to="inventory" class="nav-link">
                                        <i class="mdi mdi-chevron-double-right"></i>&nbsp; Summary
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link to="suppliers" class="nav-link">
                                        <i class="mdi mdi-chevron-double-right"></i>&nbsp; Suppliers
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link to="purchase" class="nav-link">
                                        <i class="mdi mdi-chevron-double-right"></i>&nbsp; Purchase
                                    </router-link>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#employee" aria-expanded="false" aria-controls="employee">
                            <span class="menu-icon mdi mdi-clipboard-account"></span>
                            <span class="menu-title">Employee</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="employee">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <router-link to="role" class="nav-link">
                                        <i class="mdi mdi-chevron-double-right"></i>&nbsp; Role
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link to="staff" class="nav-link">
                                        <i class="mdi mdi-chevron-double-right"></i>&nbsp; Staff
                                    </router-link>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#report" aria-expanded="false" aria-controls="report">
                            <span class="menu-icon mdi mdi-file-chart"></span>
                            <span class="menu-title">Report</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="report">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <router-link to="report" class="nav-link">
                                        <i class="mdi mdi-chevron-double-right"></i>&nbsp; Summary
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link to="sales-report" class="nav-link">
                                        <i class="mdi mdi-chevron-double-right"></i>&nbsp; Sales
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link to="purchase-report" class="nav-link">
                                        <i class="mdi mdi-chevron-double-right"></i>&nbsp; Purchase
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link to="stock-keeping-unit-report" class="nav-link">
                                        <i class="mdi mdi-chevron-double-right"></i>&nbsp; Stock Keeping Unit
                                    </router-link>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" to="module">
                            <span class="menu-icon mdi mdi-checkbox-multiple-blank"></span>
                            <span class="menu-title">Module</span>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" to="settings">
                            <span class="menu-icon mdi mdi-settings"></span>
                            <span class="menu-title">Settings</span>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" to="help">
                            <span class="menu-icon mdi mdi-help-circle"></span>
                            <span class="menu-title">Help</span>
                        </router-link>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                options: {
                    height: '426px'
                },
                modules: [
                    
                ]
            };
        }
    }
</script>