<?php

namespace App\Http\Controllers;

use App\Models\Jabatan; // Pastikan namespace model Jabatan sudah diimpor
use Illuminate\Http\Request;

class JabatanController extends Controller
{
     public function index()
     {
        $data = Jabatan::paginate(); //Ambil data

        // tampilan
        return view('jabatan.index', [
            'title' => 'Daftar Jabatan Anggota',
            'data' => $data  // Perbaiki variabel yang dikirimkan ke view
        ]);
    }
    public function create()
    {
        return view('jabatan.create');
    }

    public function store(Request $request)
    {
        $jabatan = Jabatan::create([
            'nama_jabatan' => $request->nama
        ]);

        if ($jabatan) {
            return redirect('danramil/jabatan');
        } else{
            return redirect('danramil/jabatan/create');
        }
    }

    public function edit($id)
    {
        $data = Jabatan::findOrFail($id);
        return view('jabatan.edit',[
            'title' => 'Edit Data Jabatan',
            'data' => $data
        ]);
    }

    public function update($id, Request $request)
    {
        $data =Jabatan::findOrFail($id);
        $data->nama_jabatan = $request->nama ?? '';
        $update = $data->save();

        if($update){
            return redirect('danramil/jabatan');
        }else {
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        $jabatan = Jabatan::findOrFail($id);
        $jabatan->delete(); //model dan proses hapus data

        return redirect()->back(); //Routing kembali
    }
}