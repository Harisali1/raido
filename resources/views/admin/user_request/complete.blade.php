<x-dashboard-layout>
    <x-slot name="styles">
        @livewireStyles
    </x-slot>
    <x-slot name="title">
        Raido - Complete Request Listing
    </x-slot>
    @livewire('complete-request-list')
    <x-slot name="scripts">
        @livewireScripts
        <script src="{{ asset('assets/global/scripts/app.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/layouts/layout4/scripts/layout.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/js.cookie.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/layouts/global/scripts/quick-sidebar.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/layouts/global/scripts/quick-nav.min.js') }}" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
        <script>
            function deleteCompleteRequest(id) {
                swal({
                    title: "Are you sure?",
                    text: "You won't to delete this Request",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            Livewire.emit('completeRequestDeleted', id);
                        }
                    });
            }
            function updateCompleteRequestStatus(id) {
                Livewire.emit('statusUpdated', id);
                swal({
                    title: 'success',
                    text: 'Request status has been updated Successfully!',
                    timer: 5000
                })
                setTimeout(() => {
                    window.location.href = '/admin/user_request';
                }, 500);
            }
        </script>
    </x-slot>
</x-dashboard-layout>
