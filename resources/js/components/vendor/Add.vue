<template>
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-head">
                <div class="page-title">
                    <h1>Raido Vendor
                        <small>create vendor field here</small>
                    </h1>
                </div>
            </div>
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="/admin/dashboard">Dashboard</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="/admin/vendor">Vendor</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span class="active">Create</span>
                </li>
            </ul>
            <div class="portlet light bordered">
                <div class="portlet-title row">
                    <div class="caption font-red-sunglo col-md-6">
                        <span class="caption-subject bold uppercase">Create Vendor</span>
                    </div>
                </div>
                <div class="portlet-body form">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label style="margin-bottom: 15px;">Vendor Name</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </span>
                                        <input type="text" class="form-control"
                                               placeholder="Ex # John Doe" v-model="data.name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label style="margin-bottom: 15px;">Vendor Email</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <input type="email" class="form-control"
                                               placeholder="Ex # admin@admin.com" v-model="data.email">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label style="margin-bottom: 15px;">Vendor Mobile</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-phone"></i>
                                        </span>
                                        <input type="text" class="form-control"
                                               v-mask="'####-#######'"
                                               placeholder="Ex # 0000-1234567" v-model="data.mobile">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label style="margin-bottom: 15px;">Password</label>
                                    <div class="input-group">
                                        <span class="input-group-addon show-password">
                                            <button class="fa fa-key show-password-icon" @click="passwordIsShowing = !passwordIsShowing"
                                                    v-text="passwordIsShowing ? ' Hide': ' Show'"></button>
                                        </span>
                                        <input :type="passwordIsShowing ? 'text': 'password'" id="password" class="form-control"
                                               placeholder="Enter Password" v-model="data.password">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label style="margin-bottom: 15px;">Cnic</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-id-card"></i>
                                        </span>
                                        <input type="text" class="form-control"
                                               v-mask="'#####-#######-#'"
                                               placeholder="Ex # 42010-0000000-0" v-model="data.cnic">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label style="margin-bottom: 15px;">Initial Credit</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-">PKR</i>
                                        </span>
                                        <input type="text" class="form-control"
                                               v-mask="'#######'"
                                               placeholder="Ex # 5000" v-model="data.credit">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label style="margin-bottom: 15px;">Referral Code</label>
                                    <input type="text" class="form-control"
                                           placeholder="Ex # Raido-admin" v-model="data.vendor_referral_code">
<!--                                    <select2-->
<!--                                        v-model="data.vendor_referral_code"-->
<!--                                        :options="vendors"-->
<!--                                        placeholder="Please Select Referral Code">-->
<!--                                    </select2>-->
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top:20px;">
                            <div class="col-md-3">
                                <label style="margin-bottom: 15px;">Profile Image</label>
                                <file-upload @upload="fileSelected"></file-upload>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label style="margin-bottom: 15px;">Address</label>
                                    <textarea class="form-control" rows="5" cols="3"
                                              v-model="data.address">
                                        </textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions noborder">
                        <button @click="submit" v-text="submitting ? 'Submitting...' : 'Submit'"
                                :disabled="isActive" class="btn blue">
                            Submit
                        </button>
                        <a href="/admin/vendor">
                            <button type="button" class="btn default">Cancel</button>
                        </a>
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
        "vendors": {
            type: Array,
            default: []
        }
    },
    data() {
        return {
            data: {
                name: '',
                email: '',
                mobile: '',
                password: '',
                cnic: '',
                image: '',
                latitude: '',
                longitude: '',
                address: '',
                credit: '',
                vendor_referral_code: ''
            },
            required: {
                'name': 'Name',
                'email': 'Email',
                'mobile': 'Mobile',
                'password': 'Password',
                'cnic': 'Cnic No',
                'image': 'Profile Image',
                'address': 'Address',
                'credit': 'Credit',
            },
            submitting: false,
            isActive: false,
            passwordIsShowing: false,
        };
    },

    mounted(){
        this.$nextTick(() =>{
            navigator.geolocation.getCurrentPosition(
                position => {
                    this.data.latitude = position.coords.latitude,
                    this.data.longitude = position.coords.longitude
                },
                error => {
                    console.log(error.message);
                }
            );
        });
    },

    methods: {
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
            formData.append('password', this.data.password);
            formData.append('image', this.data.image);
            formData.append('cnic', this.data.cnic);
            formData.append('address', this.data.address);
            formData.append('latitude', this.data.latitude);
            formData.append('longitude', this.data.longitude);
            formData.append('credit', this.data.credit);
            formData.append('vendor_referral_code', this.data.vendor_referral_code);
            return formData;
        },
        submit: function () {

            for (let input in this.required) {
                if (this.data[input] === '') {
                    this.$alertify.error(`${this.required[input]} is required`);
                    return false;
                }
            }

            if (!validateEmail(this.data.email)) {
                this.$alertify.error('Email is not valid');
                return false;
            }

            this.isActive = true;
            this.submitting = true;
            axios.post('/admin/vendor', this.buildFormData())
                .then(() => {
                    this.$alertify.success("Vendor Created Successfully!");
                    setTimeout(() => {
                        window.location.href = '/admin/vendor';
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
<style>
.select2 {
    width: 100% !important;
    padding-top: 4px;
    border: 1px solid #e2e2e2;
    border-radius: 7px;
    /*padding-bottom: 4px;*/
}

.select2-container--default .select2-selection--single {
    border: none;
}
</style>
