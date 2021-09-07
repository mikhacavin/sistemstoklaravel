<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProdukModel;

class ProdukController extends Controller
{
    public function __construct()
    {
        $this->ProdukModel = new ProdukModel();
        $this->middleware('auth');
    }

    // index halaman produk
    public function index()
    {
        $data = [
            'produk' => $this->ProdukModel->allData(),
            'kategori' => $this->ProdukModel->tableKategori()
        ];
        return view('produk.v_produk', $data);
    }


    // tambah produk
    public function add()
    {
        $data = [
            'kategori' => $this->ProdukModel->tableKategori(),
            'brand' => $this->ProdukModel->tableBrand()
        ];
        return view('produk.v_addproduk', $data);
    }


    // simpan kedalam database
    public function insert()
    {

        Request()->validate([
            'foto_produk' => 'required|mimes:jpg,jpeg,png|max:1024'
        ], [
            'foto_produk.required' => 'foto wajib diisi!',
        ]);

        //jika validasi tidak ada maka data disimpan
        // upload gambar 
        $file = Request()->foto_produk;
        $fileName = Request()->nama_produk . '.' . $file->extension();
        $file->move(public_path('foto_produk'), $fileName);

        $data = [
            'nama_produk' => Request()->nama_produk,
            'kode_produk' => Request()->kode_produk,
            'stok_produk' => Request()->stok_produk,
            'id_kategori' => Request()->id_kategori,
            'id_brand' => Request()->id_brand,
            'foto_produk' => $fileName,
            'harga_produk' => Request()->harga_produk,
            'tglmasuk_produk' => Request()->tglmasuk_produk,
            'lokasi_produk' => Request()->lokasi_produk,
            'variasi_produk' => Request()->variasi_produk,
            'kodeproduk_variasi' => Request()->kodeproduk_variasi,
            'variasi_harga' => Request()->variasi_harga,
            'variasi_stok_produk' => Request()->variasi_stok_produk,
            'tglmasuk_variasi_produk' => Request()->tglmasuk_variasi_produk,
            'deskripsi_produk' => Request()->deskripsi_produk
        ];

        $this->ProdukModel->addData($data);
        return redirect()->route('produk')->with('pesan', 'Produk berhasi di tambahkan !!');
    }



    // edit produk
    public function edit($id_produk)
    {
        if (!$this->ProdukModel->detailData($id_produk)) {
            abort(404);
        }

        $data = [
            'produk' => $this->ProdukModel->detailData($id_produk),
            'kategori' => $this->ProdukModel->tableKategori(),
            'brand' => $this->ProdukModel->tableBrand()
        ];

        return view('produk.v_editproduk', $data);
    }


    // simpan produk yang telah diupdate
    public function update($id_produk)
    {

        Request()->validate([
            'foto_guru' => 'mimes:jpg,jpeg,png|max:1024'
        ]);

        //jika validasi tidak ada maka data disimpan
        if (Request()->foto_produk <> "") {
            //jika ingin ganti foto
            //upload gambar
            $file = Request()->foto_produk;
            $fileName = Request()->nama_produk . '.' . $file->extension();
            $file->move(public_path('foto_produk'), $fileName);

            $data = [
                'nama_produk' => Request()->nama_produk,
                'kode_produk' => Request()->kode_produk,
                'stok_produk' => Request()->stok_produk,
                'id_kategori' => Request()->id_kategori,
                'id_brand' => Request()->id_brand,
                'foto_produk' => $fileName,
                'harga_produk' => Request()->harga_produk,
                'tglmasuk_produk' => Request()->tglmasuk_produk,
                'lokasi_produk' => Request()->lokasi_produk,
                'variasi_produk' => Request()->variasi_produk,
                'kodeproduk_variasi' => Request()->kodeproduk_variasi,
                'variasi_harga' => Request()->variasi_harga,
                'variasi_stok_produk' => Request()->variasi_stok_produk,
                'tglmasuk_variasi_produk' => Request()->tglmasuk_variasi_produk,
                'deskripsi_produk' => Request()->deskripsi_produk
            ];

            $this->ProdukModel->editData($id_produk, $data);
        } else {
            //jika tidak ingin ganti foto
            $data = [
                'nama_produk' => Request()->nama_produk,
                'kode_produk' => Request()->kode_produk,
                'stok_produk' => Request()->stok_produk,
                'id_kategori' => Request()->id_kategori,
                'id_brand' => Request()->id_brand,
                'harga_produk' => Request()->harga_produk,
                'tglmasuk_produk' => Request()->tglmasuk_produk,
                'lokasi_produk' => Request()->lokasi_produk,
                'variasi_produk' => Request()->variasi_produk,
                'kodeproduk_variasi' => Request()->kodeproduk_variasi,
                'variasi_harga' => Request()->variasi_harga,
                'variasi_stok_produk' => Request()->variasi_stok_produk,
                'tglmasuk_variasi_produk' => Request()->tglmasuk_variasi_produk,
                'deskripsi_produk' => Request()->deskripsi_produk
            ];
            $this->ProdukModel->editData($id_produk, $data);
        }


        return redirect()->route('produk')->with('pesan', 'data berhasi di update !!');
    }


    // detele produk
    public function delete($id_produk)
    {
        //hapus foto
        $produk = $this->ProdukModel->detailData($id_produk);
        if ($produk->foto_produk <> "") {
            unlink(public_path('foto_produk') . '/' . $produk->foto_produk);
        }

        $this->ProdukModel->deleteData($id_produk);
        return redirect()->route('produk')->with('pesan', 'data berhasi di delete !!');
    }
}
