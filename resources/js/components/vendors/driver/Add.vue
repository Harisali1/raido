<template>
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-head">
                <div class="page-title">
                    <h1>Raido Driver
                        <small>create driver field here</small>
                    </h1>
                </div>
            </div>
            <vendor-vehicle-type-add @vehicle-type-added="updateVehicleTypes"></vendor-vehicle-type-add>
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="/vendor/dashboard">Dashboard</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="/vendor/driver">Driver</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span class="active">Create</span>
                </li>
            </ul>
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <i class="icon-user font-red-sunglo"></i>
                        <span class="caption-subject bold uppercase">Create Driver</span>
                    </div>
                </div>
                <div class="portlet-body form">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label style="margin-bottom: 15px;">Driver Name</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </span>
                                        <input type="text" class="form-control"
                                               placeholder="Ex # John Doe" v-model="data.name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label style="margin-bottom: 15px;">Driver Email</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <input type="text" class="form-control"
                                               placeholder="Ex # vendor@vendor.com" v-model="data.email">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label style="margin-bottom: 15px;">Driver Mobile</label>
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
                            <div class="col-md-3">
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
                                    <!--                                    <span class="text-danger mb-2">Note: Password limit at least 8 character</span>-->
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top:20px;">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label style="margin-bottom: 15px;">Date Of Birth</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                        <input type="date" class="form-control"
                                               placeholder="Ex # 12-12-1999"
                                               v-model="data.dob">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label style="margin-bottom: 15px;">Gender</label>
                                    <select2
                                        v-model="data.gender"
                                        :options="['Male', 'Female']"
                                        placeholder="Please Select Gender">
                                    </select2>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label style="margin-bottom: 15px;">Driver Cnic</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-credit-card"></i>
                                        </span>
                                        <input type="text" class="form-control"
                                               v-mask="'#####-#######-#'" placeholder="Ex # 00000-0000000-0"
                                               v-model="data.cnic_no">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6 col-xs-6" style="padding: 7px; padding-left: 16px">
                                            <label>Locations</label>
                                        </div>
                                    </div>
                                    <select2
                                        v-model="data.area_id"
                                        :options="areas"
                                        placeholder="Please Select Vehicle Type">
                                    </select2>
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
                    <div class="portlet-title">
                        <div class="caption font-red-sunglo">
                            <i class="icon-user font-red-sunglo"></i>
                            <span class="caption-subject bold uppercase">Vehicle Details</span>
                        </div>
                    </div>
                    <hr>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-4" style="margin-top: 14px;">
                                <div class="form-group">
                                    <label>Title</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-heading"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Enter Title"
                                               v-model="data.vehicle_name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6 col-xs-6" style="padding: 7px; padding-left: 16px">
                                            <label>Vehicle Type</label>
                                        </div>
                                        <div class="col-md-6 col-xs-6 text-right">
                                            <button type="button" class="btn btn-primary"
                                                    data-toggle="modal" data-target="#exampleModal">Add Vehicle Type
                                            </button>
                                        </div>
                                    </div>
                                    <select2
                                        v-model="data.vehicle_type_id"
                                        :options="types"
                                        placeholder="Please Select Vehicle Type">
                                    </select2>
                                </div>
                            </div>
                            <div class="col-md-4" style="margin-top: 14px">
                                <div class="form-group">
                                    <label>Vehicle CC</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-ioxhost"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Ex # BD43-D19010"
                                               v-mask="'#######'"
                                               v-model="data.vehicle_cc">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Vehicle No</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-vr-cardboard"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Ex # KHT-1234"
                                               v-model="data.vehicle_no">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>License No</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-id-card"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Ex # 42101-0000000-0#123"
                                               v-mask="'#####-#######-#X###'"
                                               v-model="data.license_no">
                                    </div>
                                </div>
                            </div>
                            <!--                            <div class="col-md-4">-->
                            <!--                                <div class="form-group">-->
                            <!--                                    <label>Make</label>-->
                            <!--                                    <div class="input-group">-->
                            <!--                                        <span class="input-group-addon">-->
                            <!--                                            <i class="fa fa-first-order"></i>-->
                            <!--                                        </span>-->
                            <!--                                        <input type="text" class="form-control" placeholder="Enter Make"-->
                            <!--                                               v-model="data.make">-->
                            <!--                                    </div>-->
                            <!--                                </div>-->
                            <!--                            </div>-->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Model</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-bars"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Enter Model"
                                               v-model="data.model">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Color</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-tint"></i>
                                        </span>
                                        <input type="color" class="form-control" placeholder="Enter Color"
                                               v-model="data.color">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Year</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Enter Year"
                                               v-mask="'####'"
                                               v-model="data.year">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top:20px;">
                            <div class="col-md-3">
                                <label style="margin-bottom: 15px;">Vehicle Image 1</label>
                                <file-upload @upload="vehicleImage1"></file-upload>
                            </div>
                            <div class="col-md-3">
                                <label style="margin-bottom: 15px;">Vehicle Image 2</label>
                                <file-upload @upload="vehicleImages($event, 'vehicle image 2')"></file-upload>
                            </div>
                            <div class="col-md-3">
                                <label style="margin-bottom: 15px;">Vehicle Image 3</label>
                                <file-upload @upload="vehicleImages($event, 'vehicle image 3')"></file-upload>
                            </div>
                            <div class="col-md-3">
                                <label style="margin-bottom: 15px;">Vehicle Image 4</label>
                                <file-upload @upload="vehicleImages($event, 'vehicle image 4')"></file-upload>
                            </div>
                        </div>
                        <div class="row" style="margin-top:20px;">
                            <div class="col-md-3">
                                <label style="margin-bottom: 15px;">Vehicle Image 5</label>
                                <file-upload @upload="vehicleImages($event, 'vehicle image 5')"></file-upload>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label style="margin-bottom: 15px;">Description</label>
                                    <textarea class="form-control" rows="5" cols="3"
                                              v-model="data.description">
                                        </textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="form-actions noborder">
                        <button @click="submit" v-text="submitting ? 'Submitting...' : 'Submit'" :disabled="isActive" class="btn blue">
                            Submit
                        </button>
                        <a href="/vendor/driver">
                            <button type="button" class="btn default">Cancel</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import vehicleTypeAdd from "./vehicle-type/Add";
