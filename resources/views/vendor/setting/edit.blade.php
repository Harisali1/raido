<x-dashboard-layout-vendor>
    <x-slot name="title">
        Raido -Setting
    </x-slot>
    <div id="app">
        <vendor-setting-edit
            :item="{{ $baseFareCal->toJson() }}">
        </vendor-setting-edit>
    </div>
    <x-slot name="scripts">
        <script src="{{ asset('js/app.js') }}"></script>
    </x-slot>
</x-dashboard-layout-vendor>

