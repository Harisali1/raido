<x-dashboard-layout>
    <x-slot name="title">
        Raido - Customer Edit
    </x-slot>
    <div id="app">
        <customer-edit
            :item="{{ $customer->toJson() }}">
        </customer-edit>
    </div>
    <x-slot name="scripts">
        <script src="{{ asset('js/app.js') }}"></script>
    </x-slot>
</x-dashboard-layout>
