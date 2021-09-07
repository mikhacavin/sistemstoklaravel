<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SalesModel;

class SalesController extends Controller
{
    public function __construct()
    {
        $this->SalesModel = new SalesModel();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'sales' => $this->SalesModel->allData()
        ];
        return view('sales.v_sales', $data);
    }

    public function add()
    {
        return view('sales.v_addsales');
    }

    public function insert()
    {

        Request()->validate(
            [
                'nama_sales' => 'required|unique:tbl_sales,nama_sales|min:2|max:18',
            ],
            [
                'nama_sales.required' => 'wajib diisi!',
                'nama_sales.unique' => 'sales sudah ada!',
            ]
        );

        $data = [
            'nama_sales' => Request()->nama_sales,
        ];

        $this->SalesModel->addData($data);
        return redirect()->route('sales')->with('pesan', 'sales berhasil di tambahkan !!');
    }

    public function edit($id_sales)
    {
        if (!$this->SalesModel->detailData($id_sales)) {
            abort(404);
        }

        $data = [
            'sales' => $this->SalesModel->detailData($id_sales)
        ];

        return view('sales.v_editsales', $data);
    }


    public function update($id_sales)
    {

        Request()->validate([
            'nama_sales' => 'required|unique:tbl_sales,nama_sales|min:2',
        ], [
            'nama_sales.required' => 'wajib diisi!',
            'nama_sales.unique' => 'Sales sudah ada!'
        ]);

        $data = [
            'nama_sales' => Request()->nama_sales
        ];

        $this->SalesModel->editData($id_sales, $data);

        return redirect()->route('sales')->with('pesan', 'Sales berhasi di update !!');
    }

    public function delete($id_sales)
    {

        $this->SalesModel->deleteData($id_sales);
        return redirect()->route('sales')->with('pesan', 'Sales berhasil di delete !!');
    }
}
