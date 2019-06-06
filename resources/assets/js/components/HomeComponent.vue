<template>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
                <div class="card card-statistics">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">
                                <i class="mdi mdi-cube text-danger icon-lg"></i>
                            </div>
                            <div class="float-right">
                                <p class="card-text text-right">Revenue This Month</p>
                                <div class="fluid-container">
                                    <h3 class="card-title font-weight-bold text-right mb-0">$65,650</h3>
                                </div>
                            </div>
                        </div>
                        <p class="text-muted mt-3">
                            <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> 65% lower growth
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
                <div class="card card-statistics">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">
                                <i class="mdi mdi-receipt text-warning icon-lg"></i>
                            </div>
                            <div class="float-right">
                                <p class="card-text text-right">Orders</p>
                                <div class="fluid-container">
                                    <h3 class="card-title font-weight-bold text-right mb-0">3455</h3>
                                </div>
                            </div>
                        </div>
                        <p class="text-muted mt-3">
                            <i class="mdi mdi-bookmark-outline mr-1" aria-hidden="true"></i> Product-wise sales
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
                <div class="card card-statistics">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">
                                <i class="mdi mdi-poll-box text-teal icon-lg"></i>
                            </div>
                            <div class="float-right">
                                <p class="card-text text-right">Sales</p>
                                <div class="fluid-container">
                                    <h3 class="card-title font-weight-bold text-right mb-0">5693</h3>
                                </div>
                            </div>
                        </div>
                        <p class="text-muted mt-3">
                            <i class="mdi mdi-calendar mr-1" aria-hidden="true"></i> Weekly Sales
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
                <div class="card card-statistics">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">
                                <i class="mdi mdi-account-location text-info icon-lg"></i>
                            </div>
                            <div class="float-right">
                                <p class="card-text text-right">Employees</p>
                                <div class="fluid-container">
                                    <h3 class="card-title font-weight-bold text-right mb-0">246</h3>
                                </div>
                            </div>
                        </div>
                        <p class="text-muted mt-3">
                            <i class="mdi mdi-reload mr-1" aria-hidden="true"></i> Product-wise sales
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-5 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-4">
                            <i class="mdi mdi-chart-areaspline"></i>
                            Statistic
                        </h5>
                    </div>
                </div>
            </div>
            <div class="col-7 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-4">
                            <i class="mdi mdi-bell"></i>
                            Alert
                        </h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th width="5%"> 
                                        <input type="checkbox" name="" id="">
                                    </th>
                                    <th>NAME</th>
                                    <th width="20%">IN STOCK</th>
                                    <th width="25%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <input type="checkbox" name="" id="">
                                    </td>
                                    <td>POCARI SWEAT PET 500 ML SINGLE</td>
                                    <td>3 PCS</td>
                                    <td align="center">
                                        <div class="btn-group">
                                            <router-link to="/" class="btn btn-primary btn-sm">
                                                <span class="mdi mdi-view-list"></span>
                                            </router-link>
                                            <router-link to="/" class="btn btn-secondary btn-sm">
                                                <span class="mdi mdi-pencil-box"></span>
                                            </router-link>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
    }
</script>