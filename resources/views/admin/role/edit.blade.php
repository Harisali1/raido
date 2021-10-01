<x-dashboard-layout>
    <x-slot name="title">
        Raido - Role & Permissions
    </x-slot>
    <div id="app">
        <role-edit
            :permissions="{{ $permissions->toJson() }}"
            :role="{{ $role->toJson() }}">
        </role-edit>
    </div>
    <x-slot name="scripts">
        <script src="{{ asset('js/app.js') }}"></script>
    </x-slot>
</x-dashboard-layout>
