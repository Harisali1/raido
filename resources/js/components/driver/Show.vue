<template>
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-head">
                <div class="page-title">
                    <h1>Driver Profile | Account</h1>
                </div>
            </div>
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="/admin/dashboard">Dashboard</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="/admin/driver">Driver</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span class="active">Detail</span>
                </li>
            </ul>
            <div class="row">
                <div class="col-md-12">
                    <div class="profile-sidebar">
                        <div class="portlet light profile-sidebar-portlet bordered">
                            <div class="profile-userpic">
                                <img :src="getFullUrl(data.image)" class="img-responsive" alt=""></div>
                            <div class="profile-usertitle">
                                <div class="profile-usertitle-name" v-text="data.name"> Marcus Doe</div>
                                <div class="profile-usertitle-job"> Driver</div>
                            </div>
                            <div class="profile-userbuttons">
                                <button type="button" class="btn btn-circle green btn-sm"
                                        v-if="data.availability === 'ONLINE'">{{ data.availability }}
                                </button>
                                <button type="button" class="btn btn-circle red btn-sm"
                                        v-if="data.availability === 'OFFLINE'">{{ data.availability }}
                                </button>
                                <button type="button" class="btn btn-circle yellow btn-sm"
                                        v-if="data.availability === 'RIDING'">{{ data.availability }}
                                </button>
                            </div>
                            <div class="row list-separated profile-stat">
                                <div class="col-md-6 col-sm-4 col-xs-6">
                                    <div class="uppercase profile-stat-title"> {{ data.user_request.length }}</div>
                                    <div class="uppercase profile-stat-text"> Total Rides</div>
                                </div>
                                <div class="col-md-6 col-sm-4 col-xs-6">
                                    <div class="uppercase profile-stat-title"> {{ totalFare }}</div>
                                    <div class="uppercase profile-stat-text"> Total Revenue</div>
                                </div>
                            </div>
                            <div class="address">
                                <h4 class="profile-desc-title">Address:</h4>
                                <span class="profile-desc-text"> {{ data.address }} </span>
                            </div>
                            <div class="profile-usermenu">
                                <ul class="nav">
                                    <li class="active">
                                        <a href="javascript:void(0)">
                                            <i class="fa fa-envelope"></i> {{ data.email }} </a>
                                    </li>
                                    <li class="active">
                                        <a href="javascript:void(0)">
                                            <i class="fa fa-phone"></i> {{ data.mobile }} </a>
                                    </li>
                                    <li class="active">
                                        <a href="javascript:void(0)">
                                            <i class="fa fa-credit-card"></i> {{ data.cnic_no }} </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="profile-content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="portlet light bordered">
                                    <div class="portlet-title tabbable-line">
                                        <div class="caption caption-md">
                                            <i class="icon-globe theme-font hide"></i>
                                            <span
                                                class="caption-subject font-blue-madison bold uppercase">Details</span>
                                        </div>
                                        <ul class="nav nav-tabs">
                                            <li class="active">
                                                <a href="#tab_1_1" data-toggle="tab" aria-expanded="true">
                                                    Driver Detail
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="#tab_1_2" data-toggle="tab" aria-expanded="false">
                                                    Change Avatar
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="#tab_1_3" data-toggle="tab" aria-expanded="false">
                                                    Change Password
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="#tab_1_4" data-toggle="tab" aria-expanded="false">
                                                    Vehicle Detail
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="#tab_1_5" data-toggle="tab" aria-expanded="false">
                                                    Ride Request
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab_1_1">
                                                <div class="form-group">
                                                    <label class="control-label">Driver Name</label>
                                                    <input type="text" v-model="data.name" readonly
                                                           class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Driver Email</label>
                                                    <input type="text" v-model="data.email" readonly
                                                           class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Driver Mobile</label>
                                                    <input type="text" v-model="data.mobile" readonly
                                                           class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">License No</label>
                                                    <input type="text" v-model="data.license_no" readonly
                                                           class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Cnic No</label>
                                                    <input type="text" v-model="data.cnic_no" readonly
                                                           class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Gender</label>
                                                    <input type="text" v-model="data.gender" readonly
                                                           class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Date Of Birth</label>
                                                    <input type="text" v-model="data.dob" readonly
                                                           class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Address</label>
                                                    <textarea rows="3" v-model="data.address" readonly
                                                              class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="tab_1_2">
                                                <form action="#" role="form">
                                                    <file-upload @upload="fileSelected"></file-upload>
                                                    <div class="margin-top-10">
                                                        <a @click="submit"
                                                           v-text="submitting ? 'Submitting...' : 'Submit'"
                                                           class="btn green" :disabled="isActive"> Submit </a>
                                                        <a href="javascript:;" class="btn default"> Cancel </a>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="tab-pane" id="tab_1_3">
                                                <div class="form-group">
                                                    <label class="control-label">Current Password</label>
                                                    <input type="password" v-model="password.current_password"
                                                           class="form-control"></div>
                                                <div class="form-group">
                                                    <label class="control-label">New Password</label>
                                                    <input type="password" v-model="password.new_password"
                                                           class="form-control"></div>
                                                <div class="form-group">
                                                    <label class="control-label">Re-type New Password</label>
                                                    <input type="password" v-model="password.confirm_password"
                                                           class="form-control"></div>
                                                <div class="margin-top-10">
                                                    <a @click="changePassword"
                                                       v-text="submitting ? 'Submitting...' : 'Submit'"
                                                       class="btn green" :disabled="isActive"> Submit </a>
                                                    <a href="javascript:;" class="btn default"> Cancel </a>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="tab_1_4">
                                                <div class="form-group">
                                                    <label class="control-label">Vehicle Name</label>
                                                    <input type="text" readonly
                                                           class="form-control"
                                                           :value="data.vehicle ? data.vehicle.name : 'N/A'">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Vehicle CC</label>
                                                    <input type="text" readonly
                                                           class="form-control"
                                                           :value="data.vehicle ? data.vehicle.vehicle_cc : 'N/A'">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Vehicle No</label>
                                                    <input type="text" readonly
                                                           class="form-control"
                                                           :value="data.vehicle ? data.vehicle.vehicle_no : 'N/A'">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">License No</label>
                                                    <input type="text" readonly
                                                           class="form-control"
                                                           :value="data.vehicle ? data.vehicle.license_no : 'N/A'">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Make</label>
                                                    <input type="text" readonly
                                                           class="form-control"
                                                           :value="data.vehicle ? data.vehicle.make : 'N/A'">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Model</label>
                                                    <input type="text" readonly
                                                           class="form-control"
                                                           :value="data.vehicle ? data.vehicle.model : 'N/A'">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Color</label>
                                                    <input type="text" readonly
                                                           class="form-control"
                                                           :value="data.vehicle ? data.vehicle.color : 'N/A'">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Year</label>
                                                    <input type="text" readonly
                                                           class="form-control"
                                                           :value="data.vehicle ? data.vehicle.year : 'N/A'">
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="tab_1_5">
                                                <div class="portlet-body">
                                                    <table
                                                        class="table table-striped table-bordered table-advance table-hover"
                                                        v-if="data.user_request.length > 0">
                                                        <thead>
                                                        <tr>
                                                            <th><i class="fa fa-briefcase"></i> S.No</th>
                                                            <th class="hidden-xs"><i class="fa fa-question"></i> Booking
                                                                Id
                                                            </th>
                                                            <th><i class="fa fa-bookmark"></i> Driver Name</th>
                                                            <th><i class="fa fa-bookmark"></i> Vehicle Type Name</th>
                                                            <th><i class="fa fa-bookmark"></i> Start Address</th>
                                                            <th><i class="fa fa-bookmark"></i> End Address</th>
                                                            <th><i class="fa fa-bookmark"></i> Status</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr v-for="(item, key) of data.user_request">
                                                            <td class="border-b" v-text="key+1"></td>
                                                            <td class="border-b">{{ item.booking_id }}</td>
                                                            <td class="border-b">
                                                                {{ item.driver ? item.driver.name : 'N/A' }}
                                                            </td>
                                                            <td class="border-b">{{
                                                                    item.vehicle_type ? item.vehicle_type.title : 'N/A'
                                                                }}
                                                            </td>
                                                            <td class="border-b">{{ item.start_address }}</td>
                                                            <td class="border-b">{{ item.end_address }}</td>
                                                            <td class="border-b">{{ item.status }}</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                    <div v-else class="alert alert-danger">
                                                        <strong>No Rides Found!</strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import FileUpload from '../FileUpload';

