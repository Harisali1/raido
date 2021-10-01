<x-dashboard-layout>
    <x-slot name="title">
        Raido - Customer Edit
    </x-slot>
    <div id="app">
        <customer-show
            :item="{{ $customer->toJson() }}">
        </customer-show>
    </div>
    <x-slot name="scripts">
        <script src="{{ asset('js/app.js') }}"></script>
    </x-slot>
</x-dashboard-layout>
