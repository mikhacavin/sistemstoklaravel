<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SalesModel extends Model
{
    public function allData()
    {
        return DB::table('tbl_sales')->get();
    }

    public function detailData($id_sales)
    {
        return DB::table('tbl_sales')->where('id_sales', $id_sales)->first();
    }

    public function addData($data)
    {
        DB::table('tbl_sales')->insert($data);
    }

    public function editData($id_sales, $data)
    {
        DB::table('tbl_sales')
            ->where('id_sales', $id_sales)
            ->update($data);
    }

    public function deleteData($id_sales)
    {
        DB::table('tbl_sales')
            ->where('id_sales', $id_sales)
            ->delete();
    }
}
