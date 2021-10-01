<x-dashboard-layout-vendor>
    <x-slot name="title">
        Raido - Driver Vehicle Images
    </x-slot>
    <div id="app">
        <vendor-driver-vehicle-image
            :vehicles="{{ $vehicle->toJson() }}"
            :vehicle-images="{{ $vehicleImages->toJson() }}">
        </vendor-driver-vehicle-image>
    </div>
    <x-slot name="scripts">
        <script src="{{ asset('js/app.js') }}"></script>
    </x-slot>
</x-dashboard-layout-vendor>

