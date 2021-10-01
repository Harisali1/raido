<x-dashboard-layout-vendor>
    <x-slot name="title">
        Raido - Request Detail
    </x-slot>
    <x-slot name="styles">
        <link href="{{ asset('assets/pages/css/profile-2.min.css') }}" rel="stylesheet" type="text/css">
    </x-slot>
    <div id="app">
        <vendor-user-request-show
            :item="{{ $job->toJson() }}">
        </vendor-user-request-show>
    </div>
    <x-slot name="scripts">
        <script src="{{ asset('js/app.js') }}"></script>
    </x-slot>
</x-dashboard-layout-vendor>
