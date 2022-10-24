<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExportData extends Model
{
    use HasFactory;

    protected $table = 'servers_history';

    // public static function getServerHistory()
    // {
    //     return static::join('servers', 'servers.id', '=', 'servers_history.serverid')
    //         ->select('servers_history.*', 'name', 'ip_address')
    //         ->get();
    // }
}
