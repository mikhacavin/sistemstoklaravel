<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProdukModel extends Model
{
    public function allData()
    {
        return DB::table('tbl_produk')
            ->leftJoin('tbl_kategori', 'tbl_kategori.id_kategori', '=', 'tbl_produk.id_kategori')
            ->leftJoin('tbl_brand', 'tbl_brand.id_brand', '=', 'tbl_produk.id_brand')
            ->orderBy('id_produk', 'desc')
            ->get();
    }


    public function tableKategori()
    {
        return DB::table('tbl_kategori')->get();
    }

    public function tableBrand()
    {
        return DB::table('tbl_brand')->get();
    }

    public function detailData($id_produk)
    {
        return DB::table('tbl_produk')->where('id_produk', $id_produk)->first();
    }

    public function addData($data)
    {
        DB::table('tbl_produk')->insert($data);
    }


    public function editData($id_produk, $data)
    {
        DB::table('tbl_produk')
            ->where('id_produk', $id_produk)
            ->update($data);
    }

    public function deleteData($id_produk)
    {
        DB::table('tbl_produk')
            ->where('id_produk', $id_produk)
            ->delete();
    }
}
