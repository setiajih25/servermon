<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function users()
    {
        $data['title'] = 'Manage Users';
        $data['uri'] = 'manageUsers';

        return view('dashboard.admin_manage_users', $data);
    }

    public function getUsers(Request $request)
    {
        $users = DB::table('users')
            ->join('users_level', 'users_level.id', '=', 'users.level')
            ->select('users.id as userid', 'username', 'role')
            ->get();

        $data = [];
        $no = 1;

        foreach ($users as $user) {
            $row = [];
            $row[] = $no++;
            $row[] = $user->username;
            $row[] = $user->role;
            $row[] = "<button class=\"btn btn-outline-primary btn-sm\" onclick=\"formEdit($user->userid)\">
            <svg xmlns=\"http://www.w3.org/2000/svg\" class=\"icon\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" stroke-width=\"2\" stroke=\"currentColor\" fill=\"none\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path stroke=\"none\" d=\"M0 0h24v24H0z\" fill=\"none\"/><path d=\"M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3\" /><path d=\"M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3\" /><line x1=\"16\" y1=\"5\" x2=\"19\" y2=\"8\" /></svg></span>
            Edit</button>" .
                "<button class=\"btn btn-outline-danger btn-sm\" onclick=\"deleteUser($user->userid, '$user->username')\">
                <span><svg xmlns=\"http://www.w3.org/2000/svg\" class=\"icon\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" stroke-width=\"2\" stroke=\"currentColor\" fill=\"none\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path stroke=\"none\" d=\"M0 0h24v24H0z\" fill=\"none\"/><line x1=\"4\" y1=\"7\" x2=\"20\" y2=\"7\" /><line x1=\"10\" y1=\"11\" x2=\"10\" y2=\"17\" /><line x1=\"14\" y1=\"11\" x2=\"14\" y2=\"17\" /><path d=\"M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12\" /><path d=\"M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3\" /></svg></span>
                Delete</button>";
            $data[] = $row;
        }

        $output = [
            "draw" => $request->draw,
            "recordsTotal" => $no,
            "recordsFiltered" => $no,
            "data" => $data
        ];

        echo json_encode($output);
    }

    public function servers()
    {
        $data['title'] = 'Manage Servers';
        $data['uri'] = 'manageServers';

        return view('dashboard.admin_manage_servers', $data);
    }

    public function getServers(Request $request)
    {
        $servers = DB::table('servers')
            ->join('servers_brand', 'servers_brand.id', '=', 'servers.brand')
            ->select('servers.id as serverid', 'name', 'ip_address', 'description', 'servers_brand.brand as serverbrand')
            ->get();

        $data = [];
        $no = 1;

        foreach ($servers as $server) {
            $row = [];
            $row[] = $no++;
            $row[] = "<span data-bs-toggle=\"tooltip\" data-bs-placement=\"top\" title=\"$server->description\">$server->name</span>";
            $row[] = $server->ip_address;
            $row[] = $server->serverbrand;
            $row[] = "<button class=\"btn btn-outline-primary btn-sm\" onclick=\"formEdit($server->serverid)\">
            <svg xmlns=\"http://www.w3.org/2000/svg\" class=\"icon\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" stroke-width=\"2\" stroke=\"currentColor\" fill=\"none\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path stroke=\"none\" d=\"M0 0h24v24H0z\" fill=\"none\"/><path d=\"M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3\" /><path d=\"M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3\" /><line x1=\"16\" y1=\"5\" x2=\"19\" y2=\"8\" /></svg></span>
            Edit</button>" .
                "<button class=\"btn btn-outline-danger btn-sm\" onclick=\"deleteServer($server->serverid, '$server->name')\">
                <span><svg xmlns=\"http://www.w3.org/2000/svg\" class=\"icon\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" stroke-width=\"2\" stroke=\"currentColor\" fill=\"none\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path stroke=\"none\" d=\"M0 0h24v24H0z\" fill=\"none\"/><line x1=\"4\" y1=\"7\" x2=\"20\" y2=\"7\" /><line x1=\"10\" y1=\"11\" x2=\"10\" y2=\"17\" /><line x1=\"14\" y1=\"11\" x2=\"14\" y2=\"17\" /><path d=\"M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12\" /><path d=\"M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3\" /></svg></span>
                Delete</button>";
            $data[] = $row;
        }

        $output = [
            "draw" => $request->draw,
            "recordsTotal" => $no,
            "recordsFiltered" => $no,
            "data" => $data
        ];

        echo json_encode($output);
    }

    public function getServersName(Request $request)
    {
        if ($request->userid) {
            $roles = DB::table('users')
                ->join('user_server_permission', 'user_server_permission.userid', '=', 'users.id')
                ->join('servers', 'servers.id', '=', 'user_server_permission.serverid')
                ->where('users.id', '=', $request->userid)
                ->get();
        } else {
            $roles = DB::table('servers')
                ->orderBy('name')
                ->select('id', 'name')
                ->get();
        }

        echo json_encode($roles);
    }

    public function getUserDetail(Request $request)
    {
        $userDetail = DB::table('users')
            ->select('username', 'users.id as userid', 'level')
            ->where('users.id', '=', $request->userid)
            ->get();

        $userPermissions = DB::table('users')
            ->join('user_server_permission', 'user_server_permission.userid', '=', 'users.id')
            ->select('user_server_permission.serverid')
            ->where('users.id', '=', $request->userid)
            ->get();

        // dd($userDetail);

        $data['userid'] = $userDetail[0]->userid;
        $data['username'] = $userDetail[0]->username;
        $data['level'] = $userDetail[0]->level;

        $serverid = [];
        foreach ($userPermissions as $userPermission) {
            $serverid[] = $userPermission->serverid;
        }

        $data['serverid'] = $serverid;


        echo json_encode($data);
    }

    public function updateUser(Request $request)
    {
        $userid = $request->userid;
        $username = $request->username;
        $level = $request->level;
        $permissions = $request->permission;

        try {
            $updateUser = DB::table('users')
                ->where('id', $userid)
                ->update([
                    'username' => $username,
                    'level' => $level,
                ]);

            $deletePermission = DB::table('user_server_permission')->where('userid', '=', $userid)->delete();
            if ($permissions !== null) {
                foreach ($permissions as $permission) {
                    $updatePermission = DB::table('user_server_permission')->insert([
                        'userid' => $userid,
                        'serverid' => $permission
                    ]);
                }
            }

            echo "Data user berhasil diubah.";
        } catch (\Illuminate\Database\QueryException $err) {
            // dd($ex->getMessage());
            echo $err->getMessage();
        }
    }

    public function addUser(Request $request)
    {
        $username = $request->username;
        $level = $request->level;
        $password = $request->password;
        $permissions = $request->permission;

        try {
            //insert row baru dan tangkap id dari row baru tersebut
            $addUser = DB::table('users')
                ->insertGetId([
                    'username' => $username,
                    'password' => Hash::make($password),
                    'level' => $level,
                ]);

            // $deletePermission = DB::table('user_server_permission')->where('userid', '=', $userid)->delete();
            if ($permissions !== null) {
                foreach ($permissions as $permission) {
                    $updatePermission = DB::table('user_server_permission')->insert([
                        'userid' => $addUser,
                        'serverid' => $permission
                    ]);
                }
            }

            echo "Data user berhasil ditambahkan.";
        } catch (\Illuminate\Database\QueryException $err) {
            // dd($ex->getMessage());
            echo $err->getMessage();
        }
    }

    public function deleteUser(Request $request)
    {
        $userid = $request->userid;

        try {
            //insert row baru dan tangkap id dari row baru tersebut
            $deleteUser = DB::table('users')->where('id', '=', $userid)->delete();

            // $deletePermission = DB::table('user_server_permission')->where('userid', '=', $userid)->delete();

            echo "Data user berhasil dihapus.";
        } catch (\Illuminate\Database\QueryException $err) {
            // dd($ex->getMessage());
            echo $err->getMessage();
        }
    }

    public function getServerDetail(Request $request)
    {
        $serverDetail = DB::table('servers')
            ->select('name', 'servers.id as serverid', 'ip_address', 'username', 'password', 'description', 'brand', 'type')
            ->where('servers.id', '=', $request->userid)
            ->get();

        // dd($userDetail);

        echo json_encode($serverDetail[0]);
    }

    public function updateServer(Request $request)
    {
        $serverid = $request->serverid;
        $servername = $request->servername;
        $ip_address = $request->ip_address;
        $username = $request->username;
        $password = $request->password;
        $brand = $request->brand;
        $type = $request->type;
        $description = $request->description;

        try {
            $updateUser = DB::table('servers')
                ->where('id', $serverid)
                ->update([
                    'id' => $serverid,
                    'name' => $servername,
                    'ip_address' => $ip_address,
                    'username' => $username,
                    'password' => $password,
                    'description' => $description,
                    'brand' => $brand,
                    'type' => $type,
                ]);

            echo "Data user berhasil diubah.";
        } catch (\Illuminate\Database\QueryException $err) {
            // dd($ex->getMessage());
            echo $err->getMessage();
        }
    }

    public function addServer(Request $request)
    {
        $servername = $request->servername;
        $ip_address = $request->ip_address;
        $username = $request->username;
        $password = $request->password;
        $brand = $request->brand;
        $type = $request->type;
        $description = $request->description;

        try {
            //insert row baru dan tangkap id dari row baru tersebut
            $addUser = DB::table('servers')
                ->insert([
                    'name' => $servername,
                    'ip_address' => $ip_address,
                    'username' => $username,
                    'password' => $password,
                    'description' => $description,
                    'brand' => $brand,
                    'type' => $type,
                ]);

            echo "Data server berhasil ditambahkan.";
        } catch (\Illuminate\Database\QueryException $err) {
            // dd($ex->getMessage());
            echo $err->getMessage();
        }
    }

    public function deleteServer(Request $request)
    {
        $serverid = $request->serverid;

        try {
            //insert row baru dan tangkap id dari row baru tersebut
            $deleteUser = DB::table('servers')->where('id', '=', $serverid)->delete();

            // $deletePermission = DB::table('user_server_permission')->where('userid', '=', $userid)->delete();

            echo "Data server berhasil dihapus.";
        } catch (\Illuminate\Database\QueryException $err) {
            // dd($ex->getMessage());
            echo $err->getMessage();
        }
    }
}
