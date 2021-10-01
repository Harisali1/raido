<x-dashboard-layout-vendor>
    <x-slot name="title">
        Raido - Driver Edit
    </x-slot>
    <div id="app">
        <vendor-driver-edit
            :item="{{ $driver->toJson() }}"
            :vehicle="{{ $vehicle->toJson() }}"
            :areas="{{ $areas->toJson() }}"
            :vehicle-types="{{ $vehicleTypes->toJson() }}">
        </vendor-driver-edit>
    </div>
    <x-slot name="scripts">
        <script src="{{ asset('js/app.js') }}"></script>
    </x-slot>
</x-dashboard-layout-vendor>
