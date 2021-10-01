<x-dashboard-layout>
    <x-slot name="title">
        Raido - Vehicle Edit
    </x-slot>
    <div id="app">
        <vehicle-edit :item="{{ $vehicle->toJson() }}"
            :vehicle-types="{{ $vehicleTypes->toJson() }}"></vehicle-edit>
    </div>
    <x-slot name="scripts">
        <script src="{{ asset('js/app.js') }}"></script>
    </x-slot>
</x-dashboard-layout>
