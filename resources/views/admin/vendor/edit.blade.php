<x-dashboard-layout>
    <x-slot name="title">
        Raido - Vendor Edit
    </x-slot>
    <div id="app">
        <vendor-edit
            :item="{{ $vendor->toJson() }}">
        </vendor-edit>
    </div>
    <x-slot name="scripts">
        <script src="{{ asset('js/app.js') }}"></script>
    </x-slot>
</x-dashboard-layout>
