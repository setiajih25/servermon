<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Server extends Model
{
    use HasFactory;

    public static function getServer($id)
    {
        $servers = DB::table('users')
            ->join('user_server_permission', 'users.id', '=', 'user_server_permission.userid')
            ->join('servers', 'servers.id', '=', 'user_server_permission.serverid')
            ->where('users.id', '=', $id)
            ->select('name', 'ip_address', 'servers.username', 'servers.password', 'description', 'type', 'servers.id as serverid')
            ->orderBy('name')
            ->get();

        return $servers;
    }

    public static function getAllServer()
    {
        $servers = DB::table('servers')
            ->select('ip_address', 'servers.id as serverid', 'type', 'username', 'password')
            ->orderBy('name')
            ->get();

        return $servers;
    }
}
