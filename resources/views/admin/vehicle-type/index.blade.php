<x-dashboard-layout>
    <x-slot name="styles">
        @livewireStyles
    </x-slot>
    <x-slot name="title">
        Raido - Vehicle Type Listing
    </x-slot>
    @livewire('vehicle-type-list')
    <x-slot name="scripts">
        @livewireScripts
        <script src="{{ asset('assets/global/scripts/app.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/layouts/layout4/scripts/layout.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/js.cookie.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/layouts/global/scripts/quick-sidebar.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/layouts/global/scripts/quick-nav.min.js') }}" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
        <script>
            function deleteVehicleType(id) {
                swal({
                    title: "Are you sure?",
                    text: "You won't to delete this SubAdmin",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            Livewire.emit('vehicleTypeDeleted', id);
                        }
                    });
            }

            function updateVehicleTypeStatus(id) {
                Livewire.emit('statusUpdated', id);
                swal({
                    title: 'success',
                    text: 'Vehicle Type status has been updated Successfully!',
                    timer: 5000
                })
                setTimeout(() => {
                    window.location.href = '/admin/vehicle_type';
                }, 500);
            }
        </script>
    </x-slot>
</x-dashboard-layout>
