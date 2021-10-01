<div class="page-content-wrapper">
    <div class="page-content">
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                <i class="fa fa-circle"></i>
            </li>

            <li>
                <span class="active">VehicleType</span>
            </li>
        </ul>
        <div class="m-heading-1 border-green m-bordered">
            <div class="portlet-title">
                <div class="caption font-red-sunglo">
                    <i class="icon-magnifier font-red-sunglo"></i>
                    <span class="caption-subject bold uppercase">Search VehicleType</span>
                </div>
            </div>
            <div class="portlet-body form">
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-md-line-input has-success form-md-floating-label">
                                <div class="input-icon">
                                    <input type="text" class="form-control" wire:model="search" name="search" id="search">
                                    <label for="form_control_1">Search Here.....</label>
                                    <span class="help-block">Search By Title, And Description...</span>
                                    <i class="icon-magnifier"></i>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="icon-user font-dark"></i>
                            <span class="caption-subject bold uppercase">VehicleType Listing</span>
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
                                        <a href="{{ route('admin.vehicle_type.create') }}">
                                            <button id="sample_editable_1_new" class="btn sbold green"> Add New VehicleType
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if(count($vehicleTypes) > 0)
                            <table class="table table-striped table-bordered responsive table-hover table-checkable order-column"
                                   id="sample_1">
                                <thead>
                                <tr>
                                    <th> S.No</th>
                                    <th> Title</th>
                                    <th> Passenger Capacity</th>
{{--                                    <th> Base Fare</th>--}}
{{--                                    <th> Image</th>--}}
                                    <th> Status</th>
                                    <th> Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($vehicleTypes as $key => $vehicleType)
                                    <tr class="odd gradeX">
                                        <td>{{ $key +1 }}</td>
                                        <td> {{ $vehicleType->title }}</td>
                                        <td>{{ $vehicleType->passenger_capacity }} </td>

                                        <td>
                                            <input type="checkbox" class="make-switch" style="width: 100%; height: 100%; z-index: 999;"
                                                   {{ ($vehicleType->status) ? 'checked' : '' }} data-on="success"
                                                   data-on-color="success" data-off-color="warning" data-size="small"
                                                   onclick="updateVehicleTypeStatus({{ $vehicleType->id }})">
                                        </td>
{{--                                        <td>{{ $vehicleType->base_fare }}</td>--}}
{{--                                        <td>{{ $vehicleType->image }}</td>--}}
{{--                                        @if($vehicleType->status == 0)--}}
{{--                                            <td>--}}
{{--                                                <span class="label label-sm label-danger"> Suspended </span>--}}
{{--                                            </td>--}}
{{--                                        @else--}}
{{--                                            <td>--}}
{{--                                                <span class="label label-sm label-success"> Approved </span>--}}
{{--                                            </td>--}}
{{--                                        @endif--}}

                                        <td>
                                            <a href="{{ route('admin.vehicle_type.edit', $vehicleType->id) }}">
                                                <button id="sample_editable_1_new" class="btn sbold blue"> Edit
                                                    <i class="fa fa-pencil"></i>
                                                </button>
                                            </a>
                                            <button type="button" onclick="deleteVehicleType({{ $vehicleType->id }})"
                                                    class="btn sbold red"> Delete
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                            @if($vehicleTypes->total() > $vehicleTypes->perPage())
                                {{ $vehicleTypes->links() }}
                            @else
                                Showing {{ $vehicleTypes->firstItem() }} to {{ $vehicleTypes->lastItem() }} out of {{ $vehicleTypes->total() }}
                                results
                            @endif
                        @else
                            <div class="alert alert-danger">
                                <strong>No Record Found!</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>

    </div>
    <!-- END CONTENT BODY -->
</div>
