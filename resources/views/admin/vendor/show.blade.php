<x-dashboard-layout>
    <x-slot name="title">
        Raido - Vendor Show
    </x-slot>
    <div id="app">
        <vendor-show
            :item="{{ $vendor->toJson() }}"
            :user-requests="{{ $userRequests }}">
        </vendor-show>
    </div>
    <x-slot name="scripts">
        <script src="{{ asset('js/app.js') }}"></script>
    </x-slot>
</x-dashboard-layout>
