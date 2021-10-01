<div class="page-content-wrapper">
    <div class="page-content">
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                <i class="fa fa-circle"></i>
            </li>

            <li>
                <span class="active">Customer</span>
            </li>
        </ul>
        <div class="m-heading-1 border-green m-bordered">
            <div class="portlet-title">
                <div class="caption font-red-sunglo">
                    <i class="icon-magnifier font-red-sunglo"></i>
                    <span class="caption-subject bold uppercase">Search Customer Here</span>
                </div>
            </div>
            <div class="portlet-body form">
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-md-line-input has-success form-md-floating-label">
                                <div class="input-icon">
                                    <input type="text" class="form-control" wire:model="search" name="search"
                                           id="search">
                                    <label for="form_control_1">Search By Name, Email, Mobile And Cnic...</label>
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
                            <span class="caption-subject bold uppercase">Customer Listing</span>
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
                                        <a href="{{ route('admin.customer.create') }}">
                                            <button id="sample_editable_1_new" class="btn sbold green"> Add New Customer
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if(count($customers) > 0)
                            <table
                                class="table table-striped table-bordered responsive table-hover table-checkable order-column"
                                id="sample_1">
                                <thead>
                                <tr>
                                    <th> S.No</th>
                                    <th> Name</th>
                                    <th> Email</th>
                                    <th> Mobile</th>
                                    <th> Cnic</th>
                                    <th> Status</th>
                                    <th> Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($customers as $key => $customer)
                                    <tr class="odd gradeX">
                                        <td>{{ $key +1 }}</td>
                                        <td><a href="{{ route('admin.customer.show', $customer->id) }}">{{ $customer->name }}</a></td>
                                        <td>{{ $customer->email }}</td>
                                        <td>{{ $customer->mobile }}</td>
                                        <td>{{ $customer->cnic }}</td>
                                        <td>
                                            <input type="checkbox" class="make-switch" style="width: 100%; height: 100%; z-index: 999;"
                                                   {{ ($customer->status) ? 'checked' : '' }} data-on="success"
                                                   data-on-color="success" data-off-color="warning" data-size="small"
                                                   onclick="updateCustomerStatus({{ $customer->id }})">

                                        </td>
                                        <td>
                                            <a href="{{ route('admin.customer.show', $customer->id) }}">
                                                <button id="sample_editable_1_new" class="btn sbold blue"> Show
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                            </a>
                                            <a href="{{ route('admin.customer.edit', $customer->id) }}">
                                                <button id="sample_editable_1_new" class="btn sbold blue"> Edit
                                                    <i class="fa fa-pencil"></i>
                                                </button>
                                            </a>
                                            <button type="button" onclick="deleteCustomer({{ $customer->id }})"
                                                    class="btn sbold red"> Delete
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                            @if($customers->total() > $customers->perPage())
                                {{ $customers->links() }}
                            @else
                                Showing {{ $customers->firstItem() }} to {{ $customers->lastItem() }} out
                                of {{ $customers->total() }}
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
