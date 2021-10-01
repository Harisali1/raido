<template>
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-head">
                <div class="page-title">
                    <h1>Raido Setting</h1>
                </div>
            </div>
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="/admin/dashboard">Dashboard</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span class="active">Setting</span>
                </li>
                <li>
                    <span class="active">Create</span>
                </li>
            </ul>
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <i class="icon-user font-red-sunglo"></i>
                        <span class="caption-subject bold uppercase">Create Setting</span>
                    </div>
                </div>
                <div class="portlet-body form">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Company Name</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Email Address"
                                               v-model="data.company_name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Company Email</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Email Address"
                                               v-model="data.company_email">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Company Contact</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Email Address"
                                               v-model="data.company_contact">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label>Company Logo</label>
                                <file-upload @upload="imagesAdd"></file-upload>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Company Address</label>
                                    <div class="input-group">
                                        <textarea class="form-control" rows="5" cols="90"
                                                  v-model="data.company_address">
                                        </textarea>
                                    </div>
                                </div>
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
import FileUpload from '.././FileUpload';
export default {
    components: {FileUpload},
    props: ['setting'],
    data() {
        return {
            data: this.setting,
            company_logo: [],
            updating: false,
            isDisabled: false,
        }
    },
    methods: {
        imagesAdd(files) {

            this.data.company_logo = '';

            for (const file of files)
                this.data.company_logo = file;
        },
        buildFormData: function () {
            const formData = new FormData();
            for (const key in this.data) {
                formData.append(key, this.data[key]);
            }
            return formData;
        },
        updateSettings: function () {
            let url = "/admin/setting";
            this.updating = true
            this.isDisabled = true
            axios.post(url, this.buildFormData())
                .then(() => {
                    this.$alertify.success('Settings Updated Successfully')
                    setTimeout(() => {
                        window.location.href = '/admin/setting/create';
                    }, 1000);
                })
                .catch(() => {
                    this.updating = false
                    this.isDisabled = false
                    this.$alertify.error('Please Wait! Something Went Wrong')
                });
        }
    }

}
</script>
