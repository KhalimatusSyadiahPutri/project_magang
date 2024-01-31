<?php

namespace App\Http\Controllers;

use App\Models\Pangkat;
use Illuminate\Http\Request;

class PangkatController extends Controller
{
    public function index()
    {
        $pangkat = Pangkat::select();

        $search = request()->get('search', []);
        foreach ($search as $key => $value) {
            $pangkat->where($key, 'like', '%' . $value . '%');
        }

        return view('pangkat.index', [
            'title' => 'Daftar Pangkat Anggota',
            'data' => $pangkat->paginate()
        ]);
    }

    public function create()
    {
        return view('pangkat.create', [
            'title' => 'Tambah Pangkat',
            'data' => null
        ]);
    }

    public function store(Request $request)
    {
        Pangkat::create($request->all());
        return redirect()->route('admin.pangkat.index')->with('success', 'sukses');
    }

    public function edit($id)
    {
        return view('pangkat.edit', [
            'title' => 'Ubah Pangkat',
            'data' => Pangkat::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        Pangkat::findOrFail($id)->update($request->all());
        return redirect()->route('admin.pangkat.index')->with('success', 'sukses');
    }

    public function destroy($id)
    {
        Pangkat::findOrFail($id)->delete();
        return redirect()->route('admin.pangkat.index')->with('success', 'sukses');
    }
}