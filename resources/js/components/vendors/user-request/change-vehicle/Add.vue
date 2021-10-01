<template>
    <div class="center modal fade" id="changeVehicleModel" tabindex="-1"
         role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Change Vehicle</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Driver Name</label>
                                        <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </span>
                                            <input type="text" class="form-control" placeholder="Enter Driver Name" v-model="data.driver_name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Driver Mobile</label>
                                        <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-phone"></i>
                                        </span>
                                            <input type="text" class="form-control" placeholder="Enter Driver Mobile"
                                                   v-mask="'####-#######'" v-model="data.driver_mobile">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Vehicle No</label>
                                        <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-car"></i>
                                        </span>
                                            <input type="text" class="form-control" placeholder="Enter Vehicle No" v-model="data.vehicle_no">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button @click="submit" v-text="submitting ? 'Submitting...' : 'Submit'"
                            :disabled="isActive" class="btn blue">
                        Submit
                    </button>
                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    props: ['change-vehicle'],
    data() {
        return {
            data: {
                user_request_id: this.changeVehicle,
                driver_name: '',
                driver_mobile: '',
                vehicle_no: ''
            },
            submitting: false,
            isActive: false,
        }
    },
    methods: {
        submit: function () {
            // for (let input in this.data) {
            //     if (this.data.name === '') {
            //         this.$alertify.error(`${input} is required`);
            //         return false;
            //     }
            // }
            this.submitting = true
            this.isActive = true
            axios.post('/vendor/change_vehicle', this.data)
                .then(() => {
                    this.$alertify.success("Vehicle And Driver Change Successfully!");
                    $("#changeVehicleModel").modal('hide');
                    this.data.user_request_id = '';
                    this.data.driver_name = '';
                    this.data.driver_mobile = '';
                    this.data.vehicle_no = '';
                })
                .catch(err => {
                    this.submitting = false;
                    this.isActive = false;
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
