<?php

namespace App\Http\Controllers;

use App\Models\WilayahPenugasan;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Laravolt\Indonesia\Models\Kecamatan;

class WilayahPenugasanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data   = WilayahPenugasan::select();
        $search = request('search', false);
        if ($search) {
            $data->whereHas('anggota', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })->orwhereHas('kecamatan', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            });
        }

        if (request()->get('cetak', null) == 1) {
            $pdf = Pdf::loadView('wilayah_penugasan.pdf', ['data' => $data->get()]);
            $pdf->setPaper('A4', 'Landscape');
            return $pdf->stream('cetak-laporan-penugasan-' . Carbon::now()->format('Y-m-d') . '.pdf');
        }

        return view('wilayah_penugasan.index', [
            'title' => 'Penugasan Petugas',
            'data' => $data->simplePaginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('wilayah_penugasan.create', [
            'title' => 'Tambah Wilayah Penugasan',
            'data' => null,
            'kecamatan' => Kecamatan::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        WilayahPenugasan::create($request->all());
        return redirect()->route(auth()->user()->jabatan->name . '.wilayah-penugasan.index')->with('success', 'Sukses');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('wilayah_penugasan.edit', [
            'title' => 'Ubah Wilayah Penugasan',
            'data' => WilayahPenugasan::findOrFail($id),
            'kecamatan' => Kecamatan::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        WilayahPenugasan::findOrFail($id)->update($request->all());
        return redirect()->route(auth()->user()->jabatan->name . '.wilayah-penugasan.index')->with('success', 'sukses');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        WilayahPenugasan::findOrFail($id)->delete();
        return redirect()->route(auth()->user()->jabatan->name . '.wilayah-penugasan.index')->with('success', 'sukses');
    }
}
