<template>
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-head">
                <div class="page-title">
                    <h1>Raido Customer
                        <small>create customer field here</small>
                    </h1>
                </div>
            </div>
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="/admin/dashboard">Dashboard</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="/admin/customer">Customer</a>
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
                        <span class="caption-subject bold uppercase">Edit Customer</span>
                    </div>
                </div>
                <div class="portlet-body form">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label style="margin-bottom: 15px;">Customer Name</label>
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
                                    <label style="margin-bottom: 15px;">Customer Email</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <input type="text" class="form-control"
                                               placeholder="Ex # admin@admin.com" v-model="data.email">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label style="margin-bottom: 15px;">Customer Mobile</label>
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
                                    <label style="margin-bottom: 15px;">Customer Cnic</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-credit-card"></i>
                                        </span>
                                        <input type="text" class="form-control"
                                               v-mask="'#####-#######-#'" placeholder="Ex # 00000-0000000-0"
                                               v-model="data.cnic">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label style="margin-bottom: 15px;">Gender</label>
                                    <select2
                                        v-model="data.gender"
                                        :options="['Male', 'Female']"
                                        placeholder="Please Select Gender">
                                    </select2>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label style="margin-bottom: 15px;">Date Of Birth</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                        <input type="date" class="form-control"
                                               placeholder="Ex # 12-12-1999"
                                               v-model="data.dob">
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
                                    <label style="margin-bottom: 15px;">Address</label>
                                    <textarea class="form-control" rows="5" cols="3"
                                              v-model="data.address">
                                        </textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions noborder">
                        <button @click="submit" v-text="submitting ? 'Submitting...' : 'Submit'"
                                class="btn blue" :disabled="isActive">
                            Submit
                        </button>
                        <a href="/admin/customer">
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
    props: {
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
                dob: this.item.dob,
                cnic: this.item.cnic,
                gender: this.item.gender,
                image: this.item.image,
                address: this.item.address,
                password: ''
            },
            required: {
                'name': 'Customer Name',
                'email': 'Email',
                'mobile': 'Mobile',
                'cnic': 'Cnic No',
                'gender':'Gender',
                'image': 'Profile Image',
                'address': 'Address',
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
            formData.append('dob', this.data.dob);
            formData.append('gender', this.data.gender);
            formData.append('cnic', this.data.cnic);
            formData.append('address', this.data.address);
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
            axios.post(`/admin/customer/${this.item.id}`, this.buildFormData())
                .then(() => {
                    this.$alertify.success("Customer Updated Successfully!");
                    setTimeout(() => {
                        window.location.href = '/admin/customer';
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

