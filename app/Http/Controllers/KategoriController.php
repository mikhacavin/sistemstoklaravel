<?php

namespace App\Http\Controllers;

use App\Models\KategoriModel;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function __construct()
    {
        $this->KategoriModel = new KategoriModel();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'kategori' => $this->KategoriModel->allData()
        ];
        return view('kategori.v_kategori', $data);
    }

    public function add()
    {
        return view('kategori.v_addkategori');
    }

    public function insert()
    {

        Request()->validate(
            [
                'nama_kategori' => 'required|unique:tbl_kategori,nama_kategori|min:2|max:18',
            ],
            [
                'nama_kategori.required' => 'wajib diisi!',
                'nama_kategori.unique' => 'kategori sudah ada!',
            ]
        );

        $data = [
            'nama_kategori' => Request()->nama_kategori,
        ];

        $this->KategoriModel->addData($data);
        return redirect()->route('kategori')->with('pesan', 'Kategori berhasil di tambahkan !!');
    }

    public function edit($id_kategori)
    {
        if (!$this->KategoriModel->detailData($id_kategori)) {
            abort(404);
        }

        $data = [
            'kategori' => $this->KategoriModel->detailData($id_kategori)
        ];

        return view('kategori.v_editkategori', $data);
    }


    public function update($id_kategori)
    {

        Request()->validate([
            'nama_kategori' => 'required|unique:tbl_kategori,nama_kategori|min:2',
        ], [
            'nama_kategori.required' => 'wajib diisi!',
            'nama_kategori.unique' => 'kategori sudah ada!'
        ]);

        $data = [
            'nama_kategori' => Request()->nama_kategori
        ];

        $this->KategoriModel->editData($id_kategori, $data);

        return redirect()->route('kategori')->with('pesan', 'Kategori berhasi di update !!');
    }

    public function delete($id_kategori)
    {

        $this->KategoriModel->deleteData($id_kategori);
        return redirect()->route('kategori')->with('pesan', 'Kategori berhasil di delete !!');
    }
}
