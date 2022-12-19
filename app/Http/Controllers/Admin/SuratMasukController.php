<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\SuratMasukModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class SuratMasukController extends Controller
{
    public function index()
    {
        $data = SuratMasukModel::all();
        return view('Admin.SuratMasuk')->with('data', $data);
    }

    public function store(Request $request)
    {
        $validation = Validator::make(
            $request->all(),
            [
                'no_surat' => 'required',
                'tgl_masuk' => 'required',
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
        $data = new SuratMasukModel();
        $data->no_surat = $request->input('no_surat');
        $data->tgl_masuk = $request->input('tgl_masuk');
        $data->perihal = $request->input('perihal');
        $data->sifat = $request->input('sifat');
        $data->lampiran = $request->input('lampiran');
        $data->alamat = $request->input('alamat');
        if ($request->hasfile('file_surat')) {
            $file = $request->file('file_surat');
            $filename = $file->getClientOriginalName();
            $file->move('uploads/suratmasuk/', $filename);
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
        $respon = SuratMasukModel::find($id);
        return response()->json($respon);
    }

    public function updateData(Request $request)
    {
        $validation = Validator::make(
            $request->all(),
            [
                'no_surat' => 'required',
                'tgl_masuk' => 'required',
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

        $data = SuratMasukModel::find($request->id);
        $data->no_surat = $request->input('no_surat');
        $data->tgl_masuk = $request->input('tgl_masuk');
        $data->perihal = $request->input('perihal');
        $data->sifat = $request->input('sifat');
        $data->lampiran = $request->input('lampiran');
        $data->alamat = $request->input('alamat');

        if ($request->hasfile('file_surat')) {
            $destination = 'uploads/suratmasuk/' . $data->file_surat;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('file_surat');
            $filename = $file->getClientOriginalName();
            $file->move('uploads/suratmasuk/', $filename);
            $data->file_surat = $filename;
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

    public function delete($id)
    {
        $data = SuratMasukModel::find($id);
        $destination = 'uploads/suratmasuk/' . $data->file_surat;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $data->delete();
        Alert::success('Behasil', 'Data Berhasil Di Hapus');
        return redirect()->back();
    }
    public function download($id)
    {
        return response()->download('uploads/suratmasuk/' . $id);
    }
}
