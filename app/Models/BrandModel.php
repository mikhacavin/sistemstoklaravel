<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BrandModel extends Model
{
    public function allData()
    {
        return DB::table('tbl_brand')->get();
    }

    public function detailData($id_brand)
    {
        return DB::table('tbl_brand')->where('id_brand', $id_brand)->first();
    }

    public function addData($data)
    {
        DB::table('tbl_brand')->insert($data);
    }

    public function editData($id_brand, $data)
    {
        DB::table('tbl_brand')
            ->where('id_brand', $id_brand)
            ->update($data);
    }

    public function deleteData($id_brand)
    {
        DB::table('tbl_brand')
            ->where('id_brand', $id_brand)
            ->delete();
    }
}
