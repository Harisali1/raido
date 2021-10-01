<div class="page-content-wrapper">
    <div class="page-content">
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <a href="{{ route('vendor.dashboard') }}">Dashboard</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span class="active">User Request</span>
            </li>
        </ul>
        {{--        <div class="m-heading-1 border-green m-bordered">--}}
        {{--            <div class="portlet-title">--}}
        {{--                <div class="caption font-red-sunglo">--}}
        {{--                    <i class="icon-magnifier font-red-sunglo"></i>--}}
        {{--                    <span class="caption-subject bold uppercase">Search Request</span>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--            <div class="portlet-body form">--}}
        {{--                <div class="form-body">--}}
        {{--                    <div class="row">--}}
        {{--                        <div class="col-md-12">--}}
        {{--                            <div class="form-group form-md-line-input has-success form-md-floating-label">--}}
        {{--                                <div class="input-icon">--}}
        {{--                                    <input type="text" class="form-control" wire:model="search" name="search" id="search">--}}
        {{--                                    <label for="form_control_1">Search By Every Thing...</label>--}}
        {{--                                    <span class="help-block"></span>--}}
        {{--                                    <i class="icon-magnifier"></i>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}

        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}

        <div class="row">
            <div class="col-lg-12 col-xs-12 col-sm-12">
                <div class="portlet light bordered">
                    <div class="portlet-title tabbable-line">
                        <div class="caption col-md-6">
                            <i class=" icon-social-twitter font-dark hide"></i>
                            <span class="caption-subject font-dark bold uppercase">User Request List</span>
                        </div>
                        <ul class="col-md-4 col-md-offset-2">
                            <div class="col-md-12">
                                <select wire:model="search" class="form-control">
                                    <option value="">All</option>
                                    <option value="SEARCHING">PENDING</option>
                                    <option value="ACCEPTED">APPROVED</option>
                                    <option value="COMPLETED">COMPLETED</option>
                                    <option value="CANCELED">CANCELED</option>
                                    <option value="REJECTED">REJECTED</option>
                                </select>
                            </div>
                        </ul>
                    </div>
                    <div class="portlet-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_actions_all">
                                @if(count($userRequests) > 0)
                                    <div class="table-responsive">
                                        <table id="example" class="table table-striped table-bordered dataTables_scroll" style="width:100%">
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
                                            @foreach($userRequests as $key => $userRequest)
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
                                                        @if($userRequest->status === 'SEARCHING')
                                                            <button type="button" onclick="approvedUserRequest({{ $userRequest->id }})"
                                                                    class="btn sbold green"> Approve
                                                            </button>
                                                            <button type="button" onclick="rejectUserRequest({{ $userRequest->id }})"
                                                                    class="btn sbold red"> Reject
                                                            </button>
                                                        @endif
                                                        <a href="{{ route('vendor.user.request.show', $userRequest->id) }}">
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
                                    </div>
                                @else
                                    <div class="alert alert-danger">
                                        <strong>No Record Found!</strong>
                                    </div>
                                @endif
                                @if($userRequests->total() > $userRequests->perPage())
                                    {{ $userRequests->links() }}
                                @else
                                    Showing {{ $userRequests->firstItem() }} to {{ $userRequests->lastItem() }} out of {{ $userRequests->total() }}
                                    results
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT BODY -->
</div>
