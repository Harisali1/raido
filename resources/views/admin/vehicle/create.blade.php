<x-dashboard-layout>
    <x-slot name="title">
        Raido - Vehicle Create
    </x-slot>
    <x-slot name="styles">
{{--        <style>--}}
{{--            .select2-container .select2-selection--single {--}}
{{--                height: 33px!important;--}}
{{--            }--}}
{{--        </style>--}}
    </x-slot>
    <div id="app">
        <vehicle-add :vehicle-types="{{ $vehicleTypes->toJson() }}"></vehicle-add>
    </div>
    <x-slot name="scripts">
        <script src="{{ asset('js/app.js') }}"></script>
    </x-slot>
</x-dashboard-layout>