import FileUpload from '../../FileUpload';


export default {
    components: {FileUpload, vehicleTypeAdd},
    props: {
        "vehicle-types": {
            type: Array,
            default: []
        },
        "areas": {
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
                dob: '2000-01-01',
                gender: '',
                cnic_no: '',
                image: '',
                address: '',
                area_id: '',

                vehicle_name: '',
                vehicle_type_id: '',
                vehicle_cc: '',
                vehicle_no: '',
                license_no: '',
                make: '',
                model: '',
                color: '#000000',
                year: '',
                vehicle_image1: '',
                description: '',
                vehicle_images: [],
                label: []
            },

            required: {
                'name': 'Driver Name',
                'email': 'Email',
                'mobile': 'Mobile',
                'password': 'Password',
                'gender': 'Gender',
                'cnic_no': 'Cnic No',
                'image': 'Profile Image',
                'address': 'Address',
                'vehicle_name': 'Vehicle Name',
                'vehicle_type_id': 'Vehicle Type Id',
                'vehicle_cc': 'Vehicle CC',
                'vehicle_no': 'Vehicle No',
                'license_no': 'Licence No',
                'model': 'Model',
                'color': 'Color',
                'year': 'Year',
                'vehicle_image1': 'Vehicle Image 1',
            },
            passwordIsShowing: false,
            submitting: false,
            isActive: false,
            types: this.vehicleTypes,
        };
    },

    methods: {
        fileSelected(files) {
            this.data.image = '';

            for (const file of files)
                this.data.image = file;
        },

        vehicleImage1(files) {
            this.data.vehicle_image1 = '';

            for (const file of files)
                this.data.vehicle_image1 = file;
        },

        vehicleImages(files, label) {

            console.log(label);
            if (files.length !== 0) {
                for (const file of files) {
                    this.data.vehicle_images.push(file)
                    this.data.label.push(label)
                }
            }
            if (files.length === 0) {
                let index = this.data.vehicle_images.indexOf(files.id);
                this.data.vehicle_images.splice(index, 1);
            }
        },

        updateVehicleTypes: function (data) {
            this.types.push({
                id: data.id,
                text: data.title
            });
        },

        buildFormData: function () {
            const formData = new FormData();
            formData.append('name', this.data.name);
            formData.append('email', this.data.email);
            formData.append('mobile', this.data.mobile);
            formData.append('password', this.data.password);
            formData.append('dob', this.data.dob);
            formData.append('gender', this.data.gender);
            formData.append('cnic_no', this.data.cnic_no);
            formData.append('license_no', this.data.license_no);
            formData.append('image', this.data.image);
            formData.append('address', this.data.address);
            formData.append('area_id', this.data.area_id);

            formData.append('vehicle_name', this.data.vehicle_name);
            formData.append('vehicle_type_id', this.data.vehicle_type_id);
            formData.append('vehicle_cc', this.data.vehicle_cc);
            formData.append('vehicle_no', this.data.vehicle_no);
            formData.append('license_no', this.data.license_no);
            formData.append('make', this.data.make);
            formData.append('model', this.data.model);
            formData.append('color', this.data.color);
            formData.append('year', this.data.year);
            formData.append('vehicle_image1', this.data.vehicle_image1);
            formData.append('description', this.data.description);
            for (const key in this.data) {
                if (typeof this.data[key] === 'object') {
                    for (const fileKey in this.data[key]) {
                        formData.append(`${key}[]`, this.data[key][fileKey]);
                    }
                    continue;
                }
                formData.append(key, this.data[key]);
            }

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
            axios.post('/vendor/driver', this.buildFormData())
                .then(() => {
                    this.$alertify.success("Driver Created Successfully!");
                    setTimeout(() => {
                        window.location.href = '/vendor/driver';
                    }, 1000);
                })
                .catch(err => {
                    this.isActive = false;
                    this.submitting = false;
                    if (err.response.status === 422) {
                        let errors = Object.values(err.response.data.errors);
                        for (let error of errors) {
                            this.$alertify.error(error[0]);
                            return false;
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

.img-fluid {
    width: 100% !important;
}

.show-password{
    padding: 0px;
}
.show-password-icon{
    border: none;
    padding: 9px;
}
</style>

