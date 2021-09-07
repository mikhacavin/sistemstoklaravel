<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class LaporanModel extends Model
{
    // menampilkan semua data laporankeluar
    public function allData()
    {
        return DB::table('tbl_laporankeluar')
            ->leftJoin('tbl_sales', 'tbl_sales.id_sales', '=', 'tbl_laporankeluar.id_sales')
            ->leftJoin('tbl_produk', 'tbl_produk.id_produk', '=', 'tbl_laporankeluar.id_produk')
            ->orderBy('id_laporan', 'desc')
            ->get();
    }

    public function allData2()
    {
        return DB::table('tbl_laporanmasuk')
            ->leftJoin('tbl_produk', 'tbl_produk.id_produk', '=', 'tbl_laporanmasuk.id_produk')
            ->orderBy('id_laporan', 'desc')
            ->get();
    }


    // menampilkan detail data laporankeluar berdasarkan id laporan
    public function detailData($id_laporan)
    {
        return DB::table('tbl_laporankeluar')->where('id_laporan', $id_laporan)->first();
    }


    // menambahkan data kedalam database table laporan keluar
    public function addData($data)
    {
        DB::table('tbl_laporankeluar')->insert($data);
    }

    // menambahkan data kedalam database table laporan masuk
    public function addData2($data)
    {
        DB::table('tbl_laporanmasuk')->insert($data);
    }


    // update data laporan
    public function editData($id_laporan, $data)
    {
        DB::table('tbl_laporankeluar')
            ->where('id_laporan', $id_laporan)
            ->update($data);
    }

    // delete laporan keluar
    public function deleteData($id_laporan)
    {
        DB::table('tbl_laporankeluar')
            ->where('id_laporan', $id_laporan)
            ->delete();
    }

    // delete laporan keluar
    public function deleteData2($id_laporan)
    {
        DB::table('tbl_laporanmasuk')
            ->where('id_laporan', $id_laporan)
            ->delete();
    }


    // menampilkan data tabel sales untuk input nama sales
    public function tabelsales()
    {
        return DB::table('tbl_sales')->get();
    }

    // menampilkan sema data produk untuk halaman buat laporan
    public function allDataProduk()
    {
        return DB::table('tbl_produk')
            ->leftJoin('tbl_kategori', 'tbl_kategori.id_kategori', '=', 'tbl_produk.id_kategori')
            ->leftJoin('tbl_brand', 'tbl_brand.id_brand', '=', 'tbl_produk.id_brand')
            ->orderBy('id_produk', 'desc')
            ->get();
    }

    // menampilkan detail data produk berdasarkan id produk untuk proses simpan data kedalam table laporan
    public function detailDataProduk($id_produk)
    {
        return DB::table('tbl_produk')
            ->leftJoin('tbl_kategori', 'tbl_kategori.id_kategori', '=', 'tbl_produk.id_kategori')
            ->leftJoin('tbl_brand', 'tbl_brand.id_brand', '=', 'tbl_produk.id_brand')
            ->where('id_produk', $id_produk)->first();
    }

    // edit stok produk ketika laporan di simpan
    public function editDataProduk($id_produk, $data)
    {
        DB::table('tbl_produk')
            ->where('id_produk', $id_produk)
            ->update($data);
    }
}
