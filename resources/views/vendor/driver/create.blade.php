<x-dashboard-layout-vendor>
    <x-slot name="title">
        Raido - Driver Create
    </x-slot>
    <div id="app">
        <vendor-driver-add
            :vehicle-types="{{ $vehicleTypes->toJson() }}"
            :areas="{{ $areas->toJson() }}">
        </vendor-driver-add>
    </div>
    <x-slot name="scripts">
        <script src="{{ asset('js/app.js') }}"></script>
    </x-slot>
</x-dashboard-layout-vendor>

