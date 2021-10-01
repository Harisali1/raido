<x-dashboard-layout>
    <x-slot name="title">
        Raido - Vehicle Type Create
    </x-slot>
    <x-slot name="styles">
{{--        <style>--}}
{{--            .select2-container .select2-selection--single {--}}
{{--                height: 33px!important;--}}
{{--            }--}}
{{--        </style>--}}
    </x-slot>
    <div id="app">
        <vehicle-type-add
            :vehicle-categories="{{ $vehicleCategories->toJson() }}"></vehicle-type-add>
    </div>
    <x-slot name="scripts">
        <script src="{{ asset('js/app.js') }}"></script>
    </x-slot>
</x-dashboard-layout>

