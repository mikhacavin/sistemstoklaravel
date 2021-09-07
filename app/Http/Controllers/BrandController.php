<?php

namespace App\Http\Controllers;

use App\Models\BrandModel;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->BrandModel = new BrandModel();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'brand' => $this->BrandModel->allData()
        ];
        return view('brand.v_brand', $data);
    }

    public function add()
    {
        return view('brand.v_addbrand');
    }

    public function insert()
    {

        Request()->validate(
            [
                'nama_brand' => 'required|unique:tbl_brand,nama_brand|min:2|max:18',
            ],
            [
                'nama_brand.required' => 'wajib diisi!',
                'nama_brand.unique' => 'brand sudah ada!',
            ]
        );

        $data = [
            'nama_brand' => Request()->nama_brand,
        ];

        $this->BrandModel->addData($data);
        return redirect()->route('brand')->with('pesan', 'Brand berhasil di tambahkan !!');
    }

    public function edit($id_brand)
    {
        if (!$this->BrandModel->detailData($id_brand)) {
            abort(404);
        }

        $data = [
            'brand' => $this->BrandModel->detailData($id_brand)
        ];

        return view('brand.v_editbrand', $data);
    }


    public function update($id_brand)
    {

        Request()->validate([
            'nama_brand' => 'required|unique:tbl_brand,nama_brand|min:2',
        ], [
            'nama_brand.required' => 'wajib diisi!',
            'nama_brand.unique' => 'brand sudah ada!'
        ]);

        $data = [
            'nama_brand' => Request()->nama_brand
        ];

        $this->BrandModel->editData($id_brand, $data);

        return redirect()->route('brand')->with('pesan', 'Brand berhasi di update !!');
    }

    public function delete($id_brand)
    {

        $this->BrandModel->deleteData($id_brand);
        return redirect()->route('brand')->with('pesan', 'brand berhasil di delete !!');
    }
}
