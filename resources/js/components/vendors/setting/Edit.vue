<template>
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-head">
                <div class="page-title">
                    <h1>Raido Vendor Fare Calculation</h1>
                </div>
            </div>
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="/vendor/dashboard">Dashboard</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="/vendor/base_fare_calculation">Fare Calculation</a>
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
                        <span class="caption-subject bold uppercase">Create Base Fare Calculation</span>
                    </div>
                </div>
                <div class="portlet-body form">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Base Fare</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-">PKR</i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Enter Base Fare"
                                               v-model="data.base_fare">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Per Km</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-">PKR</i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Enter Per Km"
                                               v-model="data.per_km">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Per Hours</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-">PKR</i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Enter Per Hours"
                                               v-model="data.per_hours">
                                    </div>
                                </div>
                            </div>


                            <div class="flex flex-wrap -mx-3 mb-4">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <td colspan="3">
                                            <button type="button" @click="addRow" class="btn blue">Add More</button>
                                        </td>
                                    </tr>
                                    </thead>
                                    <thead>
                                    <tr>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Label</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Base Fare</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <tr v-for="(fare, key) of data.fareCalculation">
                                        <input type="hidden" class="form-control" placeholder="Enter Label"
                                               v-model="fare.vehicle_type_id">
                                        <td class="border-b whitespace-no-wrap">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-">PKR</i>
                                                </span>
                                                <input type="text" class="form-control" placeholder="Enter Label"
                                                       v-model="fare.label">
                                            </div>
                                        </td>
                                        <td class="border-b whitespace-no-wrap">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-">PKR</i>
                                                </span>
                                                <input type="text" class="form-control" placeholder="Enter Base Fare"
                                                       v-model="fare.base_fare">
                                            </div>
                                        </td>
                                        <td class="border-b whitespace-no-wrap">
                                            <button type="button" @click="removeRow(key)" v-if="key > 0"
                                                    class="btn red">Remove
                                            </button>
                                        </td>
                                    </tr>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions noborder">
                        <button @click="updateSettings" v-text="updating ? 'Updating...' : 'Update'"
                                :disabled="isDisabled" class="btn blue">
                            Submit
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        'item': {
            required: true
        },
    },
    data() {
        return {
            data: {
                _method: 'PUT',
                vehicle_type_id: this.item.vehicle_type_id,
                base_fare: this.item.base_fare,
                per_km: this.item.per_km,
                per_hours: this.item.per_hours,
                fareCalculation: [],

            },
            updating: false,
            isDisabled: false,
        }
    },
    mounted() {
        for (const base_fare of this.item.base_fare_cal) {
            this.data.fareCalculation.push({
                vehicle_type_id:  base_fare.vehicle_type_id,
                label: base_fare.label,
                base_fare: base_fare.base_fare,
            });
        }
    },
    methods: {

        addRow: function () {
            if (this.data.fareCalculation.length === 10) {
                this.$alertify.error("Only 10 Size Chart Can Be Added");
                return false;
            }
            this.data.fareCalculation.push({
                vehicle_type_id: this.item.vehicle_type_id,
                label: '',
                base_fare: '',
            });
        },
        removeRow: function (key) {
            this.data.fareCalculation.splice(key, 1);
        },

        updateSettings: function () {

            for (let input in this.data) {
                if (this.data[input] === '') {
                    this.$alertify.error(`${input} is required`);
                    return false;
                }
            }

            let url = `/vendor/base_fare_calculation/${this.item.id}`;
            this.updating = true
            this.isDisabled = true
            axios.post(url, this.data)
                .then(() => {
                    this.$alertify.success('Base Fare Updated Successfully')
                    setTimeout(() => {
                        window.location.href = '/vendor/base_fare_calculation';
                    }, 1000);
                })
                .catch(err => {
                    this.updating = false
                    this.isDisabled = false
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
