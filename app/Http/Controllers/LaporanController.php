<?php

namespace App\Http\Controllers;

use App\Models\LaporanModel;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function __construct()
    {
        $this->LaporanModel = new LaporanModel();
        $this->middleware('auth');
    }

    // index laporan ambil barang dari persediaan
    public function index()
    {
        $data = [
            'laporan' => $this->LaporanModel->allData(),
            'sales' => $this->LaporanModel->tabelsales()
        ];
        return view('laporankeluar.v_laporan', $data);
    }

    // index laporan masuk barang ke dalam persediaan
    public function index2()
    {
        $data = [
            'laporan' => $this->LaporanModel->allData2(),
            'sales' => $this->LaporanModel->tabelsales()
        ];
        return view('laporanmasuk.v_laporanmasuk', $data);
    }


    // buat laporan ambil barang
    public function add()
    {
        $data = [
            'produk' => $this->LaporanModel->allDataProduk()
        ];
        return view('laporankeluar.v_addlaporan', $data);
    }

    // buat laporan barang masuk
    public function add2()
    {
        $data = [
            'produk' => $this->LaporanModel->allDataProduk()
        ];
        return view('laporanmasuk.v_addlaporan', $data);
    }


    // proses laporan ambil barang
    public function proses($id_produk)
    {
        if (!$this->LaporanModel->detailDataProduk($id_produk)) {
            abort(404);
        }
        $data = [
            'produk' => $this->LaporanModel->detailDataProduk($id_produk),
            'sales' => $this->LaporanModel->tabelsales()
        ];
        return view('laporankeluar.v_proseslaporan', $data);
    }

    // proses laporan barang masuk
    public function tambah($id_produk)
    {
        if (!$this->LaporanModel->detailDataProduk($id_produk)) {
            abort(404);
        }
        $data = [
            'produk' => $this->LaporanModel->detailDataProduk($id_produk)
        ];
        return view('laporanmasuk.v_tambahlaporan', $data);
    }

    // proses laporan barang masuk variasi
    public function tambahv($id_produk)
    {
        if (!$this->LaporanModel->detailDataProduk($id_produk)) {
            abort(404);
        }
        $data = [
            'produk' => $this->LaporanModel->detailDataProduk($id_produk)
        ];
        return view('laporanmasuk.v_tambahlaporan2', $data);
    }



    // simpan laporan ambil barang kedalam database
    public function insert()
    {

        // simpan ke dalam table laporan

        $data = [
            'id_produk' => Request()->id_produk,
            'kodeproduk_keluar' => Request()->kodeproduk_keluar,
            'jlhproduk_laporan' => Request()->jlhproduk_laporan,
            'id_sales' => Request()->id_sales,
            'status_laporan' => Request()->status_laporan,
            'tglkeluar_laporan' => Request()->tglkeluar_laporan,
        ];


        $this->LaporanModel->addData($data);


        // pengurangan stok pada table produk
        $id_produk = Request()->id_produk;
        $stoktersedia = Request()->stok_produk;
        $stokkeluar = Request()->jlhproduk_laporan;
        $penguranganstok = (int)$stoktersedia - (int)$stokkeluar;

        $data = [
            'stok_produk' => $penguranganstok
        ];

        $this->LaporanModel->editDataProduk($id_produk, $data);

        return redirect()->route('laporanadd')->with('pesan', 'Laporan berhasil di simpan !!');
    }

    // simpan laporan barang masuk kedalam database
    public function insert2()
    {

        // simpan ke dalam table laporan

        $data = [
            'id_produk' => Request()->id_produk,
            'kodeproduk_masuk' => Request()->kodeproduk_masuk,
            'jlh_masuk' => Request()->jlh_masuk,
            'tgl_masuk' => Request()->tgl_masuk
        ];

        $this->LaporanModel->addData2($data);


        // penambahan stok pada table produk
        $id_produk = Request()->id_produk;
        $stoktersedia = Request()->stok_produk;
        $stokmasuk = Request()->jlh_masuk;
        $penambahanstok = (int)$stoktersedia + (int)$stokmasuk;

        $data = [
            'stok_produk' => $penambahanstok
        ];

        $this->LaporanModel->editDataProduk($id_produk, $data);

        return redirect()->route('laporanmasukadd')->with('pesan', 'Laporan berhasil di simpan !!');
    }

    // simpan laporan barang masuk variasi kedalam database
    public function insertv2()
    {

        // simpan ke dalam table laporan

        $data = [
            'id_produk' => Request()->id_produk,
            'kodeproduk_masuk' => Request()->kodeproduk_masuk,
            'jlh_masuk' => Request()->jlh_masuk,
            'tgl_masuk' => Request()->tgl_masuk
        ];

        $this->LaporanModel->addData2($data);


        // penambahan stok pada table produk
        $id_produk = Request()->id_produk;
        $stoktersedia = Request()->variasi_stok_produk;
        $stokmasuk = Request()->jlh_masuk;
        $penambahanstok = (int)$stoktersedia + (int)$stokmasuk;

        $data = [
            'variasi_produk' => Request()->variasi_produk,
            'variasi_harga' => Request()->variasi_harga,
            'kodeproduk_variasi' => Request()->kodeproduk_masuk,
            'tglmasuk_variasi_produk' => Request()->tgl_masuk,
            'variasi_stok_produk' => $penambahanstok
        ];

        $this->LaporanModel->editDataProduk($id_produk, $data);

        return redirect()->route('laporanmasukadd')->with('pesan', 'Laporan berhasil di simpan !!');
    }



    // proses laporan ambil barang dengan harga supplier berbeda
    public function prosesv($id_produk)
    {
        if (!$this->LaporanModel->detailDataProduk($id_produk)) {
            abort(404);
        }
        $data = [
            'produk' => $this->LaporanModel->detailDataProduk($id_produk),
            'sales' => $this->LaporanModel->tabelsales()
        ];
        return view('laporankeluar.v_proseslaporan2', $data);
    }

    // proses laporan ambil barang dengan harga supplier berbeda
    public function prosesv2($id_produk)
    {
        if (!$this->LaporanModel->detailDataProduk($id_produk)) {
            abort(404);
        }
        $data = [
            'produk' => $this->LaporanModel->detailDataProduk($id_produk),
        ];
        return view('laporanmasuk.v_laporanmasuk2', $data);
    }



    // simpan laporan ambil barang dengan harga supplier berbeda kedalam database
    public function insertv()
    {
        // simpan ke dalam table laporan
        $data = [
            'id_produk' => Request()->id_produk,
            'kodeproduk_keluar' => Request()->kodeproduk_keluar,
            'jlhproduk_laporan' => Request()->jlhproduk_laporan,
            'id_sales' => Request()->id_sales,
            'tglkeluar_laporan' => Request()->tglkeluar_laporan,
            'status_laporan' => Request()->status_laporan,
            'tglkeluar_laporan' => Request()->tglkeluar_laporan,
        ];

        $this->LaporanModel->addData($data);
        // pengurangan stok pada table produk
        $id_produk = Request()->id_produk;
        $stoktersedia = Request()->variasi_stok_produk;
        $stokkeluar = Request()->jlhproduk_laporan;
        $penguranganstok = (int)$stoktersedia - (int)$stokkeluar;
        $data = [
            'variasi_stok_produk' => $penguranganstok
        ];
        $this->LaporanModel->editDataProduk($id_produk, $data);
        return redirect()->route('laporanadd')->with('pesan', 'Laporan berhasil di simpan !!');
    }



    // edit laporan
    public function edit($id_laporan)
    {
        if (!$this->LaporanModel->detailData($id_laporan)) {
            abort(404);
        }

        $data = [
            'laporan' => $this->LaporanModel->detailData($id_laporan)
        ];

        return view('laporankeluar.v_editlaporan', $data);
    }


    public function update($id_laporan)
    {

        $data = [
            'status_laporan' => Request()->status_laporan
        ];

        $this->LaporanModel->editData($id_laporan, $data);

        return redirect()->route('laporan')->with('pesan', 'laporan berhasi di update !!');
    }


    // detele laporan keluar
    public function delete($id_laporan)
    {

        $this->LaporanModel->deleteData($id_laporan);
        return redirect()->route('laporan')->with('pesan', 'laporan berhasil di delete !!');
    }

    // detele laporan masuk
    public function delete2($id_laporan)
    {

        $this->LaporanModel->deleteData2($id_laporan);
        return redirect()->route('laporanmasuk')->with('pesan', 'laporan berhasil di delete !!');
    }
}
