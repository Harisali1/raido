<x-dashboard-layout>
    <x-slot name="title">
        Raido - Customer Create
    </x-slot>
    <div id="app">
        <customer-add></customer-add>
    </div>
    <x-slot name="scripts">
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </x-slot>
</x-dashboard-layout>

