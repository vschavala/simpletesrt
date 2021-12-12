@extends('layouts.main')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-2">
            <h3 class="h3 mb-0 text-gray-800">Dashboard</h3>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-6 col-md-12 mb-4">
                <a href="{{ route('thanks.senders') }}">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1 ">
                                        <h5>Thanks Senders</h5></div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800 "><strong>{{ $thanksSenderCount }}</strong></div>
                                </div>
                                <div class="col-auto">
                                    <i class="far fa-handshake fa-3x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-6 col-md-12 mb-4">
                <a href="{{ route('thanks.recievers') }}">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        <h5>Thanks Recievers</h5></div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><strong>{{ $thanksRecieverCount }}</strong></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-hands-helping fa-3x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Earnings (Monthly) Card Example -->

        </div>

        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Latest Activity</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered data-table" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Sent By</th>
                                        <th>Recived By</th>
                                        <th>Reason</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </div>


    </div>
    <script type="text/javascript">
        $(function() {

            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('latest.activity') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'parents',
                        name: 'parents.name',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'users',
                        name: 'users.name',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'comment',
                        name: 'comment'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    }
                ]
            });

        });

    </script>
@endsection
