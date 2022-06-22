<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Status_model extends Model
{
    // kategori
    public function semua()
    {
        $query = DB::table('vw_log_status as m1')
                ->join('vw_log_status as m2', function ($join) {
                    $join->on('m1.nmr_resi','=','m2.nmr_resi')
                        ->orOn('m1.id_status','<','m2.id_status');
                })
                ->select('m1.*')
                ->whereNULL('m2.id_status')->get();
        return $query;
    }
}
