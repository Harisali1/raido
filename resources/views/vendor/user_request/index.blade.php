<x-dashboard-layout-vendor>
    <x-slot name="styles">
        @livewireStyles
    </x-slot>
    <x-slot name="title">
        Raido - User Request Listing
    </x-slot>
    @livewire('vendor.vendor-user-request-list')
    <x-slot name="scripts">
        @livewireScripts
        <link href="{{ asset('assets/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
        <script src="{{ asset('assets/global/scripts/app.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/layouts/layout4/scripts/layout.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/js.cookie.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/layouts/global/scripts/quick-sidebar.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/layouts/global/scripts/quick-nav.min.js') }}" type="text/javascript"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
        <script>
            function approvedUserRequest(id) {
                swal({
                    title: "Are you sure?",
                    text: "You want to Approved  this request",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            location.href = `/vendor/user_request/` + id + `/approved`;
                        }
                    });
            }
            function rejectUserRequest(id) {
                swal("Write Some Reason For Rejection:", {
                    content: "input",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((value) => {
                        if(value){
                            location.href = `/vendor/user_request/` + id + `/rejected?reason=` + value +``;
                            swal("Reason Submitted", {
                                icon: "success",
                            });
                        }
                    });


            }
            function deleteVendorVehicle(id) {
                swal({
                    title: "Are you sure?",
                    text: "You want to delete this Vehicle",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            Livewire.emit('vendorVehicleDeleted', id);
                        }
                    });
            }
        </script>
    </x-slot>
</x-dashboard-layout-vendor>
