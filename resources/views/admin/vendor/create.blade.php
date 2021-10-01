<x-dashboard-layout>
    <x-slot name="title">
        Raido - Vendor Create
    </x-slot>
    <x-slot name="styles">
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDnS8fPrV8CjELDvPAqy8jrRv_t0cKDnVA&libraries=places,drawing"></script>
    </x-slot>
    <div id="app">
        <vendor-add :vendors="{{ $vendors->toJson() }}"></vendor-add>
    </div>
    <x-slot name="scripts">
        <script src="{{ asset('js/app.js') }}"></script>
    </x-slot>
</x-dashboard-layout>

