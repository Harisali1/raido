<div class="page-content-wrapper">
    <div class="page-content">
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <a href="{{ route('vendor.dashboard') }}">Dashboard</a>
                <i class="fa fa-circle"></i>
            </li>

            <li>
                <span class="active">Vendor Base Fare Calculation</span>
            </li>
        </ul>
        <div class="m-heading-1 border-green m-bordered">
            <div class="portlet-title">
                <div class="caption font-red-sunglo">
                    <i class="icon-magnifier font-red-sunglo"></i>
                    <span class="caption-subject bold uppercase">Search Here</span>
                </div>
            </div>
            <div class="portlet-body form">
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-md-line-input has-success form-md-floating-label">
                                <div class="input-icon">
                                    <input type="text" class="form-control" wire:model="search" name="search" id="search">
                                    <label for="form_control_1">Search By Here...</label>
                                    <span class="help-block"></span>
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
                            <span class="caption-subject bold uppercase">Vehicle Type Listing</span>
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
                        {{--                        <div class="table-toolbar">--}}
                        {{--                            <div class="row">--}}
                        {{--                                <div class="col-md-6">--}}
                        {{--                                    <div class="btn-group">--}}
                        {{--                                        <a href="{{ route('vendor.setting.create') }}">--}}
                        {{--                                            <button id="sample_editable_1_new" class="btn sbold green"> Add New Base Fare--}}
                        {{--                                                <i class="fa fa-plus"></i>--}}
                        {{--                                            </button>--}}
                        {{--                                        </a>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        @if(count($baseFares) > 0)
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered responsive table-hover table-checkable order-column"
                                       id="sample_1">
                                    <thead>
                                    <tr>
                                        <th> S.No</th>
                                        <th> Vehicle Type</th>
                                        <th> Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($baseFares as $key => $baseFare)
                                        <tr class="odd gradeX">
                                            <td>{{ $key +1 }}</td>

                                            <td>
                                                @php
                                                    $vendorId = $baseFare->vendorBaseFare->where('vendor_id', auth('vendor')->user()->id)->pluck('vendor_id')->implode(', ');
                                                @endphp
                                                @if($vendorId == auth('vendor')->user()->id)
                                                    {{ $baseFare->title }} (Base Fare Added)
                                                @else
                                                    <a href="{{ route('vendor.base.fare.calculation.create', $baseFare->id) }}">{{ $baseFare->title }}</a>
                                                @endif
                                            </td>
                                            <td>
                                                @php
                                                    $vendorBaseFareId = $baseFare->vendorBaseFare->where('vendor_id', auth('vendor')->user()->id)->pluck('id')->implode(', ');;
                                                @endphp
                                                @if($vendorId == auth('vendor')->user()->id)
                                                    <a href="{{ route('vendor.base.fare.calculation.edit', $vendorBaseFareId) }}">
                                                        <button id="sample_editable_1_new" class="btn sbold blue"> Edit
                                                            <i class="fa fa-pencil"></i>
                                                        </button>
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                            @if($baseFares->total() > $baseFares->perPage())
                                {{ $baseFares->links() }}
                            @else
                                Showing {{ $baseFares->firstItem() }} to {{ $baseFares->lastItem() }} out of {{ $baseFares->total() }}
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
