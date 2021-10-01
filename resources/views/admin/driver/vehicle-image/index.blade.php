<x-dashboard-layout>
    <x-slot name="title">
        Raido - Driver Vehicle Images
    </x-slot>
    <div id="app">
        <driver-vehicle-image
            :vehicles="{{ $vehicle->toJson() }}"
            :vehicle-images="{{ $vehicleImages->toJson() }}">
        </driver-vehicle-image>
    </div>
    <x-slot name="scripts">
        <script src="{{ asset('js/app.js') }}"></script>
    </x-slot>
</x-dashboard-layout>

