<div class="page-content-wrapper">
    <div class="page-content">
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span class="active">User Request</span>
            </li>
        </ul>
        <div class="m-heading-1 border-green m-bordered">
            <div class="portlet-title">
                <div class="caption font-red-sunglo">
                    <i class="icon-magnifier font-red-sunglo"></i>
                    <span class="caption-subject bold uppercase">Search Request</span>
                </div>
            </div>
            <div class="portlet-body form">
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-md-line-input has-success form-md-floating-label">
                                <div class="input-icon">
                                    <input type="text" class="form-control" wire:model="search" name="search" id="search">
                                    <label for="form_control_1">Search By Every Thing...</label>
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
                            <span class="caption-subject bold uppercase">User request Listing</span>
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
                        {{--                                        <a href="{{ route('admin.driver.create') }}">--}}
                        {{--                                            <button id="sample_editable_1_new" class="btn sbold green"> Add New Driver--}}
                        {{--                                                <i class="fa fa-plus"></i>--}}
                        {{--                                            </button>--}}
                        {{--                                        </a>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        @if(count($pendingRequests) > 0)
                            <table class="table table-striped table-bordered responsive table-hover table-checkable order-column"
                                   id="sample_1">
                                <thead>
                                <tr>
                                    <th> S.No</th>
                                    <th> Booking Id</th>
                                    <th> Booking Date</th>
                                    <th> User Name</th>
                                    <th> Driver Name</th>
                                    <th> Start Address</th>
                                    <th> End Address</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($pendingRequests as $key => $userRequest)
                                    <tr class="odd gradeX">
                                        <td> {{ $key +1 }}</td>
                                        <td> {{ $userRequest->booking_id }}</td>
                                        <td> {{ $userRequest->created_at }}</td>
                                        <td> {{ optional($userRequest->user)->name ?? 'N/A' }} </a></td>
                                        <td> {{ optional($userRequest->driver)->name ?? 'N/A' }}</td>
                                        <td> {{ $userRequest->start_address }}</td>
                                        <td> {{ $userRequest->end_address }}</td>
                                        <td>{{ $userRequest->status }}</td>
                                        <td>
                                            <a href="{{ route('admin.user.request.show', $userRequest->id) }}">
                                                <button id="sample_editable_1_new" class="btn sbold blue"> Show
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                            </a>
                                            <button type="button" onclick="deleteUserRequest({{ $userRequest->id }})"
                                                    class="btn sbold red"> Delete
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                            @if($pendingRequests->total() > $pendingRequests->perPage())
                                {{ $pendingRequests->links() }}
                            @else
                                Showing {{ $pendingRequests->firstItem() }} to {{ $pendingRequests->lastItem() }} out of {{ $pendingRequests->total() }}
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
