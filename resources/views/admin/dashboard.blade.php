<x-dashboard-layout>
    <x-slot name="title">
        Raido - Dashboard
    </x-slot>
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-head">
                <div class="page-title">
                    <h1>Dashboard
                        <small>Statistics, Cards, recent events and reports</small>
                    </h1>
                </div>
            </div>
            <div class="row">
                @if(auth()->user()->id != 1)
                    <div class="col-md-3">
                        <a href="{{ route('admin.vendor.index') }}">
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                <h4 class="widget-thumb-heading">Total Vendors</h4>
                                <div class="widget-thumb-wrap">
                                    <i class="widget-thumb-icon bg-green fa fa-car"></i>
                                    <div class="widget-thumb-body">
                                        <span class="widget-thumb-subtitle">Count</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="{{ $vendors }}">{{ $vendors }}</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @else
                    <div class="col-md-3">
                        <a href="{{ route('admin.vendor.index') }}">
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                <h4 class="widget-thumb-heading">Total Vendors</h4>
                                <div class="widget-thumb-wrap">
                                    <i class="widget-thumb-icon bg-green fa fa-car"></i>
                                    <div class="widget-thumb-body">
                                        <span class="widget-thumb-subtitle">Count</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="{{ $vendors }}">{{ $vendors }}</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                            <h4 class="widget-thumb-heading">Total Revenue</h4>
                            <div class="widget-thumb-wrap">
                                <i class="widget-thumb-icon bg-green fa fa-car"></i>
                                <div class="widget-thumb-body">
                                    <span class="widget-thumb-subtitle">Amount</span>
                                    <span class="widget-thumb-body-stat" data-counter="counterup" data-value="{{ $revenue }}">{{ $revenue }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('admin.user.request.index') }}">
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                <h4 class="widget-thumb-heading">Total Rides</h4>
                                <div class="widget-thumb-wrap">
                                    <i class="widget-thumb-icon bg-green fa fa-car"></i>
                                    <div class="widget-thumb-body">
                                        <span class="widget-thumb-subtitle">Count</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="{{ $rides }}">{{ $rides }}</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('admin.customer.index') }}">
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                <h4 class="widget-thumb-heading">Total Customers</h4>
                                <div class="widget-thumb-wrap">
                                    <i class="widget-thumb-icon bg-red fa fa-user"></i>
                                    <div class="widget-thumb-body">
                                        <span class="widget-thumb-subtitle">Count</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="{{ $customers }}">{{ $customers }}</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('admin.driver.index') }}">
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                <h4 class="widget-thumb-heading">Total Drivers</h4>
                                <div class="widget-thumb-wrap">
                                    <i class="widget-thumb-icon bg-purple fa fa-user"></i>
                                    <div class="widget-thumb-body">
                                        <span class="widget-thumb-subtitle">Count</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="{{ $drivers }}">{{ $drivers }}</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('admin.driver.index') }}">
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                <h4 class="widget-thumb-heading">Total Vehicles</h4>
                                <div class="widget-thumb-wrap">
                                    <i class="widget-thumb-icon bg-yellow fa fa-truck"></i>
                                    <div class="widget-thumb-body">
                                        <span class="widget-thumb-subtitle">Count</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="{{ $vehicles }}">{{ $vehicles }}</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <x-slot name="scripts">
        <script src="{{ asset('assets/global/scripts/app.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/layouts/layout4/scripts/layout.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/js.cookie.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/layouts/global/scripts/quick-sidebar.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/layouts/global/scripts/quick-nav.min.js') }}" type="text/javascript"></script>
    </x-slot>
</x-dashboard-layout>
