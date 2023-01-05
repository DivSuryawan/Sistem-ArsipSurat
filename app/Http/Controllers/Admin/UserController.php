<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $data = User::all();
        return view('Admin.User')->with('data', $data);
    }
    public function store(Request $request)
    {
        $validation = Validator::make(
            $request->all(),
            [
                'name' => 'required|min:3',
                'status' => 'required',
                'email' => 'required',
                'password' => 'required',
            ],
            [
                'required' => 'Data Tidak Boleh Kosong',

            ]
        );

        if ($validation->fails()) {
            $msg = $validation->errors()->first();
            Alert::error('Gagal', $msg);
            return redirect()
                ->back();
        }
       

        try {
            //code...
            $data = new User();
            $data->name = $request->name;
            $data->status = $request->status;
            $data->email = $request->email;
            $data->password = bcrypt($request->password);
            $data->save();
        } catch (\Throwable $th) {
            //throw $th;
            Alert::error('Gagal', 'Email tidak boleh sama');
            return redirect()->back();
        }

        if ($data) {
            Alert::success('Behasil', 'Data Berhasil Di Tambahkan');
            return back();
        } else {
            Alert::error('Gagal', 'Mohon periksa kembali inputan anda');
            return redirect()->back();
        }
    }
    public function edit($id)
    {
        $respon = User::find($id);
        return response()->json($respon);
    }
    public function update(Request $request)
    {
        $validation = Validator::make(
            $request->all(),
            [
                'name' => 'required|min:3',
                'status' => 'required',
                'email' => 'required',
                
            ],
            [
                'required' => 'data tidak boleh kosong',
            ]

        );

        if ($validation->fails()) {
            $msg = $validation->errors()->first();
            Alert::error('Gagal', $msg);
            return redirect()->back();
        }


        try {
            $data = User::find($request->id);
            $data->name = $request->input('name');
            $data->status = $request->input('status');
            $data->email = $request->input('email');
            $data->password = bcrypt($request->input('password'));
            $data->update();
        } catch (\Throwable $th) {
            //throw $th;
            Alert::error('Gagal', 'Email tidak boleh sama');
            return redirect()->back();
        }
        if ($data) {
            Alert::success('Behasil', 'Admin berhasil Di Update ');
            return redirect()->back();
        } else {
            Alert::error('Gagal', 'Mohon periksa kembali inputan anda');
            return redirect()->back();
        }
    }
    public function destroy($id)
    {
        User::whereId($id)->delete();
        Alert::success('Behasil', 'Data Berhasil Di Hapus');
        return redirect()->back();
    }
}
