<x-dashboard-layout-vendor>
    <x-slot name="title">
        Raido - Driver Detail
    </x-slot>
    <div id="app">
        <vendor-driver-show
            :item="{{ $driver->toJson() }}">
        </vendor-driver-show>
    </div>
    <x-slot name="scripts">
        <script src="{{ asset('js/app.js') }}"></script>
    </x-slot>
</x-dashboard-layout-vendor>
