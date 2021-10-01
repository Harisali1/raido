<template>
    <div name="vehicle-type-add" class="center modal fade" id="exampleModal" tabindex="-1"
         role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
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
                                        <label>Title</label>
                                        <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                            <input type="text" class="form-control" placeholder="Enter Title"
                                                   v-model="data.title">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Passenger Capacity</label>
                                        <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                            <input type="text" class="form-control" placeholder="Enter Passenger Capacity"
                                                   v-model="data.passenger_capacity">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Sort Order</label>
                                        <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                            <input type="text" class="form-control" placeholder="Enter Sort Order"
                                                   v-model="data.sort_order">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label style="margin-bottom: 15px;">Image</label>
                                    <file-upload @upload="fileSelected"></file-upload>
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

import FileUpload from '../../../FileUpload';

export default {
    components: {FileUpload},
    data() {
        return {
            data: {
                title: '',
                sort_order: '',
                passenger_capacity: '',
                image: '',
            },
            submitting: false,
            isActive: false,
        }
    },
    methods: {
        fileSelected(files) {
            this.data.image = '';

            for (const file of files)
                this.data.image = file;
        },

        // dismissModal: function () {
        //     this.$modal.hide('vehicle-type-add')
        // },
        buildFormData: function () {
            const formData = new FormData()
            formData.append('title', this.data.title)
            formData.append('sort_order', this.data.sort_order)
            formData.append('passenger_capacity', this.data.passenger_capacity)
            formData.append('image', this.data.image)
            return formData;
        },

        submit: function () {
            for (let input in this.data) {
                if (this.data.name === '') {
                    this.$alertify.error(`${input} is required`);
                    return false;
                }
            }
            this.submitting = true
            this.isActive = true
            axios.post('/vendor/vehicle_type', this.buildFormData())
                .then(({data}) => {
                    this.$alertify.success("Vehicle Type Created Successfully!");
                    this.$emit('vehicle-type-added', data)
                    // this.dismissModal('');
                    $("#exampleModal").modal('hide');
                    this.data.title = '';
                    this.data.sort_order = '';
                    this.data.passenger_capacity = '';
                    this.data.image = '';
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
<!--<style>-->
<!--.select2 {-->
<!--    width: 100% !important;-->
<!--    padding-top: 4px;-->
<!--    border: 1px solid #e2e2e2;-->
<!--    border-radius: 7px;-->
<!--    /*padding-bottom: 4px;*/-->
<!--}-->

<!--.select2-container&#45;&#45;default .select2-selection&#45;&#45;single {-->
<!--    border: none;-->
<!--}-->
<!--.img-fluid{-->
<!--    width: 100%!important;-->
<!--}-->
<!--</style>-->


