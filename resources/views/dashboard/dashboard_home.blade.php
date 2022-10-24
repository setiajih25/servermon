@extends('dashboard.layouts.main')

@section('contents')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Overview
                    </div>
                    <h2 class="page-title">
                        {{ $title }}
                    </h2>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="/recorddata" class="btn btn-primary d-none d-sm-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/capture -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M4 8v-2a2 2 0 0 1 2 -2h2" />
                                <path d="M4 16v2a2 2 0 0 0 2 2h2" />
                                <path d="M16 4h2a2 2 0 0 1 2 2v2" />
                                <path d="M16 20h2a2 2 0 0 0 2 -2v-2" />
                                <circle cx="12" cy="12" r="3" />
                            </svg>
                            Record Data
                        </a>
                        <a href="/recorddata" class="btn btn-primary d-sm-none btn-icon">
                            <!-- Download SVG icon from http://tabler-icons.io/i/capture -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M4 8v-2a2 2 0 0 1 2 -2h2" />
                                <path d="M4 16v2a2 2 0 0 0 2 2h2" />
                                <path d="M16 4h2a2 2 0 0 1 2 2v2" />
                                <path d="M16 20h2a2 2 0 0 0 2 -2v-2" />
                                <circle cx="12" cy="12" r="3" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($ilo == false && $ipmi == false && $xclarity == false)
        <div class="page-body">
            <div class="container-xl">
                <div class="row">
                    <div class="col">
                        <h1>Sorry, you don't have access to the servers. Try contacting your administrator.</h1>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($ilo == true)
        <div class="page-body">
            <div class="container-xl">
                <div class="row row-deck row-cards">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="col">
                                    <h3 class="align-items-start card-title">ILO</h3>
                                </div>
                                <div class="col text-end">
                                    <button type="button" id="refresh_ilo" class=" align-items-end btn btn-sm btn-outline-success align-items-center"><span>
                                            <!-- Download SVG icon from http://tabler-icons.io/i/refresh -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4" />
                                                <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4" />
                                            </svg>
                                        </span>Refresh Data</button>
                                </div>
                            </div>
                            <div class="table-responsive-md">
                                <table id="ilo_table" class="table card-table table-vcenter datatable">
                                    <thead>
                                        <tr>
                                            <th style="width:5%">No.</th>
                                            <th style="width:20%">Server</th>
                                            <th style="width:20%">IP Address</th>
                                            <th style="width:20%">Power State</th>
                                            <th style="width:20%">Health Summary</th>
                                            <th style="width:15%">Action</th>
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
    @endif

    @if ($ipmi == true)
        <div class="page-body">
            <div class="container-xl">
                <div class="row row-deck row-cards">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="col">
                                    <h3 class="align-items-start card-title">IPMI</h3>
                                </div>
                                <div class="col text-end">
                                    <button type="button" id="refresh_ipmi" class=" align-items-end btn btn-sm btn-outline-success align-items-center"><span>
                                            <!-- Download SVG icon from http://tabler-icons.io/i/refresh -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4" />
                                                <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4" />
                                            </svg>
                                        </span>Refresh Data</button>
                                </div>
                            </div>
                            <div class="table-responsive-md">
                                <table id="ipmi_table" class="table card-table table-vcenter datatable">
                                    <thead>
                                        <tr>
                                            <th style="width:5%">No.</th>
                                            <th style="width:20%">Server</th>
                                            <th style="width:20%">IP Address</th>
                                            <th style="width:20%">Power State</th>
                                            <th style="width:20%">Health Summary</th>
                                            <th style="width:15%">Action</th>
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
    @endif

    @if ($xclarity == true)
        <div class="page-body">
            <div class="container-xl">
                <div class="row row-deck row-cards">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="col">
                                    <h3 class="align-items-start card-title">X-Clarity</h3>
                                </div>
                                <div class="col text-end">
                                    <button type="button" id="refresh_xclarity" class=" align-items-end btn btn-sm btn-outline-success align-items-center"><span>
                                            <!-- Download SVG icon from http://tabler-icons.io/i/refresh -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4" />
                                                <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4" />
                                            </svg>
                                        </span>Refresh Data</button>
                                </div>
                            </div>
                            <div class="table-responsive-md">
                                <table id="xclarity_table" class="table card-table table-vcenter datatable">
                                    <thead>
                                        <tr>
                                            <th style="width:5%">No.</th>
                                            <th style="width:20%">Server</th>
                                            <th style="width:20%">IP Address</th>
                                            <th style="width:20%">Power State</th>
                                            <th style="width:20%">Health Summary</th>
                                            <th style="width:15%">Action</th>
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
    @endif

    @if ($netapp == true)
        <div class="page-body">
            <div class="container-xl">
                <div class="row row-deck row-cards">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="col">
                                    <h3 class="align-items-start card-title">NetApp</h3>
                                </div>
                                <div class="col text-end">
                                    <button type="button" id="refresh_netapp" class=" align-items-end btn btn-sm btn-outline-success align-items-center"><span>
                                            <!-- Download SVG icon from http://tabler-icons.io/i/refresh -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4" />
                                                <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4" />
                                            </svg>
                                        </span>Refresh Data</button>
                                </div>
                            </div>
                            <div class="table-responsive-md">
                                <table id="netapp_table" class="table card-table table-vcenter datatable">
                                    <thead>
                                        <tr>
                                            <th style="width:3%">No.</th>
                                            <th style="width:21%">Storage</th>
                                            <th style="width:39%">IP Address</th>
                                            <th style="width:20%">Health Summary</th>
                                            <th style="width:15%">Action</th>
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
    @endif

    <!-- Modal -->
    <div class=" modal modal-blur fade" id="modal-simple" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table card-table table-vcenter text-nowrap datatable">
                        <thead>
                            <tr>
                                <th>Systems</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="modal_table">

                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function getData(id, servername, ip_address) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/getstatus',
                type: 'POST',
                dataType: "json",
                data: {
                    serverid: id
                },
                error: function(xhr, status, error) {
                    let errorMessage = xhr.status + ': ' + xhr.statusText;
                    alert('Error - ' + errorMessage);
                },
                success: function(response) {
                    let table = $('#modal_table').empty();
                    $('#modal_title').html(servername + ' (' + ip_address + ')');

                    // Display Modal
                    $('#modal-simple').modal('show');

                    for (let i in response) {
                        let row = '<tr>';
                        row += '<td>' + i + '</td>';
                        if (response[i] == 'OP_STATUS_DEGRADED' || response[i] == 'OP_STATUS_ABSENT' ||
                            response[i] == 'NOT_REDUNDANT' || response[i] == 'AMS_UNAVAILABLE' || response[i] ==
                            'OP_STATUS_CRITICAL') {
                            row += '<td><span class="badge me-1 bg-warning"></span>' + response[i] + '</td>';
                        } else {
                            row += '<td>' + response[i] + '</td>';
                        }
                        row += '</tr>';
                        table.append(row);
                    }

                }
            });
        };

        $(document).ready(function() {

            let ilo = $('#ilo_table').DataTable({
                columnDefs: [{
                    "searchable": false,
                    "orderable": false,
                    "targets": [0, 5],
                }],
                order: [
                    [1, "asc"]
                ],
                paging: false,
                searching: false,
                bInfo: false,
                ajax: {
                    'headers': {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    'url': '/getsummaryilo',
                    'type': 'POST',
                    "data": function(data) {
                        data.id = {{ $session_id }}
                    }
                },
                processing: true,
                serverSide: false,
            });

            ilo.on('order.dt search.dt', function() {
                ilo.column(0, {
                    search: 'applied',
                    order: 'applied'
                }).nodes().each(function(cell, i) {
                    cell.innerHTML = i + 1;
                });
            }).draw();

            $("#refresh_ilo").click(function() {
                ilo.ajax.reload();
            });

            let ipmi = $('#ipmi_table').DataTable({
                columnDefs: [{
                    "searchable": false,
                    "orderable": false,
                    "targets": [0, 5],
                }],
                order: [
                    [1, "asc"]
                ],
                paging: false,
                searching: false,
                bInfo: false,
                ajax: {
                    'headers': {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    'url': '/getsummaryipmi',
                    'type': 'POST',
                    "data": function(data) {
                        data.id = {{ $session_id }}
                    }
                },
                processing: true,
                serverSide: false,
            });

            ipmi.on('order.dt search.dt', function() {
                ipmi.column(0, {
                    search: 'applied',
                    order: 'applied'
                }).nodes().each(function(cell, i) {
                    cell.innerHTML = i + 1;
                });
            }).draw();

            $("#refresh_ipmi").click(function() {
                ipmi.ajax.reload();
            });

            let xclarity = $('#xclarity_table').DataTable({
                columnDefs: [{
                    "searchable": false,
                    "orderable": false,
                    "targets": [0, 5],
                }],
                order: [
                    [1, "asc"]
                ],
                paging: false,
                searching: false,
                bInfo: false,
                ajax: {
                    'headers': {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    'url': '/getsummaryxclarity',
                    'type': 'POST',
                    "data": function(data) {
                        data.id = {{ $session_id }}
                    }
                },
                processing: true,
                serverSide: false,
            });

            xclarity.on('order.dt search.dt', function() {
                xclarity.column(0, {
                    search: 'applied',
                    order: 'applied'
                }).nodes().each(function(cell, i) {
                    cell.innerHTML = i + 1;
                });
            }).draw();

            $("#refresh_xclarity").click(function() {
                xclarity.ajax.reload();
            });

            let netapp = $('#netapp_table').DataTable({
                columnDefs: [{
                    "searchable": false,
                    "orderable": false,
                    "targets": [0, 4],
                }],
                order: [
                    [1, "asc"]
                ],
                paging: false,
                searching: false,
                bInfo: false,
                ajax: {
                    'headers': {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    'url': '/getsummarynetapp',
                    'type': 'POST',
                    "data": function(data) {
                        data.id = {{ $session_id }}
                    }
                },
                processing: true,
                serverSide: false,
            });

            netapp.on('order.dt search.dt', function() {
                netapp.column(0, {
                    search: 'applied',
                    order: 'applied'
                }).nodes().each(function(cell, i) {
                    cell.innerHTML = i + 1;
                });
            }).draw();

            $("#refresh_netapp").click(function() {
                netapp.ajax.reload();
            });
        });
    </script>
@endsection
