<template>
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-head">
                <div class="page-title">
                    <h1>Raido Customer
                        <small>create customer field</small>
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
                    <span class="active">Create</span>
                </li>
            </ul>
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <i class="icon-user font-red-sunglo"></i>
                        <span class="caption-subject bold uppercase">Create Customer</span>
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

                        <div class="row">
                            <div class="col-md-3">
                                <label style="margin-bottom: 15px;">Profile Image</label>
<!--                                <input type="file" class="dropify" data-height="300" />-->
<!--                                <vue-dropzone ref="dropzone"-->
<!--                                              id="drop1"-->
<!--                                              :options="dropOptions"-->
<!--                                              @vdropzone-complete="afterComplete">-->
<!--                                </vue-dropzone>-->
                                <file-upload @upload="fileSelected"></file-upload>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label style="margin-bottom: 15px;">Address</label>
                                    <textarea class="form-control" rows="5" cols="5"
                                              v-model="data.address">
                                        </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">

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
// $('.dropify').dropify({
//     messages: {
//         'default': 'Drag and drop a file here or click',
//         'replace': 'Drag and drop or click to replace',
//         'remove':  'Remove',
//         'error':   'Ooops, something wrong happended.'
//     }
// });
import 'vue2-dropzone/dist/vue2Dropzone.min.css';
import vueDropzone from "vue2-dropzone";
import FileUpload from '../FileUpload';

export default {
    components: {FileUpload,vueDropzone},
    data() {
        return {
            data: {
                name: '',
                email: '',
                mobile: '',
                password: '',
                cnic: '',
                gender: '',
                dob: '2000-01-01',
                image: '',
                address: '',
                status: 1,
            },
            dropOptions: {
                url: "https://httpbin.org/post",
                maxFilesize: 2, // MB
                maxFiles: 1,
                uploadMultiple: false,
                // chunking: true,
                // chunkSize: 500, // Bytes
                thumbnailWidth: 150, // px
                thumbnailHeight: 150,
                addRemoveLinks: true
            },
            required: {
                'name': 'Customer Name',
                'email': 'Email',
                'mobile': 'Mobile',
                'password': 'Password',
                'cnic': 'Cnic No',
                'gender':'Gender',
                'image': 'Profile Image',
                'address': 'Address',
            },
            submitting: false,
            isActive: false,
            passwordIsShowing: false,
        };
    },

    methods: {
        afterComplete(file) {
            this.data.image = '';

            // for (const file of files)
                this.data.image = file;
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
            formData.append('cnic', this.data.cnic);
            formData.append('gender', this.data.gender);
            formData.append('address', this.data.address);
            formData.append('status', this.data.status);
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
            axios.post('/admin/customer', this.buildFormData())
                .then(() => {
                    this.$alertify.success("Customer Created Successfully!");
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
<style>
.select2 {
    width: 100% !important;
    padding-top: 4px;
    border: 1px solid #e2e2e2;
    border-radius: 7px;
    /*padding-bottom: 4px;*/
}

.select2-container--default .select2-selection--single {
    border: none;
}
.img-fluid{
    width: 100%!important;
}
.dropzone .dz-message {
    margin: 3em 0!important;
}
</style>

