<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\SuratKeluarModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class SuratKeluarController extends Controller
{
    public function index()
    {
        $data = array(
            'surat-keluar' => SuratKeluarModel::with('user_rol')->get(),
            'user' => User::all(),
        );
        return view('Admin.SuratKeluar')->with('data', $data);
    }

    public function store(Request $request)
    {
        $validation = Validator::make(
            $request->all(),
            [
                'no_surat' => 'required',
                'tgl_keluar' => 'required',
                'user_id' => 'required',
                'perihal' => 'required',
                'sifat' => 'required',
                'lampiran' => 'required',
                'alamat' => 'required',
                'file_surat' => 'required',
            ],
            [
                'required' => 'Data Tidak Boleh Kosong',
            ]
        );
        if ($validation->fails()) {
            $msg = $validation->errors()->first();
            Alert::error('Gagal', $msg);
            return redirect()->back();
        }
        $data = new SuratKeluarModel();
        $data->no_surat = $request->input('no_surat');
        $data->tgl_keluar = $request->input('tgl_keluar');
        $data->user_id = $request->input('user_id');
        $data->perihal = $request->input('perihal');
        $data->sifat = $request->input('sifat');
        $data->lampiran = $request->input('lampiran');
        $data->alamat = $request->input('alamat');
        if ($request->hasfile('file_surat')) {
            $file = $request->file('file_surat');
            $filename = $file->getClientOriginalName();
            $file->move('uploads/suratkeluar/', $filename);
            $data->file_surat = $filename;
        }

        $data->save();

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
        $respon = SuratKeluarModel::where('id', $id)
            ->with('user_rol')->first();
        return response()->json($respon);
    }

    public function update(Request $request, $id)
    {

        $validation = Validator::make(
            $request->all(),
            [
                'no_surat' => 'required',
                'tgl_keluar' => 'required',
                'user_id' => 'required',
                'perihal' => 'required',
                'sifat' => 'required',
                'lampiran' => 'required',
                'alamat' => 'required',

            ],
            [
                'required' => 'Data Tidak Boleh Kosong',
            ]
        );

        if ($validation->fails()) {
            $msg = $validation->errors()->first();
            Alert::error('Gagal', $msg);
            return redirect()->back();
        }


        $data = SuratKeluarModel::where('id', $id)->first();
       
        $file_surat_cache = $data->file_surat;

        $data->no_surat = $request->input('no_surat');
        $data->tgl_keluar = $request->input('tgl_keluar');
        $data->user_id = $request->input('user_id');
        $data->perihal = $request->input('perihal');
        $data->sifat = $request->input('sifat');
        $data->lampiran = $request->input('lampiran');
        $data->alamat = $request->input('alamat');
        $data->file_surat = $request->input('file_surat');
        if ($request->hasfile('file_surat')) {
            $destination = 'uploads/suratkeluar/' . $data->file_surat;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('file_surat');
            $filename = $file->getClientOriginalName();
            $file->move('uploads/suratkeluar/', $filename);
            $data->file_surat = $filename;
        }
       
        if ($request->input('file_surat') == null) {
            $data->file_surat = $file_surat_cache;
        }
        $data->update();
        if ($data) {
            Alert::success('Behasil', 'Data Berhasil Di Diperbaharui');
            return back();
        } else {
            Alert::error('Gagal', 'Mohon periksa kembali inputan anda');
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $data = SuratKeluarModel::find($id);
        $destination = 'uploads/suratkeluar/' . $data->file_surat;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $data->delete();
        Alert::success('Behasil', 'Data Berhasil Di Hapus');
        return redirect()->back();
    }
    public function download($id)
    {
        return response()->download('uploads/suratkeluar/' . $id);
    }
}
