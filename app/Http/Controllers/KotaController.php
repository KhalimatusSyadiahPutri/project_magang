<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use Illuminate\Http\Request;

class KotaController extends Controller
{
    public function index()
    {
        $data = Kota::with("provinsi")->paginate();
        return view('kota.index',[
            'title' => 'Daftar Kota',
            'data' => $data
        ]);
    }

    public function create()
    {
        return view('kota.create');
    }

    public function store(Request $request)
    {
        $kota = Kota::create([
            'kode_kota' => $request->kode_kota,
            'nama_kota' => $request->nama_kota,
            'id_provinsi' => $request->id_provinsi,
        ]);

        if($kota){
            return redirect('danramil/kota');
        }else {
            return redirect('danramil/kota/create');
        }
    }

    public function edit($id)
    {
        $data = Kota::findOrFail($id);
        return view('kota.edit',[
            'title' => 'Edit Data Kota',
            'data' => $data
        ]);
    }

    public function update($id, Request $request)
    {
        $data = Kota::findOrFail($id);
        $data->nama_kota = $request->nama_kota;
        $data->id_provinsi = $request->id_provinsi;
        $update =$data->save();

        if($update){
            return redirect('danramil/kota');
        }else {
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        $kota = Kota::findOrFail($id);
        $kota->delete();

        return redirect()->back();
    }


    public function indexAjax($id_provinsi)
    {
        $kabupaten = Kota::where('id_provinsi', $id_provinsi)->get();
        return $kabupaten;
    }
}
