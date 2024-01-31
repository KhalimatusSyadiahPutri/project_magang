<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Pangkat;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $data = Jabatan::select();

        $search = request()->get('search', []);
        foreach ($search as $key => $value) {
            $data->where($key, 'like', '%' . $value . '%');
        }

        // tampilan
        return view('jabatan.index', [
            'title' => 'Daftar Jabatan',
            'data' => $data->paginate()
        ]);
    }

    public function create()
    {
        return view('jabatan.create');
    }

    public function store(Request $request)
    {
        $jabatan = Jabatan::create([
            'nama_jabatan' => $request->nama_jabatan
        ]);

        if ($jabatan) {
            return redirect(auth()->user()->jabatan()->first()->name . '/jabatan');
        } else {
            return redirect()->back()->with('success', 'sukses');
        }
    }

    public function edit($id)
    {
        $data = Jabatan::findOrFail($id); // ambil data

        // tampil form edit data
        return view('position.edit', [
            'title' => 'Edit Data',
            'data' => $data
        ]);
    }

    public function update($id, Request $request)
    {
        $data = Jabatan::findOrFail($id); // cari dulu data nya
        $data->nama_jabatan = $request->nama_jabatan ?? ''; // ganti dengan data baru
        $update = $data->save(); // simpan datanya

        if ($update) {
            return redirect('danramil/jabatan');
        } else {
            return redirect()->back()->with('success', 'sukses');
        }
    }

    public function destroy($id)
    {
        $jabatan = Jabatan::findOrFail($id);
        $jabatan->delete(); // model dan proses hapus data

        return redirect()->back()->with('success', 'sukses'); // routing kembali
    }
}