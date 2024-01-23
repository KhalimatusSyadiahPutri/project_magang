@extends('layouts.admin')

@section('title', $title ?? '')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $title ?? 'Tambah Jabatan Baru ' }}</h1>
            </div>

            <div class="section-body">

                <div class="card">
                    <div class="card-body">

                        @include('components.alert')

                        <form method="post" action="{{ url('danramil/kota/store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="kode_kota">Kode Kota</label>
                                <input type="text" name="kode_kota" id="kode_kota" class="form-control"
                                    placeholder="Masukan Nama Kota">
                            </div>
                            <div class="form-group">
                                <label for="nama_kota">Nama Kota</label>
                                <input type="text" name="nama_kota" id="nama_kota" class="form-control"
                                    placeholder="Masukan Nama Kota">
                            </div>
                            <div class="form-group">
                                <label for="id_provinsi">ID Provinsi</label>
                                <select name="id_provinsi" id="id_provinsi" class="form-control">
                                    @foreach (\App\Models\Provinsi::all() as $provinsi)
                                        <option value="{{ $provinsi->id }}">{{ $provinsi->kode_provinsi }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success">Simpan Data Anggota</button>

                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
