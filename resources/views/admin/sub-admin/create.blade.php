<x-dashboard-layout>
    <x-slot name="title">
        Raido - Vendor Create
    </x-slot>
    <x-slot name="styles">
        <style>
            .select2 {
                width: 100% !important;
                padding-top: 10px;
            }
        </style>
    </x-slot>
    <div id="app">
        <sub-admin-add :role="{{ $roles->toJson() }}"></sub-admin-add>
    </div>
    <x-slot name="scripts">
        <script src="{{ asset('js/app.js') }}"></script>
    </x-slot>
</x-dashboard-layout>

