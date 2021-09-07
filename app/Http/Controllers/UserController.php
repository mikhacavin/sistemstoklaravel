<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;

class UserController extends Controller
{
    public function __construct()
    {
        $this->UserModel = new UserModel();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'user' => $this->UserModel->allData()
        ];
        return view('user.v_user', $data);
    }

    public function edit($id)
    {
        if (!$this->UserModel->detailData($id)) {
            abort(404);
        }

        $data = [
            'user' => $this->UserModel->detailData($id)
        ];

        return view('user.v_useredit', $data);
    }


    public function update($id)
    {

        $data = [
            'level' => Request()->level,
        ];

        $this->UserModel->editData($id, $data);

        return redirect()->route('user')->with('pesan', 'user berhasi di update !!');
    }
}
