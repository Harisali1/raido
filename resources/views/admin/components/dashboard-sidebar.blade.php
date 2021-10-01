<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <li class="nav-item start {{ request()->routeIs('admin.dashboard') ? 'active open' : null }}">
                <a href="{{ route('admin.dashboard') }}" class="nav-link nav-toggle">
                    <i class="fa fa-tachometer"></i>
                    <span class="title">Dashboard</span>
                    <span class="selected"></span>
                </a>
            </li>

            @if(auth('admin')->user()->can('customer_management'))
                <li class="nav-item start {{ request()->routeIs('admin.customer.index','admin.customer.create') ? 'active open' : null }}">
                    <a href="{{ route('admin.customer.index') }}" class="nav-link ">
                        <i class="fa fa-user-plus"></i>
                        <span class="title">Customer</span>
                    </a>
                </li>
            @endif
            @if(auth('admin')->user()->can('driver_management'))
                <li class="nav-item start {{ request()->routeIs('admin.driver.index','admin.driver.creates') ? 'active open' : null }}">
                    <a href="{{ route('admin.driver.index') }}" class="nav-link ">
                        <i class="fa fa-car"></i>
                        <span class="title">Driver With Vehicle</span>
                    </a>
                </li>
            @endif

            @if(auth('admin')->user()->can('vendor_management'))
                <li class="nav-item start {{ request()->routeIs('admin.vendor.index','admin.vendor.create') ? 'active open' : null }}">
                    <a href="{{ route('admin.vendor.index') }}" class="nav-link ">
                        <i class="fa fa-server"></i>
                        <span class="title">Vendor</span>
                    </a>
                </li>
            @endif
            @if(auth('admin')->user()->can('admin_management'))
                <li class="nav-item start {{ request()->routeIs('admin.sub_admin.index','admin.sub_admin.creates') ? 'active open' : null }}">
                    <a href="{{ route('admin.sub_admin.index') }}" class="nav-link ">
                        <i class="fa fa-user"></i>
                        <span class="title">Sub Admin</span>
                    </a>
                </li>
            @endif
            @if(auth('admin')->user()->can('role_management'))
                <li class="nav-item {{ request()->routeIs('admin.role.index','admin.role.create') ? 'active open' : null }}">
                    <a href="{{ route('admin.role.index') }}" class="nav-link nav-toggle">
                        <i class="fa fa-shield"></i>
                        <span class="title">Role And Permissions</span>
                    </a>
                </li>
            @endif
{{--            @if(auth('admin')->user()->can('vehicle_category_management'))--}}
{{--                <li class="nav-item {{ request()->routeIs('admin.vehicle_category.index','admin.vehicle_category.create') ? 'active open' : null }}">--}}
{{--                    <a href="{{ route('admin.vehicle_category.index') }}" class="nav-link nav-toggle">--}}
{{--                        <i class="fa fa-truck"></i>--}}
{{--                        <span class="title">Vehicle Category</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            @endif--}}
            @if(auth('admin')->user()->can('vehicle_type_management'))
                <li class="nav-item {{ request()->routeIs('admin.vehicle_type.index','admin.vehicle_type.create') ? 'active open' : null }}">
                    <a href="{{ route('admin.vehicle_type.index') }}" class="nav-link nav-toggle">
                        <i class="fa fa-indent"></i>
                        <span class="title">Vehicle Type</span>
                    </a>
                </li>
            @endif
{{--            @if(auth('admin')->user()->can('vehicle_type_management'))--}}
{{--                <li class="nav-item {{ request()->routeIs('admin.vehicle.index','admin.vehicle.create') ? 'active open' : null }}">--}}
{{--                    <a href="{{ route('admin.vehicle.index') }}" class="nav-link nav-toggle">--}}
{{--                        <i class="fa fa-car"></i>--}}
{{--                        <span class="title">Vehicle</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            @endif--}}
            @if(auth('admin')->user()->can('user_request_management'))
                <li class="nav-item start {{ request()->routeIs('admin.user.request.*') ? 'active open' : null }}">
                    <a href="{{ route('admin.user.request.index') }}" class="nav-link nav-toggle heading">
                        <i class="fa fa-arrow-circle-down"></i>
                        <span class="title">User Request</span>
                    </a>
                </li>
            @endif
{{--            <ul class="sub-menu">--}}
{{--                <li class="nav-item {{ request()->routeIs('admin.user.request.index') ? 'active open' : null }}">--}}
{{--                    <a href="{{ route('admin.user.request.index') }}" class="nav-link nav-toggle">--}}
{{--                        <i class="fa fa-arrow-circle-down"></i>--}}
{{--                        <span class="title">All Request</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item {{ request()->routeIs('admin.user.request.complete') ? 'active open' : null }}">--}}
{{--                    <a href="{{ route('admin.user.request.complete') }}" class="nav-link nav-toggle">--}}
{{--                        <i class="fa fa-arrow-circle-down"></i>--}}
{{--                        <span class="title">Complete Request</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item {{ request()->routeIs('admin.user.request.canceled') ? 'active open' : null }}">--}}
{{--                    <a href="{{ route('admin.user.request.canceled') }}" class="nav-link nav-toggle">--}}
{{--                        <i class="fa fa-arrow-circle-down"></i>--}}
{{--                        <span class="title">Canceled Request</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item {{ request()->routeIs('admin.user.request.pending') ? 'active open' : null }}">--}}
{{--                    <a href="{{ route('admin.user.request.pending') }}" class="nav-link nav-toggle">--}}
{{--                        <i class="fa fa-arrow-circle-down"></i>--}}
{{--                        <span class="title">Pending Request</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            </ul>--}}
            {{--                <li class="nav-item {{ request()->routeIs('admin.user.request.index') ? 'active open' : null }}">--}}
            {{--                    <a href="{{ route('admin.user.request.index') }}" classs="nav-link nav-toggle">--}}
            {{--                        <i class="fa fa-arrow-circle-down"></i>--}}
            {{--                        <span class="title">User request</span>--}}
            {{--                    </a>--}}
            {{--                </li>--}}

            @if(auth('admin')->user()->can('setting_management'))
                <li class="nav-item {{ request()->routeIs('admin.setting.create') ? 'active open' : null }}">
                    <a href="{{ route('admin.setting.create') }}" class="nav-link nav-toggle">
                        <i class="fa fa-cogs"></i>
                        <span class="title">Setting</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</div>
