@extends('dashboard.layouts.main')

@section('contents')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Administrator
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
                            <div class="col">
                                <h3 class="align-items-start card-title">Daftar User</h3>
                            </div>
                            <div class="col text-end">

                                <button type="button" onclick="formAdd()" class=" align-items-end btn btn-sm btn-outline-success align-items-center"><span>
                                        <!-- Download SVG icon from http://tabler-icons.io/i/square-plus -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <rect x="4" y="4" width="16" height="16" rx="2" />
                                            <line x1="9" y1="12" x2="15" y2="12" />
                                            <line x1="12" y1="9" x2="12" y2="15" />
                                        </svg>
                                    </span>Tambah Server</button>
                            </div>
                        </div>
                        <div class="table-responsive-md">
                            <table id="users_table" class="table card-table table-vcenter datatable">
                                <thead>
                                    <tr>
                                        <th style="width:10%">No.</th>
                                        <th style="width:20%">Server Name</th>
                                        <th style="width:20%">IP Address</th>
                                        <th style="width:20%">Brand</th>
                                        <th style="width:20%">Action</th>
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



    <!-- Modal -->
    <div class="modal modal-blur fade" id="modal-edit-server" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Server</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="text" name="serverid" id="serverid" hidden>
                        <div class="col-lg-6 col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Server Name</label>
                                <input type="text" class="form-control" name="servername" id="servername" placeholder="Masukkan nama server">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="mb-3">
                                <label class="form-label">IP Address</label>
                                <input type="text" class="form-control" name="ip_address" id="ip_address" placeholder="Masukkan alamat server">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan username">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan password">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Brand</label>
                                <select name="brand" id="brand" class="form-control">
                                    <option value="1">HP</option>
                                    <option value="2">Nutanix</option>
                                    <option value="3">Lenovo</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Tipe</label>
                                <select name="type" id="type" class="form-control">
                                    <option value="1">ILO</option>
                                    <option value="2">IPMI</option>
                                    <option value="3">X-Clarity</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Deskripsi singkat</label>
                                <input type="text" class="form-control" name="description" id="description" placeholder="Masukkan deskripsi">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="button" onclick="updateServer()" class="btn btn-primary ms-auto">
                        Ubah Data
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal modal-blur fade" id="modal-add-server" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Server</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Server Name</label>
                                <input required type="text" class="form-control" name="servername" id="add_servername" placeholder="Masukkan nama server">
                                <div id="add_servername_msg"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="mb-3">
                                <label class="form-label">IP Address</label>
                                <input required type="text" class="form-control" name="ip_address" id="add_ip_address" placeholder="Masukkan alamat server">
                                <div id="add_ip_address_msg"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input required type="text" class="form-control" name="username" id="add_username" placeholder="Masukkan username">
                                <div id="add_username_msg"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input required type="password" class="form-control" name="password" id="add_password" placeholder="Masukkan password">
                                <div id="add_password_msg"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Brand</label>
                                <select name="brand" id="add_brand" class="form-control">
                                    <option value="1">HP</option>
                                    <option value="2">Nutanix</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Tipe</label>
                                <select name="type" id="add_type" class="form-control">
                                    <option value="1">ILO</option>
                                    <option value="2">IPMI</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Deskripsi singkat</label>
                                <input type="text" class="form-control" name="description" id="add_description" placeholder="Masukkan deskripsi">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="button" onClick="addServer()" class="btn btn-success ms-auto">
                        Tambahkan Server
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        var servers;

        $(document).ready(function() {

            servers = $('#users_table').DataTable({
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
                    'url': '/getServers',
                    'type': 'POST',
                    "data": function(data) {

                    }
                },
                processing: true,
                serverSide: false,
            });

            servers.on('order.dt search.dt', function() {
                servers.column(0, {
                    search: 'applied',
                    order: 'applied'
                }).nodes().each(function(cell, i) {
                    cell.innerHTML = i + 1;
                });
            }).draw();
        });

        function formEdit(id) {
            console.log(id);

            // Display Modal
            $('#modal-edit-server').modal('show');

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/getserverdetail',
                type: 'POST',
                dataType: "json",
                data: {
                    userid: id
                },
                error: function(xhr, status, error) {
                    let errorMessage = xhr.status + ': ' + xhr.statusText;
                    alert('Error - ' + errorMessage);
                },
                success: function(response) {
                    // console.log(response)
                    $('#serverid').val(response.serverid);
                    $('#servername').val(response.name);
                    $('#ip_address').val(response.ip_address);
                    $('#username').val(response.username);
                    $('#password').val(response.password);
                    $('#brand option[value="' + response.brand + '"]').prop('selected', true);
                    $('#type option[value="' + response.type + '"]').prop('selected', true);
                    $('#description').val(response.description);
                }
            });
        };

        function updateServer() {
            let serverid = $('#serverid').val();
            let servername = $('#servername').val();
            let ip_address = $('#ip_address').val();
            let username = $('#username').val();
            let password = $('#password').val();
            let brand = $('#brand').val();
            let type = $('#type').val();
            let description = $('#description').val();

            if (servername == '' || ip_address == '' || username == '' || password == '' || description == '') {
                alert('Form tidak boleh kosong!');
            } else {
                // console.log(serverid, servername, ip_address, username, password, brand, type, description);

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '/updateserver',
                    type: 'POST',
                    dataType: "text",
                    data: {
                        serverid,
                        servername,
                        ip_address,
                        username,
                        password,
                        brand,
                        type,
                        description
                    },
                    error: function(xhr, status, error) {
                        let errorMessage = xhr.status + ': ' + xhr.statusText;
                        alert('Error - ' + errorMessage);
                    },
                    success: function(response) {
                        alert(response);
                    }
                });

                $('#modal-edit-server').modal('hide');

                servers.ajax.reload();
            }


        };

        function formAdd() {
            // Display Modal
            $('#modal-add-server').modal('show');
            $('#modal-add-server').find("input[type=text], input[type=password]").val("");
        };

        function addServer() {
            let servername = $('#add_servername').val();
            let ip_address = $('#add_ip_address').val();
            let username = $('#add_username').val();
            let password = $('#add_password').val();
            let brand = $('#add_brand').val();
            let type = $('#add_type').val();
            let description = $('#add_description').val();

            if (servername == '' || ip_address == '' || username == '' || password == '' || description == '') {
                alert('Form tidak boleh kosong!');
            } else {
                console.log(servername, ip_address, username, password, brand, type, description);

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '/addserver',
                    type: 'POST',
                    dataType: "text",
                    data: {
                        servername,
                        ip_address,
                        username,
                        password,
                        brand,
                        type,
                        description
                    },
                    error: function(xhr, status, error) {
                        let errorMessage = xhr.status + ': ' + xhr.statusText;
                        alert('Error - ' + errorMessage);
                    },
                    success: function(response) {
                        alert(response);
                    }
                });

                $('#modal-add-server').modal('hide');

                servers.ajax.reload();
            }
        }

        function deleteServer(id, servername) {
            if (confirm('Apakah anda yakin menghapus ' + servername + '?')) {
                let serverid = id;

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '/deleteserver',
                    type: 'POST',
                    dataType: "text",
                    data: {
                        serverid
                    },
                    error: function(xhr, status, error) {
                        let errorMessage = xhr.status + ': ' + xhr.statusText;
                        alert('Error - ' + errorMessage);
                    },
                    success: function(response) {
                        alert(response);
                    }
                });

                servers.ajax.reload();
            } else {
                // Do nothing!
                // console.log('Thing was not saved to the database.');
            }
        }
    </script>
@endsection
