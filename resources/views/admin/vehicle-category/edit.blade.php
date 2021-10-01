<x-dashboard-layout>
    <x-slot name="title">
        Raido - Vehicle Category Edit
    </x-slot>
    <div id="app">
        <vehicle-category-edit
            :item="{{ $vehicle_category->toJson() }}">
        </vehicle-category-edit>
    </div>
    <x-slot name="scripts">
        <script src="{{ asset('js/app.js') }}"></script>
    </x-slot>
</x-dashboard-layout>
