<template>
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <vendor-change-vehicle-Add :change-vehicle="this.item.id"></vendor-change-vehicle-Add>
        <div class="page-content" style="min-height: 1190px;">
            <!-- BEGIN PAGE HEAD-->
            <div class="page-head">
                <!-- BEGIN PAGE TITLE -->
                <div class="page-title">
                    <h1>User Request
                        <small>user request detail</small>
                    </h1>
                </div>
                <!-- END PAGE TITLE -->

            </div>
            <!-- END PAGE HEAD-->
            <!-- BEGIN PAGE BREADCRUMB -->
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="/vendor/dashboard">Dashboard</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="/vendor/user_request">User Request</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span class="active">User Request Detail</span>
                </li>
            </ul>
            <!-- END PAGE BREADCRUMB -->
            <!-- BEGIN PAGE BASE CONTENT -->
            <div class="profile">
                <div class="tabbable-line tabbable-full-width">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="" data-toggle="tab" aria-expanded="true"> Ride Detail </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8 profile-info">
                                            <h1 class="font-green sbold uppercase">
                                                Booking Id {{ data.booking_id }}
                                                <button type="button" class="btn btn-green"
                                                        data-toggle="modal" data-target="#changeVehicleModel">Change Vehicle
                                                </button>
                                            </h1>
                                        </div>
                                        <!--end col-md-8-->
                                        <div class="col-md-4">
                                            <div class="portlet sale-summary">
                                                <div class="portlet-title">
                                                    <div class="caption font-red sbold"> Ride Status ({{ data.status }})</div>
                                                    <div class="tools">
                                                        <a class="reload" href="javascript:;" data-original-title="" title=""> </a>
                                                    </div>
                                                </div>
                                                <div class="portlet-body">
                                                    <ul class="list-unstyled">
                                                        <li>
                                                            <span class="sale-info"> Booking Date
                                                                <i class="fa fa-img-up"></i>
                                                            </span>
                                                            <span class="sale-num">{{ dateArrange(data.created_at) }}</span>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end col-md-4-->
                                    </div>
                                    <!--end row-->
                                    <div class="tabbable-line tabbable-custom-profile">
                                        <ul class="nav nav-tabs">
                                            <li class="active">
                                                <a href="#tab_1_1" data-toggle="tab" aria-expanded="true"> Ride Detail </a>
                                            </li>
                                            <li>
                                                <a href="#tab_1_2" data-toggle="tab" aria-expanded="true"> Driver Detail </a>
                                            </li>
                                            <li>
                                                <a href="#tab_1_3" data-toggle="tab" aria-expanded="true"> User Detail </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab_1_1">
                                                <div class="portlet-body">
                                                    <table class="table table-striped table-bordered table-advance table-hover">
                                                        <thead>
                                                        <tr>
                                                            <th>
                                                                <i class="fa fa-briefcase"></i> Start Address
                                                            </th>
                                                            <th class="hidden-xs">
                                                                <i class="fa fa-question"></i> End Address
                                                            </th>
                                                            <th>
                                                                <i class="fa fa-bookmark"></i> Amount
                                                            </th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>
                                                                <a href="javascript:;"> {{ data.start_address }} </a>
                                                            </td>
                                                            <td class="hidden-xs"> {{ data.end_address }}</td>
                                                            <td>
                                                                {{ data.amount }}.00
                                                            </td>
                                                        </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!--tab-pane-->
                                            <div class="tab-pane" id="tab_1_2">
                                                <div class="form-group">
                                                    <label class="control-label">Driver Name</label>
                                                    <input type="text" readonly
                                                           class="form-control"
                                                           :value="data.driver ? data.driver.name : 'N/A'">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Email</label>
                                                    <input type="text" readonly
                                                           class="form-control"
                                                           :value="data.driver ? data.driver.email : 'N/A'">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Mobile No</label>
                                                    <input type="text" readonly
                                                           class="form-control"
                                                           :value="data.driver ? data.driver.mobile : 'N/A'">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">License No</label>
                                                    <input type="text" readonly
                                                           class="form-control"
                                                           :value="data.driver ? data.driver.license_no : 'N/A'">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Cnic No</label>
                                                    <input type="text" readonly
                                                           class="form-control"
                                                           :value="data.driver ? data.driver.cnic_no : 'N/A'">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Date Of Birth</label>
                                                    <input type="text" readonly
                                                           class="form-control"
                                                           :value="data.driver ? data.driver.dob : 'N/A'">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Gender</label>
                                                    <input type="text" readonly
                                                           class="form-control"
                                                           :value="data.driver ? data.driver.gender : 'N/A'">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Address</label>
                                                    <input type="text" readonly
                                                           class="form-control"
                                                           :value="data.driver ? data.driver.address : 'N/A'">
                                                </div>
                                            </div>
                                            <!--tab-pane-->
                                            <div class="tab-pane" id="tab_1_3">
                                                <div class="form-group">
                                                    <label class="control-label">User Name</label>
                                                    <input type="text" readonly
                                                           class="form-control"
                                                           :value="data.user ? data.user.name : 'N/A'">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Email</label>
                                                    <input type="text" readonly
                                                           class="form-control"
                                                           :value="data.user ? data.user.email : 'N/A'">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Mobile No</label>
                                                    <input type="text" readonly
                                                           class="form-control"
                                                           :value="data.user ? data.user.mobile : 'N/A'">
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label">Cnic No</label>
                                                    <input type="text" readonly
                                                           class="form-control"
                                                           :value="data.user ? data.user.cnic : 'N/A'">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Date Of Birth</label>
                                                    <input type="text" readonly
                                                           class="form-control"
                                                           :value="data.user ? data.user.dob : 'N/A'">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Gender</label>
                                                    <input type="text" readonly
                                                           class="form-control"
                                                           :value="data.user ? data.user.gender : 'N/A'">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Address</label>
                                                    <input type="text" readonly
                                                           class="form-control"
                                                           :value="data.user ? data.user.address : 'N/A'">
                                                </div>
                                            </div>
                                            <!--tab-pane-->
                                            <!--                                            <div class="tab-pane" id="tab_1_4" v-if="data.driver">-->
                                            <!--                                                <div class="form-group">-->
                                            <!--                                                    <label class="control-label">Vehicle Name</label>-->
                                            <!--                                                    <input type="text" readonly-->
                                            <!--                                                           class="form-control"-->
                                            <!--                                                           :value="data.driver.vehicle ? data.driver.vehicle.name : 'N/A'">-->
                                            <!--                                                </div>-->
                                            <!--                                                <div class="form-group">-->
                                            <!--                                                    <label class="control-label">Vehicle CC</label>-->
                                            <!--                                                    <input type="text" readonly-->
                                            <!--                                                           class="form-control"-->
                                            <!--                                                           :value="data.driver.vehicle ? data.driver.vehicle.vehicle_cc : 'N/A'">-->
                                            <!--                                                </div>-->
                                            <!--                                                <div class="form-group">-->
                                            <!--                                                    <label class="control-label">Vehicle No</label>-->
                                            <!--                                                    <input type="text" readonly-->
                                            <!--                                                           class="form-control"-->
                                            <!--                                                           :value="data.driver.vehicle ? data.driver.vehicle.vehicle_no : 'N/A'">-->
                                            <!--                                                </div>-->
                                            <!--                                                <div class="form-group">-->
                                            <!--                                                    <label class="control-label">License No</label>-->
                                            <!--                                                    <input type="text" readonly-->
                                            <!--                                                           class="form-control"-->
                                            <!--                                                           :value="data.driver.vehicle ? data.driver.vehicle.license_no : 'N/A'">-->
                                            <!--                                                </div>-->
                                            <!--                                                <div class="form-group">-->
                                            <!--                                                    <label class="control-label">Make</label>-->
                                            <!--                                                    <input type="text" readonly-->
                                            <!--                                                           class="form-control"-->
                                            <!--                                                           :value="data.driver.vehicle ? data.driver.vehicle.make : 'N/A'">-->
                                            <!--                                                </div>-->
                                            <!--                                                <div class="form-group">-->
                                            <!--                                                    <label class="control-label">Model</label>-->
                                            <!--                                                    <input type="text" readonly-->
                                            <!--                                                           class="form-control"-->
                                            <!--                                                           :value="data.driver.vehicle ? data.driver.vehicle.model : 'N/A'">-->
                                            <!--                                                </div>-->
                                            <!--                                                <div class="form-group">-->
                                            <!--                                                    <label class="control-label">Color</label>-->
                                            <!--                                                    <input type="text" readonly-->
                                            <!--                                                           class="form-control"-->
                                            <!--                                                           :value="data.driver.vehicle ? data.driver.vehicle.color : 'N/A'">-->
                                            <!--                                                </div>-->
                                            <!--                                                <div class="form-group">-->
                                            <!--                                                    <label class="control-label">Year</label>-->
                                            <!--                                                    <input type="text" readonly-->
                                            <!--                                                           class="form-control"-->
                                            <!--                                                           :value="data.driver.vehicle ? data.driver.vehicle.year : 'N/A'">-->
                                            <!--                                                </div>-->
                                            <!--                                            </div>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- END PAGE BASE CONTENT -->
        </div>
        <!-- END CONTENT BODY -->
    </div>
</template>

<script>
import moment from 'moment';
import vehicleTypeAdd from "./change-vehicle/Add";

export default {
    components: {vehicleTypeAdd},
    props: {
        item: {
            required: true
        },
    },
    data() {
        return {
            data: this.item,
        }
    },

    methods: {
        dateArrange(fate) {
            return moment(String(fate)).format('MM/DD/YYYY hh:mm')
        },
    }
}
</script>

