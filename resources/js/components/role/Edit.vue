<template>
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-head">
                <div class="page-title">
                    <h1>Raido Role And Permissions
                        <small>create role with his permissions.</small>
                    </h1>
                </div>
            </div>
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="/admin/dashboard">Dashboard</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="/admin/role">Roles</a>
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
                        <span class="caption-subject bold uppercase">Create Role With Permissions</span>
                    </div>
                </div>
                <div class="portlet-body form">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Role</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-align-center"></i>
                                        </span>
                                        <input type="text" v-model="data.label" class="form-control"
                                               placeholder="Enter Your Role">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="portlet-title">
                                    <div class="caption font-red-sunglo">
                                        <i class="icon-check font-red-sunglo"></i>
                                        <span class="caption-subject bold uppercase">Permissions</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-3" v-for="(permission, key) in permissions">
                                    <div class="mt-checkbox-list">
                                        <input class="input flex-wrap flex-none border border-gray-500 mt-1"
                                               type="checkbox" @change="choosePermission($event, permission)"
                                               :checked="data.permissions.indexOf(permission.id) > -1">
                                        <span v-text="permission.label"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions noborder">
                        <button @click="update" v-text="updating ? 'Updating...' : 'Update'"
                                class="btn blue" :disabled="isActive">
                        </button>
                        <a href="/admin/role">
                            <button type="button" class="btn default">Cancel</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        'role': {
            required: true
        },
        "permissions": {
            type: Array,
            default: []
        }
    },
    data() {
        return {
            data: {
                label: this.role.label,
                permissions: this.getIdsFromObject(this.role.permissions),
            },
            updating: false,
            isActive: false,
        }
    },

    methods: {
        getIdsFromObject: function (objects) {
            let ids = [];
            for (const object of objects) {
                ids.push(object.id);
            }
            return ids;
        },
        choosePermission(evt, permission) {
            if (evt.target.checked === true) {
                this.data.permissions.push(permission.id);
            }
            if (evt.target.checked === false) {
                let index = this.data.permissions.indexOf(permission.id);
                this.data.permissions.splice(index, 1);
            }
        },

        update: function () {
            if (this.data.label === '') {
                this.$alertify.error(`Role Name Is Required`);
                return false;
            }
            this.updating = true;
            this.isActive = true;
            this.data['_method'] = 'PUT';
            axios.post(`/admin/role/${this.role.id}`, this.data)
                .then(() => {
                    this.$alertify.success("Role Updated Successfully!");
                    setTimeout(() => {
                        window.location.href = '/admin/role';
                    }, 1000)
                })
                .catch(err => {
                    this.updating = false;
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

