<template>
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-head">
                <div class="page-title">
                    <h1>Raido Vehicle Type
                        <small>create vehicle type field here</small>
                    </h1>
                </div>
            </div>
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="/admin/dashboard">Dashboard</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="/admin/vehicle_type">Vehicle Type</a>
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
                        <span class="caption-subject bold uppercase">Edit Vehicle Type</span>
                    </div>
                </div>
                <div class="portlet-body form">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Title</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Enter Title"
                                               v-model="data.name">
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
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Enter Vehicle CC"
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
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Enter Vehicle No"
                                               v-model="data.vehicle_no">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>License No</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Enter License No"
                                               v-model="data.license_no">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Make</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
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
                                            <i class="fa fa-envelope"></i>
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
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Enter Color"
                                               v-model="data.color">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Year</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Enter Year"
                                               v-model="data.year">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top:20px;">
                            <div class="col-md-6">
                                <label style="margin-bottom: 15px;">Profile Image</label>
                                <file-upload @upload="fileSelected"></file-upload>
                            </div>
                            <div class="col-md-6">
                                <label style="margin-bottom: 15px;">Profile Image</label>
                                <div class="input-group">
                                    <img :src="getFullUrl(data.image)" class="img-fluid"
                                         style="height: 200px;width: 570px;">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label style="margin-bottom: 15px;">Description</label>
                                    <textarea class="form-control" rows="9" cols="3"
                                              v-model="data.description">
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
                        <a href="/admin/vehicle_type">
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
        "vehicle-types": {
            type: Array,
            default: []
        }
    },
    data() {
        return {
            data: {
                name: this.item.name,
                vehicle_type_id: this.item.vehicle_type_id,
                vehicle_cc: this.item.vehicle_cc,
                vehicle_no: this.item.vehicle_no,
                license_no: this.item.license_no,
                make: this.item.make,
                model: this.item.model,
                color: this.item.color,
                year: this.item.year,
                image: this.item.image,
                description: this.item.description,
            },
            submitting: false,
            isActive: false,
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
        buildFormData: function () {
            const formData = new FormData();
            formData.append('name', this.data.name);
            formData.append('vehicle_type_id', this.data.vehicle_type_id);
            formData.append('vehicle_cc', this.data.vehicle_cc);
            formData.append('vehicle_no', this.data.vehicle_no);
            formData.append('license_no', this.data.license_no);
            formData.append('make', this.data.make);
            formData.append('model', this.data.model);
            formData.append('color', this.data.color);
            formData.append('year', this.data.year);
            formData.append('image', this.data.image);
            formData.append('description', this.data.description);
            formData.append('_method', 'PUT');
            return formData;
        },
        submit: function () {
            for (let input in this.data) {
                if (this.data[input] === '') {
                    this.$alertify.error(`${input} is required`);
                    return false;
                }
            }

            this.isActive = true;
            this.submitting = true;
            axios.post(`/admin/vehicle/${this.item.id}`, this.buildFormData())
                .then(() => {
                    this.$alertify.success("Vehicle Updated Successfully!");
                    setTimeout(() => {
                        window.location.href = '/admin/vehicle';
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

