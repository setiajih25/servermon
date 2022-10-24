@extends('dashboard.layouts.main')

@section('contents')

    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Data History
                    </div>
                    <h2 class="page-title">
                        {{ $title }}
                    </h2>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col">
                                    <h3 class="align-items-start card-title">Query Data</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <div class="form-label">Pilih Server</div>
                                            <select class="form-select" multiple id="multiselect_server">

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-label">Tanggal Awal</div>
                                        <div class="input-icon mb-2">
                                            <input class="datepicker form-control " placeholder="Pilih tanggal mulai"
                                                id="date-start" />
                                            <span class="input-icon-addon">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/calendar -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <rect x="4" y="5" width="16" height="16" rx="2" />
                                                    <line x1="16" y1="3" x2="16" y2="7" />
                                                    <line x1="8" y1="3" x2="8" y2="7" />
                                                    <line x1="4" y1="11" x2="20" y2="11" />
                                                    <line x1="11" y1="15" x2="12" y2="15" />
                                                    <line x1="12" y1="15" x2="12" y2="18" />
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-label">Tanggal Akhir</div>
                                        <div class="input-icon mb-2">
                                            <input class="datepicker form-control " placeholder="Pilih tanggal akhir"
                                                id="date-end" />
                                            <span class="input-icon-addon">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/calendar -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <rect x="4" y="5" width="16" height="16" rx="2" />
                                                    <line x1="16" y1="3" x2="16" y2="7" />
                                                    <line x1="8" y1="3" x2="8" y2="7" />
                                                    <line x1="4" y1="11" x2="20" y2="11" />
                                                    <line x1="11" y1="15" x2="12" y2="15" />
                                                    <line x1="12" y1="15" x2="12" y2="18" />
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <div class="form-label">Pilih Jam</div>
                                            <select class="form-select" multiple id="multiselect_jam">

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-center">
                                        <button id="search" type="button" class="btn btn-primary">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <circle cx="10" cy="10" r="7" />
                                                <line x1="21" y1="21" x2="15" y2="15" />
                                            </svg>
                                            <span>Search</span>
                                        </button>
                                        <button id="clear" type="button" class="btn btn-outline-danger">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/trash -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <line x1="4" y1="7" x2="20" y2="7" />
                                                <line x1="10" y1="11" x2="10" y2="17" />
                                                <line x1="14" y1="11" x2="14" y2="17" />
                                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                            </svg>
                                            <span>Clear</span>
                                        </button>
                                        {{-- <button id="report" type="button" class="btn btn-outline-dark">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/file-report -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <circle cx="17" cy="17" r="4" />
                                                <path d="M17 13v4h4" />
                                                <path d="M12 3v4a1 1 0 0 0 1 1h4" />
                                                <path d="M11.5 21h-6.5a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v2m0 3v4" />
                                            </svg>
                                            <span>Generate Report</span>
                                        </button> --}}
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="export_table" class="table">
                                    <thead>
                                        <tr>
                                            <th style="width:5%">No.</th>
                                            <th style="width:15%">Datetime</th>
                                            <th style="width:15%">Server</th>
                                            <th style="width:15%">Alamat IP</th>
                                            <th style="width:15%">Power State</th>
                                            <th style="width:15%">Health Summary</th>
                                            <th style="width:20%">Keterangan</th>
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
    </div>

    <script>
        //tarik data yang tersimpan di database
        function query_data_historis() {
            let i = 1;
            const table = $("#export_table").DataTable({
                scrollX: true,
                responsive: true,
                pageLength: 25,
                lengthMenu: [
                    [5, 10, 25, 50, 100],
                    [5, 10, 25, 50, 100]
                ],
                bLengthChange: true,
                bFilter: true,
                bInfo: true,
                searching: false,
                processing: true,
                bServerSide: true,
                order: [
                    [1, "asc"]
                ],
                ajax: {
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "/exportdata",
                    type: "POST",
                    data: function(data) {
                        data.date_start = $('#date-start').val();
                        data.date_end = $('#date-end').val();
                        data.servers = $('#multiselect_server').val();
                        data.times = $('#multiselect_jam').val();
                    }
                },
                dom: 'Blfrtip',
                buttons: [{
                    extend: 'copy',
                    className: 'btn-primary'
                }],
                columns: [{
                        "data": null,
                        "sortable": false,
                        "render": function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1
                        }
                    },
                    {
                        "render": function(data, type, row, meta) {
                            return row.datetime
                        }
                    },
                    {
                        "render": function(data, type, row, meta) {
                            return row.name
                        }
                    },
                    {
                        "render": function(data, type, row, meta) {
                            return row.ip_address
                        }
                    },
                    {
                        "render": function(data, type, row, meta) {
                            if (row.power_state == "ON") {
                                return '<span class="badge me-1 bg-success"></span>' + row.power_state
                            } else if (row.power_state == "Failed") {
                                return '<span class="badge me-1 bg-secondary"></span>' + row.power_state
                            } else {
                                return '<span class="badge me-1 bg-danger"></span>' + row.power_state
                            }
                        }
                    },
                    {
                        "render": function(data, type, row, meta) {
                            if (row.health_summary == "OK") {
                                return '<span class="badge me-1 bg-success"></span>' + row.health_summary
                            } else if (row.health_summary == "Failed") {
                                return '<span class="badge me-1 bg-secondary"></span>' + row.health_summary
                            } else {
                                return '<span class="badge me-1 bg-warning"></span>' + row.health_summary
                            }
                        }
                    },
                    {
                        "render": function(data, type, row, meta) {
                            if (row.detail != null) {
                                return '<div class="text-warning">' + row.detail + '</div>'
                            } else {
                                return row.detail
                            }
                        }
                    }
                ]
            });
        }


        $(document).ready(function() {

            let userid = {!! auth()->user()->id !!};

            // console.log(userid)

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/getserversname',
                type: 'POST',
                dataType: "json",
                data: {
                    userid
                },
                error: function(xhr, status, error) {
                    let errorMessage = xhr.status + ': ' + xhr.statusText;
                    alert('Error - ' + errorMessage);
                },
                success: function(response) {
                    let options = [];
                    let option = {};
                    for (let i in response) {
                        option = {
                            name: response[i].name,
                            value: response[i].id,
                            checked: false
                        }
                        options.push(option);
                    }

                    console.log(options);
                    $('#multiselect_server').multiselect('loadOptions', options);

                    let times = [];
                    let time = {};
                    for (let i = 0; i < 24; i++) {
                        time = {
                            name: i,
                            value: i,
                            checked: false
                        }
                        times.push(time);
                    }
                    // console.log(times);
                    $('#multiselect_jam').multiselect('loadOptions', times);
                }
            });

            $("#multiselect_server").multiselect({
                columns: 2,
                placeholder: "Pilih server",
                search: true,
                searchOptions: {
                    default: "Pilih server",
                },
                selectAll: true,
            });

            $("#multiselect_jam").multiselect({
                columns: 6,
                placeholder: "Pilih jam",
                search: true,
                searchOptions: {
                    default: "Pilih jam",
                },
                selectAll: true,
            });

        });

        let click = false;

        $('#search').click(function() {

            if ($('#date-start').val() != '' &&
                $('#date-end').val() != '' &&
                $('#multiselect_server').val() != '' &&
                $('#multiselect_jam').val() != '') {
                $('#export_table').DataTable().destroy();
                query_data_historis();
                click = true;
            } else {
                alert('Isi form query terlebih dahulu!');
            }



        });

        $('#clear').click(function() {

            $('#multiselect_server').multiselect('reset');
            $('#date-start').val('');
            $('#date-end').val('');
            $('#multiselect_jam').multiselect('reset');

            if (click != false) {
                $('#export_table').empty();
                $('#export_table').DataTable().destroy();
                click = false
            }

        });

        $('#report').click(function() {

            if ($('#date-start').val() != '' &&
                $('#date-end').val() != '' &&
                $('#multiselect_server').val() != '' &&
                $('#multiselect_jam').val() != '') {
                window.open('/report/' + $('#date-start').val() + '/' + $('#date-end').val() + '/' + $(
                    '#multiselect_server').val() + '/' + $('#multiselect_jam').val(), '_blank');
            } else {
                alert('Isi form query terlebih dahulu!');
            }

        });
    </script>


    <script>
        $(function() {
            $(".datepicker").datepicker({
                todayBtn: 'linked',
                format: "yyyy-mm-dd",
                autoclose: true,
                orientation: "bottom"
            });
        });
    </script>


@endsection
