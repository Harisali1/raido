<div class="page-content-wrapper">
    <div class="page-content">
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <a href="{{ route('vendor.dashboard') }}">Dashboard</a>
                <i class="fa fa-circle"></i>
            </li>

            <li>
                <span class="active">Driver</span>
            </li>
        </ul>
        <div class="m-heading-1 border-green m-bordered">
            <div class="portlet-title">
                <div class="caption font-red-sunglo">
                    <i class="icon-magnifier font-red-sunglo"></i>
                    <span class="caption-subject bold uppercase">Search Driver</span>
                </div>
            </div>
            <div class="portlet-body form">
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-md-line-input has-success form-md-floating-label">
                                <div class="input-icon">
                                    <input type="text" class="form-control" wire:model="search" name="search" id="search">
                                    <label for="form_control_1">Search Here...</label>
                                    <span class="help-block"></span>
                                    <i class="icon-magnifier"></i>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 20px">
            <div class="col-md-12">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="icon-user font-dark"></i>
                            <span class="caption-subject bold uppercase">Driver Listing</span>
                        </div>
                        {{--                        <div class="actions">--}}
                        {{--                            <div class="btn-group btn-group-devided" data-toggle="buttons">--}}
                        {{--                                <label class="btn btn-transparent dark btn-outline btn-circle btn-sm active">--}}
                        {{--                                    <input type="radio" name="options" class="toggle" id="option1">Actions</label>--}}
                        {{--                                <label class="btn btn-transparent dark btn-outline btn-circle btn-sm">--}}
                        {{--                                    <input type="radio" name="options" class="toggle" id="option2">Settings</label>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                    </div>
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <a href="{{ route('vendor.driver.create') }}">
                                            <button id="sample_editable_1_new" class="btn sbold green"> Add New Driver
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                        @if(count($drivers) > 0)
                            <table class="table table-striped table-bordered dataTables_scroll">
                                <thead>
                                <tr>
                                    <th> S.No</th>
                                    <th> Name</th>
                                    <th> Email</th>
                                    <th> Mobile</th>
                                    <th> Status</th>
                                    <th> Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($drivers as $key => $driver)
                                    <tr class="odd gradeX">
                                        <td>{{ $key +1 }}</td>
                                        <td> <a href="{{route('vendor.driver.show', $driver->id)}}">{{ $driver->name }}</a></td>
                                        <td>{{ $driver->email }} </td>
                                        <td>{{ $driver->mobile }}</td>
                                        <td>
                                            <input type="checkbox" class="make-switch" style="width: 100%; height: 100%; z-index: 999;"
                                                   {{ ($driver->status) ? 'checked' : '' }} data-on="success"
                                                   data-on-color="success" data-off-color="warning" data-size="small"
                                                   onclick="updateVendorDriverStatus({{ $driver->id }})">
                                        </td>
                                        <td>
                                            <a href="{{ route('vendor.driver.vehicle.images.index', $driver->vehicle_id) }}">
                                                <button id="sample_editable_1_new" class="btn sbold blue"> Vehicle Images
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                            </a>
                                            <a href="{{ route('vendor.driver.show', $driver->id) }}">
                                                <button id="sample_editable_1_new" class="btn sbold blue"> Show
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                            </a>
                                            <a href="{{ route('vendor.driver.edit', $driver->id) }}">
                                                <button id="sample_editable_1_new" class="btn sbold blue"> Edit
                                                    <i class="fa fa-pencil"></i>
                                                </button>
                                            </a>
                                            <button type="button" onclick="deleteVendorDriver({{ $driver->id }})"
                                                    class="btn sbold red"> Delete
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        @else
                            <div class="alert alert-danger">
                                <strong>No Record Found!</strong>
                            </div>
                        @endif
                        </div>
                        @if($drivers->total() > $drivers->perPage())
                            {{ $drivers->links() }}
                        @else
                            Showing {{ $drivers->firstItem() }} to {{ $drivers->lastItem() }} out of {{ $drivers->total() }}
                            results
                        @endif
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>

    </div>
    <!-- END CONTENT BODY -->
</div>
