<x-dashboard-layout>
    <x-slot name="title">
        Raido - Driver Create
    </x-slot>
    <div id="app">
        <driver-add
            :vehicle-types="{{ $vehicleTypes->toJson() }}"
            :areas="{{ $areas->toJson() }}"
            :vendors="{{ $vendors->toJson() }}">
        </driver-add>
    </div>
    <x-slot name="scripts">
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBlHwdutdI1Hz9mxT5rW2RYhW1xZsJJFz8&libraries=places"></script>
        <script src="{{ asset('js/app.js') }}"></script>
    </x-slot>
</x-dashboard-layout>

