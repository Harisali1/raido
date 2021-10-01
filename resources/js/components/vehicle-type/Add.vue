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
            <vehicle-type-category-add @vehicle-category-added="updateVehicleCategories"></vehicle-type-category-add>
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
                    <span class="active">Create</span>
                </li>
            </ul>
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <i class="icon-user font-red-sunglo"></i>
                        <span class="caption-subject bold uppercase">Create Vehicle Type</span>
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
                                            <i class="fa fa-heading"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Enter Title"
                                               v-model="data.title">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6 col-xs-6" style="padding: 7px; padding-left: 16px">
                                            <label>Vehicle Category</label>
                                        </div>
                                        <div class="col-md-6 col-xs-6 text-right">
                                            <button type="button" class="btn btn-primary"
                                                    data-toggle="modal" data-target="#exampleModal">Add Vehicle Type
                                            </button>
                                        </div>
                                    </div>

                                    <select2
                                        v-model="data.vehicle_category_id"
                                        :options="categories"
                                        placeholder="Please Select Vehicle Category">
                                    </select2>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Passenger Capacity</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-users"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Enter Passenger Capacity"
                                            v-model="data.passenger_capacity">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Sort Order</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-sort"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Enter Sort Order"
                                            v-model="data.sort_order">
                                    </div>
                                </div>
                            </div>
<!--                            <div class="col-md-4">-->
<!--                                <div class="form-group">-->
<!--                                    <label>Base Fare</label>-->
<!--                                    <div class="input-group">-->
<!--                                        <span class="input-group-addon">-->
<!--                                            <i class="fa fa-envelope"></i>-->
<!--                                        </span>-->
<!--                                        <input type="text" class="form-control" placeholder="Enter Base Fare"-->
<!--                                            v-model="data.base_fare">-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Base Waiting Time</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-clock"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Enter Base Waiting Time"
                                            v-model="data.base_waiting_time">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Base Waiting Penalty</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-align-justify"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Enter Base Waiting Penalty"
                                               v-model="data.waiting_time_penalty">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top:20px;">
                            <div class="col-md-3">
                                <label style="margin-bottom: 15px;">Image</label>
                                <file-upload @upload="fileSelected"></file-upload>
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

import vehicleTypeCategoryAdd from "./vehicle-category/Add";
import FileUpload from '../FileUpload';
export default {
    components: {FileUpload, vehicleTypeCategoryAdd},
    props: {
        "vehicle-categories": {
            type: Array,
            default: []
        }
    },
    data() {
        return {
            data: {
                title: '',
                vehicle_category_id: '',
                passenger_capacity: '',
                sort_order: '',
                base_fare: '',
                base_waiting_time: '',
                waiting_time_penalty: '',
                image: '',
                description: '',
            },

            required: {
                'title': "Title",
                'passenger_capacity': 'Passenger Capacity',
                'sort_order': 'Sort Order',
                'image': 'Vehicle Type Image',
            },
            submitting: false,
            isActive: false,
            categories: this.vehicleCategories,
        };
    },

    methods: {
        fileSelected(files) {
            this.data.image = '';

            for (const file of files)
                this.data.image = file;
        },


        updateVehicleCategories: function (data) {
            this.categories.push({
                id: data.id,
                text: data.title
            });
        },

        buildFormData: function () {
            const formData = new FormData();
            formData.append('title', this.data.title);
            formData.append('vehicle_category_id', this.data.vehicle_category_id);
            formData.append('passenger_capacity', this.data.passenger_capacity);
            formData.append('sort_order', this.data.sort_order);
            formData.append('base_fare', this.data.base_fare);
            formData.append('base_waiting_time', this.data.base_waiting_time);
            formData.append('waiting_time_penalty', this.data.waiting_time_penalty);
            formData.append('image', this.data.image);
            formData.append('description', this.data.description);
            return formData;
        },
        submit: function () {
            for (let input in this.required) {
                if (this.data[input] === '') {
                    this.$alertify.error(`${this.required[input]} is required`);
                    return false;
                }
            }

            this.isActive = true;
            this.submitting = true;
            axios.post('/admin/vehicle_type', this.buildFormData())
                .then(() => {
                    this.$alertify.success("Vehicle Type Created Successfully!");
                    setTimeout(() => {
                        window.location.href = '/admin/vehicle_type';
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
