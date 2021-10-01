<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu   " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <li class="nav-item start {{ request()->routeIs('vendor.dashboard') ? 'active open' : null }}">
                <a href="{{ route('vendor.dashboard') }}" class="nav-link nav-toggle">
                    <i class="fa fa-tachometer"></i>
                    <span class="title">Dashboard</span>
                    <span class="selected"></span>
                </a>
            </li>
            <li class="nav-item start {{ request()->routeIs('vendor.driver.*') ? 'active open' : null }}">
                <a href="{{ route('vendor.driver.index') }}" class="nav-link ">
                    <i class="fa fa-car"></i>
                    <span class="title">Driver With Vehicle</span>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('vendor.user.request.*') ? 'active open' : null }}">
                <a href="{{ route('vendor.user.request.index') }}" class="nav-link nav-toggle">
                    <i class="fa fa-car"></i>
                    <span class="title">User Request</span>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('vendor.base.fare.calculation.*') ? 'active open' : null }}">
                <a href="{{ route('vendor.base.fare.calculation.index') }}" class="nav-link nav-toggle">
                    <i class="fa fa-cog"></i>
                    <span class="title">Fare Calculation</span>
                </a>
            </li>

        </ul>
    </div>
</div>
