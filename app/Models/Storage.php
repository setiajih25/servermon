<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Storage extends Model
{
    use HasFactory;

    public static function getAllStorages()
    {
        $storages = DB::table('storages')
            ->select('uuid', 'description', 'brand')
            ->orderBy('description')
            ->get();

        return $storages;
    }
}
