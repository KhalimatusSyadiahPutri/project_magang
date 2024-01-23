<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    public function index()
    {
        $data = Kecamatan::paginate();
        return view('kecamatan.index',[
            'title' => 'Daftar Kecamatan',
            'data' => $data
        ]);
    }

    public function create()
    {
        return view('kecamatan.create');
    }

    public function store(Request $request)
    {
        $kecamatan = Kecamatan::create([
            'kode_kecamatan'=>$request->kode_kecamatan,
            'nama_kecamatan'=>$request->nama_kecamatan,
            'id_provinsi'=> $request->id_provinsi,
            'id_kota'=>$request->id_kota,
        ]);

        if($kecamatan){
            return redirect('danramil/kecamatan');
        }else {
            return redirect('danramil/kecamatan/create');
        }
    }

    public function edit($id)
    {
        $data = Kecamatan::findOrFail($id);
        return view('kota.edit',[
            'title' => 'Edit Data Kecamatan',
            'data' => $data
        ]);
    }

    public function update($id, Request $request)
    {
        $data = Kecamatan::findOrFail($id);
        $data->kode_kecamatan = $request->kode_kecamatan;
        $data->nama_kecamatan = $request->nama_kecamatan;
        $data->id_provinsi = $request->id_provinsi;
        $data->id_kota = $request->id_kota;
        $update = $data->save();

        if($update){
            return redirect('danramil/kecamatan');
        }else {
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        $kecamatan = Kecamatan::findOrFail($id);
        $kecamatan->delete();

        return redirect()->back();
    }

    public function indexAjax ($id)
    {
        $kecamatan = Kecamatan::where('id_kota', $id)->get();
        return $kecamatan;
    }
}