<?php

namespace App\Http\Controllers;

use App\Models\Pangkat;
use Illuminate\Http\Request;

class PangkatController extends Controller
{
    public function index()
    {
        $data = Pangkat::paginate(); //ambil data

        //tampil data
        return view('pangkat.index', [
            'title' => 'Daftar Pangkat',
            'data' => $data
        ]);
    }

    public function create()
    {
        return view('pangkat.create');
    }

    public function store(Request $request)
    {
        $pangkat = Pangkat::create([
            'nama_pangkat' => $request->nama
        ]);

        if ($pangkat){
            return redirect('danramil/pangkat');
        }else {
            return redirect('danramil/pangkat/create');
        }
    }

    public function edit($id)
    {
        $data = Pangkat::findOrFail($id);
        return view('pangkat.edit',[
            'title' => 'Edit Data Pangkat',
            'data' => $data
        ]);
    }

    public function update($id, Request $request)
    {
        $data = Pangkat::findOrFail($id);
        $data->nama_pangkat =$request->nama ??'';
        $update = $data->save();

        if($update){
            return redirect('danramil/pangkat');
        }else {
            return redirect->back();
        }
    }

    public function delete($id)
    {
        $pangkat = Pangkat::findOrFail($id);
        $pangkat->delete(); //model dan proses hapus

        return redirect()->back(); //routing kembali
    }
}