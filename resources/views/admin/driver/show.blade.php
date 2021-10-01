<x-dashboard-layout>
    <x-slot name="title">
        Raido - Driver Detail
    </x-slot>
    <div id="app">
        <driver-show
            :item="{{ $driver->toJson() }}">
        </driver-show>
    </div>
    <x-slot name="scripts">
        <script src="{{ asset('js/app.js') }}"></script>
    </x-slot>
</x-dashboard-layout>
