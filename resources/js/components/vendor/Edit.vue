<template>
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-head">
                <div class="page-title">
                    <h1>Raido Vendor
                        <small>create vendor field here</small>
                    </h1>
                </div>
            </div>
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="/admin/dashboard">Dashboard</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="/admin/vendor/create">Vendor</a>
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
                        <span class="caption-subject bold uppercase">Edit Vendor</span>
                    </div>
                </div>
                <div class="portlet-body form">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label style="margin-bottom: 15px;">Vendor Name</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </span>
                                        <input type="text" class="form-control"
                                               placeholder="Ex # John Doe" v-model="data.name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label style="margin-bottom: 15px;">Vendor Email</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <input type="email" class="form-control"
                                               placeholder="Ex # admin@admin.com" v-model="data.email">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label style="margin-bottom: 15px;">Vendor Mobile</label>
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
                        </div>
                        <div class="row">
                            <div class="col-md-6">
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label style="margin-bottom: 15px;">Cnic</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-id-card"></i>
                                        </span>
                                        <input type="text" class="form-control"
                                               v-mask="'#####-#######-#'"
                                               placeholder="Enter Cnic Here" v-model="data.cnic">
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
                        </div>
                    </div>
                    <div class="form-actions noborder">
                        <button @click="submit" v-text="submitting ? 'Submitting...' : 'Submit'"
                                :disabled="isActive" class="btn blue">
                            Submit
                        </button>
                        <a href="/admin/vendor">
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
    },
    data() {
        return {
            data: {
                name: this.item.name,
                email: this.item.email,
                mobile: this.item.mobile,
                password: '',
                cnic: this.item.cnic,
                image: this.item.image,
            },
            required: {
                'name': 'Driver Name',
                'email': 'Email',
                'mobile': 'Mobile',
                'cnic': 'Cnic No',
                'image': 'Profile Image',
            },
            passwordIsShowing: false,
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
            formData.append('email', this.data.email);
            formData.append('mobile', this.data.mobile);
            formData.append('password', this.data.password);
            formData.append('image', this.data.image);
            formData.append('cnic', this.data.cnic);
            formData.append('_method', 'PUT');
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
            axios.post(`/admin/vendor/${this.item.id}`, this.buildFormData())
                .then(() => {
                    this.$alertify.success("Vendor Updated Successfully!");
                    setTimeout(() => {
                        window.location.href = '/admin/vendor';
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

