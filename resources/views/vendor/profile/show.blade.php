<x-dashboard-layout-vendor>
    <x-slot name="title">
        Raido - Vendor Profile
    </x-slot>
    <div id="app">
        <vendor-profile-show
            :item="{{ $vendor->toJson() }}">
        </vendor-profile-show>
    </div>
    <x-slot name="scripts">
        <script src="{{ asset('js/app.js') }}"></script>
    </x-slot>
</x-dashboard-layout-vendor>
