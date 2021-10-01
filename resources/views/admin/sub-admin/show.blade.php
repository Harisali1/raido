<x-dashboard-layout>
    <x-slot name="title">
        Raido - Vendor Show
    </x-slot>
    <div id="app">
        <sub-admin-show
            :item="{{ $subAdmin->toJson() }}">
        </sub-admin-show>
    </div>
    <x-slot name="scripts">
        <script src="{{ asset('js/app.js') }}"></script>
    </x-slot>
</x-dashboard-layout>
