<x-dashboard-layout>
    <x-slot name="title">
        Raido - Role & Permissions
    </x-slot>
    <div id="app">
        <role-add :permissions="{{$permissions->toJson()}}"></role-add>
    </div>
    <x-slot name="scripts">
        <script src="{{ asset('js/app.js') }}"></script>
    </x-slot>
</x-dashboard-layout>
