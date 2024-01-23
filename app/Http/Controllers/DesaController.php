<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use Illuminate\Http\Request;

class DesaController extends Controller
{
    public function index()
    {
       $data = Desa::paginate(); //Ambil data

       // tampilan
       return view('desa.index', [
           'title' => 'Daftar Desa',
           'data' => $data  // Perbaiki variabel yang dikirimkan ke view
       ]);
   }
   public function create()
   {
       return view('desa.create');
   }

   public function store(Request $request)
   {
       $desa = Desa::create([
           'nama_desa' => $request->nama_desa
       ]);

       if ($desa) {
           return redirect('danramil/desa');
       } else{
           return redirect('danramil/desa/create');
       }
   }

   public function edit($id)
   {
       $data = Jabatan::findOrFail($id);
       return view('desa.edit',[
           'title' => 'Edit Data Jabatan',
           'data' => $data
       ]);
   }

}