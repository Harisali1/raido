<x-dashboard-layout>
    <x-slot name="title">
        Raido - Vendor Edit
    </x-slot>
    <div id="app">
        <vehicle-type-edit :item="{{ $vehicleType->toJson() }}"
            :vehicle-categories="{{ $vehicleCategories->toJson() }}"></vehicle-type-edit>
    </div>
    <x-slot name="scripts">
        <script src="{{ asset('js/app.js') }}"></script>
    </x-slot>
</x-dashboard-layout>
