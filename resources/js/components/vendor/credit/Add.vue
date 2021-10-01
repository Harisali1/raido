<template>
    <div class="center modal fade" id="creditAddModel" tabindex="-1"
         role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Recharge Your Amount</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Amount</label>
                                        <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-">PKR</i>
                                        </span>
                                            <input type="text" class="form-control" placeholder="Enter Recharge Amount"
                                                   v-mask="'######'" v-model="data.credit">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button @click="submit" v-text="submitting ? 'Submitting...' : 'Submit'" class="btn blue">
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
    props: ['vendor-id'],
    data() {
        return {
            data: {
                credit: '',
            },
            submitting: false,
            // isActive: false,
        }
    },
    methods: {
        submit: function () {
            if (this.data.credit === '') {
                this.$alertify.error(`${input} is required`);
                return false;
            }

            this.submitting = true
            // this.isActive = true
            axios.post(`/admin/vendor/credit/${this.vendorId}`, this.data)
                .then(() => {
                    this.$alertify.success("Credit Recharge Successfully!");
                    $("#creditAddModel").modal('hide');
                    this.data.credit = '';
                })
                .catch(err => {
                    this.submitting = false;
                    // this.isActive = false;
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
