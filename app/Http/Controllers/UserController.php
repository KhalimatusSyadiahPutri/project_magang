<?php

namespace App\Http\Controllers;

use App\Exports\AnggotaExport;
use App\Models\Jabatan;
use App\Models\Pangkat;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function index(Request $request)
    {

        $data = User::with('jabatan')->with('pangkat')->with('percabangan')->select();
        $search = request()->get('search', []);
        foreach ($search as $key => $value) {
            $data->where($key, 'like', '%' . $value . '%');
        }

        return view('anggota.index', [
            'title' => 'Daftar Anggota',
            'data' => $data->paginate()
        ]);
    }

    // fungsi untuk membuka form tambah anggota
    public function create()
    {
        return view('anggota.form-create', [
            'title' => 'Form Tambah Anggota'
        ]);
    }

    // fungsi untuk simpan data
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'nama_lengkap' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'id_pangkat' => 'required',
            'id_jabatan' => 'required'
        ], [
            'email.unique' => 'Email Telah Digunakan'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'nama_lengkap' => $request->nama_lengkap,
            'id_pangkat'  => $request->id_pangkat,
            'id_jabatan'  => $request->id_jabatan,
            'nrp'  => $request->nrp,
            'nomor_telepon'  => $request->nomor_telepon,
            'id_percabangan' => $request->id_percabangan,
        ]);

        return redirect(auth()->user()->jabatan->name . '/anggota')->with('berhasil', 'Anggota Berhasil Ditambahkan');
    }

    // fungsi untuk membuka form edit anggota
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('anggota.from-edit', [
            'title' => 'Form Edit Anggota',
            'data' => $user
        ]);
    }

    // fungsi untuk update data
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'nama_lengkap' => 'required',
            'email' => 'required|email',
            'id_pangkat' => 'required',
            'id_jabatan' => 'required',
        ], [
            'email.unique' => 'Email Telah Digunakan'
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->nama_lengkap = $request->nama_lengkap;
        $user->id_pangkat = $request->id_pangkat;
        $user->id_jabatan = $request->id_jabatan;
        $user->nrp = $request->nrp;
        $user->nomor_telepon = $request->nomor_telepon;
        $user->id_percabangan = $request->id_percabangan;

        if ($request->password != null) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect(auth()->user()->jabatan->name . '/anggota')->with('berhasil', 'Anggota Berhasil Diperbarui');
    }

    public function delete($id)
    {
        User::findOrFail($id)->delete($id);
        return redirect(auth()->user()->jabatan->name . '/anggota')->with('berhasil', 'Anggota Berhasil Dihapus');
    }

    public function exportExcel()
    {
        return Excel::download(new AnggotaExport, 'excel-anggota-' . Carbon::now()->format('Y-m-d') . '.xlsx');
    }

    public function printPdf (Request $request)
    {
        $filterKey      = $request->get('filter-key', null);
        $filterValue    = $request->get('filter-value', null);

        $data = User::select();

        if ($filterKey != null) {
            $data->orderBy($filterKey, $filterValue);
        }

        $pdf = Pdf::loadView('anggota.cetak', ['dataUrut' => $data->get()]);
        $pdf->setPaper('A4', 'Landscape');
        return $pdf->stream('cetak-anggota-' . Carbon::now()->format('Y-m-d') . '.pdf');
    }
}