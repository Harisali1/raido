<x-dashboard-layout>
    <x-slot name="title">
        Raido - Vendor Edit
    </x-slot>
    <div id="app">
        <sub-admin-edit
            :item="{{ $subAdmin->toJson() }}"
            :role="{{ $roles->toJson() }}">
        </sub-admin-edit>
    </div>
    <x-slot name="scripts">
        <script src="{{ asset('js/app.js') }}"></script>
    </x-slot>
</x-dashboard-layout>
