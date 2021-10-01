<x-dashboard-layout>
    <x-slot name="styles">
        @livewireStyles
    </x-slot>
    <x-slot name="title">
        Raido - Vehicle Listing
    </x-slot>
    @livewire('vehicle-list')
    <x-slot name="scripts">
        @livewireScripts
        <script src="{{ asset('assets/global/scripts/app.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/layouts/layout4/scripts/layout.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/js.cookie.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/layouts/global/scripts/quick-sidebar.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/layouts/global/scripts/quick-nav.min.js') }}" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
        <script>
            function deleteVehicle(id) {
                swal({
                    title: "Are you sure?",
                    text: "You won't to delete this Vehicle",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            Livewire.emit('vehicleDeleted', id);
                        }
                    });
            }
        </script>
    </x-slot>
</x-dashboard-layout>
