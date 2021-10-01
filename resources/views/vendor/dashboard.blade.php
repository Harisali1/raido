<x-dashboard-layout-vendor>
    <x-slot name="title">
        Raido - Vendor Dashboard
    </x-slot>
    <x-slot name="styles">
        {{--        <script src="https://gstatic.com/firebasejs/8.2.10/firebase.js"></script>--}}
        {{--        <script src="https://gstatic.com/firebasejs/8.2.10/firebase-app.js"></script>--}}

        {{--        <script src="https://gstatic.com/firebasejs/8.2.10/firebase-auth.js"></script>--}}
        {{--        <script src="https://gstatic.com/firebasejs/8.2.10/firebase-database.js"></script>--}}
        {{--        <script src="https://gstatic.com/firebasejs/8.2.10/firebase-firestore.js"></script>--}}
        {{--        <script src="https://gstatic.com/firebasejs/8.2.10/firebase-messaging.js"></script>--}}
        {{--        <script src="https://gstatic.com/firebasejs/8.2.10/firebase-functions.js"></script>--}}
        {{--        <script src="https://gstatic.com/firebasejs/8.2.10/firebase-storage.js"></script>--}}
        {{--        <script src="https://gstatic.com/firebasejs/7.8.0/firebase-analytics.js"></script>--}}
        @livewireStyles
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
                <div class="col-md-3">
                    <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                        <h4 class="widget-thumb-heading">Total Revenue</h4>
                        <div class="widget-thumb-wrap">
                            <i class="widget-thumb-icon bg-green fa fa-car"></i>
                            <div class="widget-thumb-body">
                                <span class="widget-thumb-subtitle">Amount</span>
                                @php
                                    $revenue = 0;
                                @endphp
                                @foreach($drivers as $driver)
                                    @php
                                        $revenue += $driver->revenue
                                    @endphp
                                @endforeach
                                <span class="widget-thumb-body-stat" data-counter="counterup" data-value="{{ $revenue }}">{{ $revenue }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                        <h4 class="widget-thumb-heading">Total Credit</h4>
                        <div class="widget-thumb-wrap">
                            <i class="widget-thumb-icon bg-red fa fa-car"></i>
                            <div class="widget-thumb-body">
                                <span class="widget-thumb-subtitle">Amount</span>
                                <span class="widget-thumb-body-stat" data-counter="counterup" data-value="{{ $credit }}">{{ $credit }}</span>
                            </div>
                        </div>
                    </div>
                </div>

{{--                <div class="col-md-3">--}}
{{--                    <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">--}}
{{--                        <h4 class="widget-thumb-heading">Balance</h4>--}}
{{--                        <div class="widget-thumb-wrap">--}}
{{--                            <i class="widget-thumb-icon bg-blue fa fa-car"></i>--}}
{{--                            <div class="widget-thumb-body">--}}
{{--                                <span class="widget-thumb-subtitle">Amount</span>--}}
{{--                                @php--}}
{{--                                    $revenue = 0;--}}
{{--                                @endphp--}}
{{--                                @foreach($drivers as $driver)--}}
{{--                                    @php--}}
{{--                                        $revenue += $driver->revenue--}}
{{--                                    @endphp--}}
{{--                                @endforeach--}}
{{--                                <span class="widget-thumb-body-stat" data-counter="counterup" data-value="0">0</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

                <div class="col-md-3">
                    <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                        <h4 class="widget-thumb-heading">Total Drivers</h4>
                        <div class="widget-thumb-wrap">
                            <i class="widget-thumb-icon bg-purple fa fa-user"></i>
                            <div class="widget-thumb-body">
                                <span class="widget-thumb-subtitle">Count</span>
                                <span class="widget-thumb-body-stat" data-counter="counterup" data-value="{{ $drivers->count() }}">{{ $drivers->count() }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
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
                </div>
                <div class="col-md-3">
                    <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                        <h4 class="widget-thumb-heading">Total Request</h4>
                        <div class="widget-thumb-wrap">
                            <i class="widget-thumb-icon bg-yellow fa fa-truck"></i>
                            <div class="widget-thumb-body">
                                <span class="widget-thumb-subtitle">Count</span>
                                @php
                                    $request = 0;
                                @endphp
                                @foreach($drivers as $driver)
                                    @php
                                        $request += $driver->userRequest->count()
                                    @endphp
                                @endforeach
                                <span class="widget-thumb-body-stat" data-counter="counterup" data-value="{{ $request }}">{{  $request  }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-xs-12 col-sm-12">
                    <div class="portlet light bordered">
                        <div class="portlet-title tabbable-line">
                            <div class="caption">
                                <i class=" icon-social-twitter font-dark hide"></i>
                                <span class="caption-subject font-dark bold uppercase">Today Rides</span>
                            </div>
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#tab_actions_pending" data-toggle="tab" aria-expanded="true"> Pending </a>
                                </li>
                                <li class="">
                                    <a href="#tab_actions_approved" data-toggle="tab" aria-expanded="false"> Approved </a>
                                </li>
                                <li class="">
                                    <a href="#tab_actions_rejected" data-toggle="tab" aria-expanded="false"> Rejected </a>
                                </li>

                            </ul>
                        </div>
                        <div class="portlet-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_actions_pending">
                                    <div class="mt-actions table-responsive">
                                        @if(count($todayPendingRides) > 0)
                                            <table class="table table-striped table-bordered dataTables_scroll">
                                                <thead>
                                                <tr>
                                                    <th> S.No</th>
                                                    <th> Image</th>
                                                    <th> Customer Name</th>
                                                    <th> Created Date</th>
                                                    <th> Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($todayPendingRides as $todayPendingRide)
                                                    <tr class="odd gradeX">
                                                        <td>{{ $todayPendingRide->id }}</td>
                                                        <td><img src="{{ $todayPendingRide->user->getImagePath('image') }}" height="34"></td>
                                                        <td>
                                                            <div class="mt-action-details ">
                                                                <span class="mt-action-author">{{ optional($todayPendingRide->user)->name ?? 'N/A'}}</span>
                                                                <p class="mt-action-desc">{{ optional($todayPendingRide->user)->address ?? 'N/A'}}</p>
                                                            </div>
                                                        </td>
                                                        <td>{{ $todayPendingRide->created_at}}</td>

                                                        <td>
{{--                                                            <div class="mt-action-buttons">--}}
{{--                                                                <div class="btn-group btn-group-circle">--}}
                                                                    <button type="button" class="btn btn-outline green btn-sm" onclick="approvedRequest({{ $todayPendingRide->id }})">Approve</button>
                                                                    <button type="button" class="btn btn-outline red btn-sm" onclick="rejectRequest({{ $todayPendingRide->id }})">Reject</button>
{{--                                                                </div>--}}
{{--                                                            </div>--}}
                                                        </td>
                                                    </tr>
                                                @endforeach

                                                </tbody>
                                            </table>
                                        @else
                                            <div class="alert alert-danger">
                                                <strong>No Ride For Today!</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab_actions_approved">
                                    <div class="mt-actions table-responsive">
                                        @if(count($todayApprovedRides) > 0)
                                            <table class="table table-striped table-bordered dataTables_scroll">
                                                <thead>
                                                <tr>
                                                    <th> S.No</th>
                                                    <th> Image</th>
                                                    <th> Customer Name</th>
                                                    <th> Created Date</th>
{{--                                                    <th> Action</th>--}}
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($todayApprovedRides as $todayApprovedRide)
                                                    <tr class="odd gradeX">
                                                        <td>{{ $todayApprovedRide->id }}</td>
                                                        <td><img src="{{ $todayApprovedRide->user->getImagePath('image') }}" height="34"></td>
                                                        <td>
                                                            <div class="mt-action-details ">
                                                                <span class="mt-action-author">{{ optional($todayApprovedRide->user)->name ?? 'N/A'}}</span>
                                                                <p class="mt-action-desc">{{ optional($todayApprovedRide->user)->address ?? 'N/A'}}</p>
                                                            </div>
                                                        </td>
                                                        <td>{{ $todayApprovedRide->created_at}}</td>

{{--                                                        <td>--}}
                                                            {{--                                                            <div class="mt-action-buttons">--}}
                                                            {{--                                                                <div class="btn-group btn-group-circle">--}}
{{--                                                            <button type="button" class="btn btn-outline green btn-sm" onclick="approvedRequest({{ $todayApprovedRide->id }})">Approve</button>--}}
{{--                                                            <button type="button" class="btn btn-outline red btn-sm" onclick="rejectRequest({{ $todayApprovedRide->id }})">Reject</button>--}}
                                                            {{--                                                                </div>--}}
                                                            {{--                                                            </div>--}}
{{--                                                        </td>--}}
                                                    </tr>
                                                @endforeach

                                                </tbody>
                                            </table>
                                        @else
                                            <div class="alert alert-danger">
                                                <strong>No Approved Ride For Today!</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab_actions_rejected">
                                    <div class="mt-actions table-responsive">
                                        @if(count($todayRejectedRides) > 0)
                                            <table class="table table-striped table-bordered dataTables_scroll">
                                                <thead>
                                                <tr>
                                                    <th> S.No</th>
                                                    <th> Image</th>
                                                    <th> Customer Name</th>
                                                    <th> Created Date</th>
                                                    <th> Reason</th>
                                                    {{--                                                    <th> Action</th>--}}
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($todayRejectedRides as $todayRejectedRide)
                                                    <tr class="odd gradeX">
                                                        <td>{{ $todayRejectedRide->id }}</td>
                                                        <td><img src="{{ $todayRejectedRide->user->getImagePath('image') }}" height="34"></td>
                                                        <td>
                                                            <div class="mt-action-details ">
                                                                <span class="mt-action-author">{{ optional($todayRejectedRide->user)->name ?? 'N/A'}}</span>
                                                                <p class="mt-action-desc">{{ optional($todayRejectedRide->user)->address ?? 'N/A'}}</p>
                                                            </div>
                                                        </td>
                                                        <td>{{ $todayRejectedRide->created_at}}</td>
                                                        <td>{{ $todayRejectedRide->reason}}</td>
                                                    </tr>
                                                @endforeach

                                                </tbody>
                                            </table>
                                        @else
                                            <div class="alert alert-danger">
                                                <strong>No Rejected Ride For Today!</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-slot name="scripts">

        @livewireScripts
        {{--        <script>--}}
        {{--            // Your web app's Firebase configuration--}}
        {{--            var firebaseConfig = {--}}
        {{--                apiKey: "AIzaSyDnS8fPrV8CjELDvPAqy8jrRv_t0cKDnVA",--}}
        {{--                authDomain: "raido-306914.firebaseapp.com",--}}
        {{--                projectId: "raido-306914",--}}
        {{--                storageBucket: "raido-306914.appspot.com",--}}
        {{--                messagingSenderId: "317422992288",--}}
        {{--                appId: "1:317422992288:web:d919e85c0f1d17142bc2c5",--}}
        {{--                measurementId: "G-VV898P59N2"--}}
        {{--            };--}}
        {{--            // Initialize Firebase--}}
        {{--            firebase.initializeApp(firebaseConfig);--}}
        {{--            //firebase.analytics();--}}
        {{--            const messaging = firebase.messaging();--}}
        {{--            messaging--}}
        {{--                .requestPermission()--}}
        {{--                .then(function () {--}}
        {{--//MsgElem.innerHTML = "Notification permission granted."--}}
        {{--                    console.log("Notification permission granted.");--}}
        {{--                    // console.log(messaging.getToken())--}}
        {{--                    // get the token in the form of promise--}}
        {{--                    return messaging.getToken()--}}
        {{--                })--}}
        {{--                .then(function(token) {--}}
        {{--                    // print the token on the HTML page--}}
        {{--                    console.log(token);--}}



        {{--                })--}}
        {{--                .catch(function (err) {--}}
        {{--                    console.log("Unable to get permission to notify.", err);--}}
        {{--                });--}}

        {{--            messaging.onMessage(function(payload) {--}}
        {{--                // console.log(payload);--}}
        {{--                var notify;--}}
        {{--                notify = new Notification(payload.notification.title,{--}}
        {{--                    body: payload.notification.body,--}}
        {{--                    icon: payload.notification.icon,--}}
        {{--                    tag: "Dummy"--}}
        {{--                });--}}
        {{--                // console.log(payload.notification);--}}
        {{--            });--}}

        {{--            //firebase.initializeApp(config);--}}
        {{--            var database = firebase.database().ref().child("/users/");--}}

        {{--            database.on('value', function(snapshot) {--}}
        {{--                renderUI(snapshot.val());--}}
        {{--            });--}}

        {{--            // On child added to db--}}
        {{--            database.on('child_added', function(data) {--}}
        {{--                console.log("Comming");--}}
        {{--                if(Notification.permission!=='default'){--}}
        {{--                    var notify;--}}

        {{--                    notify= new Notification('CodeWife - '+data.val().username,{--}}
        {{--                        'body': data.val().message,--}}
        {{--                        'icon': 'bell.png',--}}
        {{--                        'tag': data.getKey()--}}
        {{--                    });--}}
        {{--                    notify.onclick = function(){--}}
        {{--                        alert(this.tag);--}}
        {{--                    }--}}
        {{--                }else{--}}
        {{--                    alert('Please allow the notification first');--}}
        {{--                }--}}
        {{--            });--}}

        {{--            self.addEventListener('notificationclick', function(event) {--}}
        {{--                event.notification.close();--}}
        {{--            });--}}


        {{--        </script>--}}
        <script src="{{ asset('assets/global/scripts/app.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/layouts/layout4/scripts/layout.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/js.cookie.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/layouts/global/scripts/quick-sidebar.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/layouts/global/scripts/quick-nav.min.js') }}" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
        <script>
            function approvedRequest(id) {
                swal({
                    title: "Are you sure?",
                    text: "You want to Approved  this request",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            location.href = `/vendor/user_request/` + id + `/approved`;
                        }
                    });
            }

            function rejectRequest(id) {
                swal("Write Some Reason For Rejection:", {
                    content: "input",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((value) => {
                        if (value) {
                            location.href = `/vendor/user_request/` + id + `/rejected?reason=` + value + ``;
                            swal("Reason Submitted", {
                                icon: "success",
                            });
                        }
                    });


            }
        </script>
    </x-slot>
</x-dashboard-layout-vendor>
