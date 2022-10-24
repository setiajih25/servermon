<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Report extends Model
{
    use HasFactory;

    public static function getAllOperators()
    {
        $operators = DB::table('operator')
            ->select('id', 'nama')
            ->get();

        return $operators;
    }
}
