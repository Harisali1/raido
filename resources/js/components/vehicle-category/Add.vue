<template>
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-head">
                <div class="page-title">
                    <h1>Raido Vehicle Category
                        <small>create vehicle category field here</small>
                    </h1>
                </div>
            </div>
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="/admin/dashboard">Dashboard</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="/admin/vehicle_category">Vehicle Category</a>
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
                        <span class="caption-subject bold uppercase">Create Vehicle Category</span>
                    </div>
                </div>
                <div class="portlet-body form">
                    <div class="form-body">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Title</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-align-center"></i>
                                        </span>
                                        <input type="text" v-model="data.title" class="form-control"
                                               placeholder="Enter Vehicle Category Title">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>App Label</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-align-center"></i>
                                        </span>
                                        <input type="text" v-model="data.app_label"
                                               class="form-control" placeholder="Enter App Label">
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
                    <div class="form-actions noborder">
                        <button @click="submit" v-text="submitting ? 'Submitting...' : 'Submit'" class="btn blue"
                                :disabled="isActive">
                            Submit
                        </button>
                        <a href="/admin/vehicle_category">
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
    data() {
        return {
            data: {
                title: '',
                app_label: '',
                image: '',
            },
            submitting: false,
            isActive: false,
        };
    },

    methods: {
        fileSelected(files) {
            this.data.image = '';

            for (const file of files)
                this.data.image = file;
        },
        buildFormData: function () {
            const formData = new FormData();
            formData.append('title', this.data.title);
            formData.append('app_label', this.data.app_label);
            formData.append('image', this.data.image);
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
            axios.post('/admin/vehicle_category', this.buildFormData())
                .then(() => {
                    this.$alertify.success("Vehicle Category Created Successfully!");
                    setTimeout(() => {
                        window.location.href = '/admin/vehicle_category';
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

