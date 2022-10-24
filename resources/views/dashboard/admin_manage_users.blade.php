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

                                <button type="button" onclick="formAdd()"
                                    class=" align-items-end btn btn-sm btn-outline-success align-items-center"><span>
                                        <!-- Download SVG icon from http://tabler-icons.io/i/user-plus -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <circle cx="9" cy="7" r="4" />
                                            <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                            <path d="M16 11h6m-3 -3v6" />
                                        </svg>
                                    </span>Tambah User</button>
                            </div>
                        </div>
                        <div class="table-responsive-md">
                            <table id="users_table" class="table card-table table-vcenter datatable">
                                <thead>
                                    <tr>
                                        <th style="width:10%">No.</th>
                                        <th style="width:30%">Username</th>
                                        <th style="width:30%">Role</th>
                                        <th style="width:30%">Action</th>
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
    <div class="modal modal-blur fade" id="modal-edit-user" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="text" name="userid" id="userid" hidden>
                        <div class="col-lg-6 col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" class="form-control" name="username" id="username"
                                    placeholder="Masukkan username">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Role</label>
                                <select name="role" id="role" class="form-control">
                                    <option value="1">Administrator</option>
                                    <option value="2">Operator</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div>
                                <div class="form-label">Permission</div>
                                <div id="modal_permission">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="button" onclick="updateUser()" class="btn btn-primary ms-auto">
                        Ubah Data
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal modal-blur fade" id="modal-add-user" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" class="form-control" name="username" id="add_username"
                                    placeholder="Masukkan username">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Role</label>
                                <select name="role" id="add_role" class="form-control">
                                    <option value="1">Administrator</option>
                                    <option value="2">Operator</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="add_password"
                                    placeholder="Masukkan password">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Konfirmasi Password</label>
                                <input type="password" class="form-control" name="password_confirm"
                                    id="add_password_confirm" placeholder="Konfirmasi password">
                            </div>
                            <div id="add_match"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div>
                                <div class="form-label">Permission</div>
                                <div id="add_modal_permission">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="button" onclick="addUser()" class="btn btn-success ms-auto">
                        Tambahkan User
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        var users;

        $(document).ready(function() {

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/getserversname',
                type: 'POST',
                dataType: "json",
                data: {},
                error: function(xhr, status, error) {
                    let errorMessage = xhr.status + ': ' + xhr.statusText;
                    alert('Error - ' + errorMessage);
                },
                success: function(response) {

                    let checkbox = '';
                    for (let i in response) {
                        checkbox += '<label class="form-check form-check-inline">';
                        checkbox += '<input name="servers_permission" value="' + response[i].id +
                            '" class="form-check-input" type="checkbox" id="' + response[i]
                            .id + '">';
                        checkbox += '<span class="form-check-label">' + response[i].name +
                            '</span>';
                        checkbox += '</label>';
                    }

                    $('#modal_permission').html(checkbox);

                }
            });

            users = $('#users_table').DataTable({
                columnDefs: [{
                    "searchable": false,
                    "orderable": false,
                    "targets": [0, 3],
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
                    'url': '/getUsers',
                    'type': 'POST',
                    "data": function(data) {

                    }
                },
                processing: true,
                serverSide: false,
            });

            users.on('order.dt search.dt', function() {
                users.column(0, {
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
            $('#modal-edit-user').modal('show');

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/getuserdetail',
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
                    console.log(response)
                    $('#userid').val(response.userid);
                    $('#username').val(response.username);
                    $('#role option[value="' + response.level + '"]').prop('selected', true);
                    $('#modal_permission input:checkbox').prop('checked', false);
                    // $("#modal_permission input:checkbox").prop("checked", !$(".checkbox").prop("checked"));
                    for (let i in response.serverid) {
                        $('#' + response.serverid[i]).prop('checked', true);
                    }
                }
            });
        };

        function updateUser() {
            let userid = $('#userid').val();
            let username = $('#username').val();
            let level = $('#role').val();
            let permission = [];

            $("#modal_permission :checkbox").each(function() {
                var ischecked = $(this).is(":checked");
                if (ischecked) {
                    permission.push($(this).val());
                }
            });

            if (username == '' || level == '') {
                alert('Form tidak boleh kosong!');
            } else {
                console.log(userid, username, level, permission);

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '/updateuser',
                    type: 'POST',
                    dataType: "text",
                    data: {
                        userid,
                        username,
                        level,
                        permission
                    },
                    error: function(xhr, status, error) {
                        let errorMessage = xhr.status + ': ' + xhr.statusText;
                        alert('Error - ' + errorMessage);
                    },
                    success: function(response) {
                        alert(response);
                    }
                });

                $('#modal-edit-user').modal('hide');

                users.ajax.reload();
            }
        }

        function formAdd() {
            // Display Modal
            $('#modal-add-user').modal('show');
            $('#modal-add-user').find("input[type=text], input[type=password]").val("");

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/getserversname',
                type: 'POST',
                dataType: "json",
                data: {},
                error: function(xhr, status, error) {
                    let errorMessage = xhr.status + ': ' + xhr.statusText;
                    alert('Error - ' + errorMessage);
                },
                success: function(response) {

                    let checkbox = '';
                    for (let i in response) {
                        checkbox += '<label class="form-check form-check-inline">';
                        checkbox += '<input name="servers_permission" value="' + response[i].id +
                            '" class="form-check-input" type="checkbox" id="' + response[i]
                            .id + '">';
                        checkbox += '<span class="form-check-label">' + response[i].name +
                            '</span>';
                        checkbox += '</label>';
                    }

                    $('#add_modal_permission').html(checkbox);
                }
            });
        };

        function addUser() {
            let username = $('#add_username').val();
            let level = $('#add_role').val();
            let password = $('#add_password').val();
            let password_confirm = $('#add_password_confirm').val();
            let permission = [];

            $("#add_modal_permission :checkbox").each(function() {
                var ischecked = $(this).is(":checked");
                if (ischecked) {
                    permission.push($(this).val());
                }
            });

            if (username == '' || level == '' || password == '' || password_confirm == '') {
                alert('Form tidak boleh kosong!');
            } else {
                console.log(username, level, password, password_confirm, permission);

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '/adduser',
                    type: 'POST',
                    dataType: "text",
                    data: {
                        username,
                        level,
                        password,
                        permission
                    },
                    error: function(xhr, status, error) {
                        let errorMessage = xhr.status + ': ' + xhr.statusText;
                        alert('Error - ' + errorMessage);
                    },
                    success: function(response) {
                        alert(response);
                    }
                });

                $('#modal-add-user').modal('hide');

                users.ajax.reload();
            }


        }

        function deleteUser(id, username) {
            if (confirm('Apakah anda yakin menghapus ' + username + '?')) {
                let userid = id;

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '/deleteuser',
                    type: 'POST',
                    dataType: "text",
                    data: {
                        userid
                    },
                    error: function(xhr, status, error) {
                        let errorMessage = xhr.status + ': ' + xhr.statusText;
                        alert('Error - ' + errorMessage);
                    },
                    success: function(response) {
                        alert(response);
                    }
                });

                users.ajax.reload();
            } else {
                // Do nothing!
                // console.log('Thing was not saved to the database.');
            }
        }

        $('#add_password, #add_password_confirm').on('keyup', function() {
            if ($('#add_password').val() == $('#add_password_confirm').val()) {
                $('#add_match').removeClass().addClass('pt-2 text-success').html(
                    '<b><small>Password matched</small></b>');
            } else
                $('#add_match').removeClass().addClass('pt-2 text-danger').html(
                    '<b><small>Password not matched!</small></b>');
        });
    </script>
@endsection