export default {
    components: {FileUpload},
    props: {
        item: {
            required: true
        },
    },
    data() {
        return {
            data: this.item,
            avatar: {
                image: '',
            },
            password: {
                current_password: '',
                new_password: '',
                confirm_password: '',
                _method: 'PUT',
            },
            submitting: false,
            isActive: false,
        }

    },

    computed: {
        totalFare() {
            let total = 0;
            for (let item of this.data.user_request) {
                total += parseInt(item.amount);
            }
            return total;
        }
    },

    methods: {
        getFullUrl(src) {
            return `${location.origin}/storage/${src}`;
        },
        fileSelected(files) {
            this.avatar.image = '';

            for (const file of files)
                this.avatar.image = file;
        },

        buildFormData: function () {
            const formData = new FormData();
            formData.append('image', this.avatar.image);
            formData.append('_method', 'PUT');
            return formData;
        },

        submit: function () {

            if (this.avatar.image === '') {
                this.$alertify.error(`image is required`);
                return false;
            }

            this.isActive = true;
            this.submitting = true;
            axios.post(`/admin/driver/${this.item.id}`, this.buildFormData())
                .then(() => {
                    this.$alertify.success("Profile Picture Updated Successfully!");
                    setTimeout(() => {
                        window.location.href = `/admin/driver/${this.item.id}`;
                    }, 1000);
                })
                .catch(err => {
                    this.isActive = false;
                    this.submitting = false;
                    if (err.response.status === 422) {
                        let errors = Object.values(err.response.data.errors);
                        for (let error of errors) {
                            this.$alertify.error(error[0]);
                        }
                    }
                });
        },

        changePassword: function () {

            for (let input in this.password) {
                if (this.password[input] === '') {
                    this.$alertify.error(`${input} is required`);
                    return false;
                }
            }
            this.isActive = true;
            this.submitting = true;
            axios.post(`/admin/driver/updatePassword/${this.item.id}`, this.password)
                .then(() => {
                    this.$alertify.success("Password Change Successfully!");
                    setTimeout(() => {
                        window.location.href = `/admin/driver/${this.item.id}`;
                    }, 1000);
                })
                .catch(err => {
                    this.isActive = false;
                    this.submitting = false;
                    if (err.response.status === 422) {
                        let errors = Object.values(err.response.data.errors);
                        for (let error of errors) {
                            this.$alertify.error(error[0]);
                        }
                    }
                });
        }
    }
}
</script>

