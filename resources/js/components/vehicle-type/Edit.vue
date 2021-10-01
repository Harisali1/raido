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
                                            <i class="fa fa-heading"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Enter Title"
                                               v-model="data.title">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Vehicle Category</label>
                                    <select2
                                        v-model="data.vehicle_category_id"
                                        :options="vehicleCategories"
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
                                <label style="margin-bottom: 15px;">Profile Image</label>
                                <file-upload @upload="fileSelected"></file-upload>
                            </div>
                            <div class="col-md-3">
                                <label style="margin-bottom: 15px;">Profile Image</label>
                                <div class="input-group">
                                    <img :src="getFullUrl(data.image)" class="img-fluid"
                                         style="height: 110px;width: 570px;">
                                </div>
                            </div>
                            <div class="col-md-6">
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
import FileUpload from '../FileUpload';
export default {
    components: {FileUpload},
    props:{
        'item': {
            required: true
        },
        "vehicle-categories": {
            type: Array,
            default: []
        }
    },
    data() {
        return {
            data: {
                title: this.item.title,
                vehicle_category_id: this.item.vehicle_category_id,
                passenger_capacity: this.item.passenger_capacity,
                sort_order: this.item.sort_order,
                base_fare: this.item.base_fare,
                base_waiting_time: this.item.base_waiting_time,
                waiting_time_penalty: this.item.waiting_time_penalty,
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
            formData.append('title', this.data.title);
            formData.append('vehicle_category_id', this.data.vehicle_category_id);
            formData.append('passenger_capacity', this.data.passenger_capacity);
            formData.append('sort_order', this.data.sort_order);
            formData.append('base_fare', this.data.base_fare);
            formData.append('base_waiting_time', this.data.base_waiting_time);
            formData.append('waiting_time_penalty', this.data.waiting_time_penalty);
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
            axios.post(`/admin/vehicle_type/${this.item.id}`, this.buildFormData())
                .then(() => {
                    this.$alertify.success("Vehicle Type Updated Successfully!");
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

