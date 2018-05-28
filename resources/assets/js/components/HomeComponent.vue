<template>
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
</template>

<script>
    import { Line } from 'vue-chartjs'

    export default {
        extends: Line,
        mounted () {
            this.renderChart({
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [
                {
                label: 'Data One',
                backgroundColor: '#f87979',
                data: [40, 39, 10, 40, 39, 80, 40]
                }
            ]
            }, {responsive: true, maintainAspectRatio: false})
        }
    }
</script>