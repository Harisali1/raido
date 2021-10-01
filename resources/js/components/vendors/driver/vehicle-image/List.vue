<template>
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-head">
                <div class="page-title">
                    <h1>Raido Driver Vehicle Images</h1>
                </div>
            </div>
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="/vendor/dashboard">Dashboard</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="/vendor/driver">Driver</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span class="active">Vehicle Images</span>
                </li>
            </ul>
            <div class="portlet light bordered">
                <div class="portlet-body form">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label style="margin-bottom: 15px;">Label</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-heading"></i>
                                        </span>
                                        <input type="text" name="label" id="label" @change="labelValue($event)" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label style="margin-bottom: 15px;">Image</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-file"></i>
                                        </span>
                                        <input type="file" name="image" id="new-file" class="form-control"
                                               aria-label="picture" @change="imagesAdd($event)">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label style="margin-bottom: 15px;">Button</label>
                                <button @click="submit" class="form-control btn btn-info">
                                    Upload Image
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="portlet-body form">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light portlet-fit bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class=" icon-layers font-green"></i>
                                        <span class="caption-subject font-green bold uppercase">Vehicle Images</span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="mt-element-card mt-element-overlay">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12" v-for="(item, key) in vehicleImages">
                                                <div class="mt-card-item">
                                                    <div class="mt-card-avatar mt-overlay-1">
                                                        <img :src="getFullUrl(item.image)" style="height: 144px;">
<!--                                                        <div class="mt-overlay">-->
<!--                                                            <ul class="mt-info">-->
<!--                                                                <li>-->
<!--                                                                    <a class="btn default btn-outline" href="javascript:;">-->
<!--                                                                        <i class="icon-magnifier"></i>-->
<!--                                                                    </a>-->
<!--                                                                </li>-->
<!--                                                                <li>-->
<!--                                                                    <a class="btn default btn-outline" href="javascript:;">-->
<!--                                                                        <i class="icon-link"></i>-->
<!--                                                                    </a>-->
<!--                                                                </li>-->
<!--                                                            </ul>-->
<!--                                                        </div>-->
                                                    </div>
                                                    <div class="mt-card-content">
                                                        <h3 class="mt-card-name" v-text="item.label"></h3>
                                                        <p class="mt-card-desc font-grey-mint">
                                                            <button @click="deleteVehicleDocument(item.id, key)" class="btn btn-danger px-3 mt-1">
                                                                Delete
                                                            </button>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
export default {
    props: ['vehicles', 'vehicle-images'],
    data() {
        return {
            data: new FormData,
            image: this.vehicleImages.image,
            label: this.vehicleImages.label

        }
    },

    methods: {
        labelValue(event) {
            this.data.append('label', event.target.value);
        },
        imagesAdd(event) {
            for (const file of event.target.files) {
                this.data.append('image', file);
            }
        },

        getFullUrl(src) {
            return `${location.origin}/storage/${src}`;
        },


        submit: function () {

            axios.post(`/vendor/driver_vehicle_images/${this.vehicles.id}`, this.data)
                .then(() => {
                    console.log(this.data);
                    this.$alertify.success("Vehicle Image Uploaded Successfully!");
                    setTimeout(() => {
                        window.location.href = `/vendor/driver_vehicle_images/${this.vehicles.id}`;
                    }, 1000)
                })
                .catch(err => {
                    if (err.response.status === 422) {
                        let errors = Object.values(err.response.data.errors);
                        for (let error of errors) {
                            this.$alertify.error(error[0]);
                        }
                    }
                })

        },
        deleteVehicleDocument: function (id, key) {
            axios.delete(`/vendor/driver_vehicle_images/${id}`)
                .then(() => {
                    this.vehicleImages.splice(key, 1);
                    this.$alertify.success('Vehicle Image Deleted Successfully!');
                    setTimeout(() => {
                        window.location.href = `/vendor/driver_vehicle_images/${this.vehicles.id}`;
                    }, 1000)
                })
                .catch(console.error)
        }
    }
}
</script>
