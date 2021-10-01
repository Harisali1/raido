<x-dashboard-layout>
    <x-slot name="title">
        Raido -Setting
    </x-slot>
    <div id="app">
        <setting-add :setting="{{$setting->toJson()}}"></setting-add>
    </div>
    <x-slot name="scripts">
        <script src="{{ asset('js/app.js') }}"></script>
    </x-slot>
</x-dashboard-layout>

