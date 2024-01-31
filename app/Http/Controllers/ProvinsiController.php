<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use Illuminate\Http\Request;

class ProvinsiController extends Controller
{
    public function index()
    {
        $data = Provinsi::paginate(); //ambil

        //tampil data
        return view('provinsi.index',[
            'title' => 'Daftar Provinsi',
            'data' => $data
        ]);
    }

    public function create()
    {
        return view('provinsi.create');
    }

    public function store(Request $request)
    {
        $provinsi = Provinsi::create([
            'kode_provinsi' => $request->kode,
            'nama_provinsi' => $request->nama,
        ]);

        if($provinsi){
            return redirect('danramil/provinsi');
        } else {
            return redirect('danramil/provinsi/create');
        }
    }

    public function edit($id)
    {
        $data = Provinsi::findOrFail($id);
        return view('provinsi.edit',[
            'title' => 'Edit Data Provinsi',
            'data' => $data
        ]);
    }

    public function update($id, Request $request)
    {
        $data =Provinsi::findOrFail($id);
        $data->kode_provinsi = $request->kode ?? '';
        $data->nama_provinsi = $request->nama ?? '';
        $update = $data->save();

        if($update){
            return redirect('danramil/provinsi');
        }else {
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        $provinsi = Provinsi::findOrFail($id);
        $provinsi->delete(); //proses hapus data

        return redirect()->back(); //routing kembali
    }
}
