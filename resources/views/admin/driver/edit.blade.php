<x-dashboard-layout>
    <x-slot name="title">
        Raido - Driver Edit
    </x-slot>
    <div id="app">
        <driver-edit
            :item="{{ $driver->toJson() }}"
            :vehicle="{{ $vehicle->toJson() }}"
            :areas="{{ $areas->toJson() }}"
            :vehicle-types="{{ $vehicleTypes->toJson() }}">
        </driver-edit>
    </div>
    <x-slot name="scripts">
        <script src="{{ asset('js/app.js') }}"></script>
    </x-slot>
</x-dashboard-layout>
