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
                    <span class="active">Edit</span>
                </li>
            </ul>
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <i class="icon-user font-red-sunglo"></i>
                        <span class="caption-subject bold uppercase">Edit Driver</span>
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
                                               placeholder="Ex # admin@admin.com" v-model="data.email">
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
                                    <label style="margin-bottom: 15px;">Locations</label>
                                    <select2
                                        v-model="data.area_id"
                                        :options="areas"
                                        placeholder="Please Select locations">
                                    </select2>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top:20px;">
                            <div class="col-md-3">
                                <label style="margin-bottom: 15px;">Profile Image</label>
                                <file-upload @upload="fileSelected"></file-upload>
                            </div>
                            <div class="col-md-3">
                                <label style="margin-bottom: 15px;">Profile Image</label>
                                <div class="input-group">
                                    <img :src="getFullUrl(data.image)" class="img-fluid"
                                         style="height: 110px;width: 270px!important;">
                                </div>
                            </div>
                            <div class="col-md-6">
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
                            <div class="col-md-4">
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
                                    <label>Vehicle Type</label>
                                    <select2
                                        v-model="data.vehicle_type_id"
                                        :options="vehicleTypes"
                                        placeholder="Please Select Vehicle Type">
                                    </select2>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Vehicle CC</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-ioxhost"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Ex # BD43-D19010"
                                               v-mask="'######'"
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
                                               v-mask="'AAA-####'"
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
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Make</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-first-order"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Enter Make"
                                               v-model="data.make">
                                    </div>
                                </div>
                            </div>
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
                            <div class="col-md-2">
                                <label style="margin-bottom: 15px;">Vehicle Image 1</label>
                                <file-upload @upload="vehicleImage1"></file-upload>
                            </div>
                            <div class="col-md-2">
                                <label style="margin-bottom: 15px;">Vehicle Image 1</label>
                                <div class="input-group" v-if="data.vehicle_image1 === ''">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/1024px-No_image_available.svg.png" class="img-fluid"
                                         style="height: 110px;width: 172px!important;">

                                </div>
                                <div v-else class="input-group">
                                    <img :src="getFullUrl(data.vehicle_image1)" class="img-fluid"
                                         style="height: 110px;width: 172px!important;">

                                </div>
                            </div>
                            <div class="col-md-2">
                                <label style="margin-bottom: 15px;">Vehicle Image 2</label>
                                <file-upload @upload="vehicleImage2"></file-upload>
                            </div>
                            <div class="col-md-2">
                                <label style="margin-bottom: 15px;">Vehicle Image 2</label>
                                <div class="input-group" v-if="data.vehicle_image2 === '' || data.vehicle_image2 === null">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/1024px-No_image_available.svg.png" class="img-fluid"
                                         style="height: 110px;width: 172px!important;">

                                </div>
                                <div v-else class="input-group">
                                    <img :src="getFullUrl(data.vehicle_image2)" class="img-fluid"
                                         style="height: 110px;width: 172px!important;">

                                </div>
                            </div>
                            <div class="col-md-2">
                                <label style="margin-bottom: 15px;">Vehicle Image 3</label>
                                <file-upload @upload="vehicleImage3"></file-upload>
                            </div>
                            <div class="col-md-2">
                                <label style="margin-bottom: 15px;">Vehicle Image 3</label>
                                <div class="input-group" v-if="data.vehicle_image3 === '' || data.vehicle_image3 === null">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/1024px-No_image_available.svg.png" class="img-fluid"
                                         style="height: 110px;width: 172px!important;">

                                </div>
                                <div v-else class="input-group">
                                    <img :src="getFullUrl(data.vehicle_image3)" class="img-fluid"
                                         style="height: 110px;width: 172px!important;">

                                </div>
                            </div>

                        </div>
                        <div class="row" style="margin-top: 20px">
                            <div class="col-md-2">
                                <label style="margin-bottom: 15px;">Vehicle Image 4</label>
                                <file-upload @upload="vehicleImage4"></file-upload>
                            </div>
                            <div class="col-md-2">
                                <label style="margin-bottom: 15px;">Vehicle Image 4</label>
                                <div class="input-group" v-if="data.vehicle_image4 === '' || data.vehicle_image4 === null">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/1024px-No_image_available.svg.png" class="img-fluid"
                                         style="height: 110px;width: 172px!important;">

                                </div>
                                <div v-else class="input-group">
                                    <img :src="getFullUrl(data.vehicle_image4)" class="img-fluid"
                                         style="height: 110px;width: 172px!important;">

                                </div>
                            </div>
                            <div class="col-md-2">
                                <label style="margin-bottom: 15px;">Vehicle Image 5</label>
                                <file-upload @upload="vehicleImage5"></file-upload>
                            </div>
                            <div class="col-md-2">
                                <label style="margin-bottom: 15px;">Vehicle Image 5</label>
                                <div class="input-group" v-if="data.vehicle_image5 === '' || data.vehicle_image5 === null">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/1024px-No_image_available.svg.png" class="img-fluid"
                                         style="height: 110px;width: 172px!important;">

                                </div>
                                <div v-else class="input-group">
                                    <img :src="getFullUrl(data.vehicle_image5)" class="img-fluid"
                                         style="height: 110px;width: 172px!important;">

                                </div>
                            </div>
                            <div class="col-md-4">
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
                        <a href="/admin/driver">
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
    props:{
        'item': {
            required: true
        },
        'vehicle': {
            type: Object,
            default: []
        },
        'vehicle-types': {
            type: Array,
            default: []
        },
        'areas': {
            type: Array,
            default: []
        },
    },
    data() {
        return {
            data: {
                name: this.item.name,
                email: this.item.email,
                mobile: this.item.mobile,
                password: '',
                dob: this.item.dob,
                gender: this.item.gender,
                cnic_no: this.item.cnic_no,
                image: this.item.image,
                address: this.item.address,
                area_id: this.item.area_id,

                vehicle_name: this.vehicle.name,
                vehicle_type_id: this.vehicle.vehicle_type_id,
                vehicle_cc: this.vehicle.vehicle_cc,
                vehicle_no: this.vehicle.vehicle_no,
                license_no: this.vehicle.license_no,
                make: this.vehicle.make,
                model: this.vehicle.model,
                color: this.vehicle.color,
                year: this.vehicle.year,
                vehicle_image1: this.vehicle.image,
                vehicle_image2: this.vehicle.image_1,
                vehicle_image3: this.vehicle.image_2,
                vehicle_image4: this.vehicle.image_3,
                vehicle_image5: this.vehicle.image_4,
                description: this.vehicle.description,
                _method: 'PUT',
            },
            required: {
                'name': 'Driver Name',
                'email': 'Email',
                'mobile': 'Mobile',
                'gender':'Gender',
                'cnic_no': 'Cnic No',
                'image': 'Profile Image',
                'address': 'Address',
                'vehicle_name': 'Vehicle Name',
                'vehicle_type_id': 'Vehicle Type Id',
                'vehicle_cc': 'Vehicle CC',
                'vehicle_no': 'Vehicle No',
                'license_no': 'Licence No',
                'make': 'Make',
                'model': 'Model',
                'color': 'Color',
                'year': 'Year',
                'vehicle_image1': 'Vehicle Image 1',
                'description': 'Desc',
            },
            submitting: false,
            isActive: false,
            passwordIsShowing: false,
        };
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

        vehicleImage1(files) {
            this.data.vehicle_image1 = '';

            for (const file of files)
                this.data.vehicle_image1 = file;
        },

        vehicleImage2(files) {
            this.data.vehicle_image2 = '';

            for (const file of files)
                this.data.vehicle_image2 = file;
        },

        vehicleImage3(files) {
            this.data.vehicle_image3 = '';

            for (const file of files)
                this.data.vehicle_image3 = file;
        },

        vehicleImage4(files) {
            this.data.vehicle_image4 = '';

            for (const file of files)
                this.data.vehicle_image4 = file;
        },

        vehicleImage5(files) {
            this.data.vehicle_image5 = '';

            for (const file of files)
                this.data.vehicle_image5 = file;
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
            formData.append('vehicle_image2', this.data.vehicle_image2);
            formData.append('vehicle_image3', this.data.vehicle_image3);
            formData.append('vehicle_image4', this.data.vehicle_image4);
            formData.append('vehicle_image5', this.data.vehicle_image5);
            formData.append('description', this.data.description);
            formData.append('_method', 'put');
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
            axios.post(`/admin/driver/${this.item.id}`, this.buildFormData())
                .then(() => {
                    this.$alertify.success("Driver Updated Successfully!");
                    setTimeout(() => {
                        window.location.href = '/admin/driver';
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
                })
        }
    }
}
</script>

