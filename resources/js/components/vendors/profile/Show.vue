<template>
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-head">
                <div class="page-title">
                    <h1>Vendor Profile | Account</h1>
                </div>
            </div>
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="/vendor/dashboard">Dashboard</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span class="active">Vendor Profile</span>
                </li>
            </ul>
            <div class="row">
                <div class="col-md-12">
                    <div class="profile-sidebar">
                        <div class="portlet light profile-sidebar-portlet bordered">
                            <div class="profile-userpic">
                                <img :src="getFullUrl(data.image)" class="img-responsive" alt=""></div>
                            <div class="profile-usertitle">
                                <div class="profile-usertitle-name" v-text="data.name"></div>
                                <div class="profile-usertitle-job"> Vendor</div>
                            </div>

                            <div class="row list-separated profile-stat">
                                <div class="col-md-6 col-sm-4 col-xs-6">
                                </div>
                            </div>
                            <!--                            <div class="address">-->
                            <!--                                <h4 class="profile-desc-title">Address:</h4>-->
                            <!--                                <span class="profile-desc-text"> {{ data.address }} </span>-->
                            <!--                            </div>-->
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
                                            <i class="fa fa-credit-card"></i> {{ data.cnic }} </a>
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
                                            <span class="caption-subject font-blue-madison bold uppercase">Details</span>
                                        </div>
                                        <ul class="nav nav-tabs">
                                            <li class="active">
                                                <a href="#tab_1_1" data-toggle="tab" aria-expanded="true">
                                                    Customer Detail
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="#tab_1_2" data-toggle="tab" aria-expanded="false">
                                                    Change Profile Image
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="#tab_1_3" data-toggle="tab" aria-expanded="false">
                                                    Change Password
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab_1_1">
                                                <form role="form" action="#">
                                                    <div class="form-group">
                                                        <label class="control-label">Customer Name</label>
                                                        <input type="text" v-model="data.name"
                                                               class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Customer Email</label>
                                                        <input type="text" v-model="data.email"
                                                               class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Customer Mobile</label>
                                                        <input type="text" v-model="data.mobile"
                                                               class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Cnic No</label>
                                                        <input type="text" v-model="data.cnic"
                                                               class="form-control">
                                                    </div>

                                                    <div class="margin-top-10">
                                                        <a @click="submit"
                                                           v-text="submitting ? 'Submitting...' : 'Submit'"
                                                           class="btn green" :disabled="isActive"> Submit </a>
                                                        <a href="javascript:;" class="btn default"> Cancel </a>
                                                    </div>
                                                </form>
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
                                                <form action="#">
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
                                                </form>
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
import FileUpload from '../../FileUpload';
export default {
    components: {FileUpload},
    props: {
        item: {
            required: true
        },
    },
    data() {
        return {
            data: {
                name: this.item.name,
                email: this.item.email,
                mobile: this.item.mobile,
                cnic: this.item.cnic,
                image: this.item.image
            },
            password: {
                current_password: '',
                new_password: '',
                confirm_password: '',
            },
            submitting: false,
            isActive: false,
        }
    },

    methods: {
        getFullUrl(src) {
            return `${location.origin}/storage/${src}`;
        },

        fileSelected(files) {
            this.data.image = '';

            for (const file of files)
                this.data.image = file;
        },

        buildFormData: function () {
            const formData = new FormData();
            formData.append('name', this.data.name);
            formData.append('email', this.data.email);
            formData.append('mobile', this.data.mobile);
            formData.append('cnic', this.data.cnic);
            formData.append('image', this.data.image);
            return formData;
        },


        submit: function () {

            if (this.data.image === '') {
                this.$alertify.error(`image is required`);
                return false;
            }

            this.isActive = true;
            this.submitting = true;
            axios.post(`/vendor/profile`, this.buildFormData())
                .then(() => {
                    this.$alertify.success("Profile Updated Successfully!");
                    setTimeout(() => {
                        window.location.href = `/vendor/profile`;
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
            axios.post(`/vendor/change_password`, this.password)
                .then(() => {
                    this.$alertify.success("Password Change Successfully!");
                    setTimeout(() => {
                        window.location.href = `/vendor/profile`;
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

