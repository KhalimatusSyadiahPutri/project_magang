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

                        <form method="post" action="{{ url('danramil/kecamatan/' . $data->id . '/update') }}">
                            @method('PUT')
                            @csrf

                            <div class="form-group">
                                <label for="kode_kecamatan">Kode Kecamatan</label>
                                <input type="text" name="kode_kecamatan" id="kode_kecamatan" class="form-control"
                                    placeholder="Masukan Kode Kecamatan" value="{{ $data->kode_kecamatan }}">
                            </div>

                            <div class="form-group">
                                <label for="nama_kecamatan">Nama Kecamatan</label>
                                <input type="text" name="nama_kecamatan" id="nama_kecamatan" class="form-control"
                                    placeholder="Masukan Nama Kecamatan" value="{{ $data->nama_kecamatan }}">
                            </div>

                            <div class="form-group">
                                <label for="id_provinsi">ID Provinsi</label>
                                <select name="id_provinsi" id="id_provinsi" class="form-control">
                                    @foreach (\App\Models\Provinsi::all() as $provinsi)
                                        <option value="{{ $provinsi->id }}"
                                            {{ $provinsi->id == $data->id_provinsi ? 'selected' : '' }}>
                                            {{ $provinsi->kode_provinsi }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="id_kota">ID Kota</label>
                                <select name="id_kota" id="id_kota" class="form-control">
                                    @foreach (\App\Models\Kota::all() as $kota)
                                        <option value="{{ $kota->id }}"
                                            {{ $kota->id == $data->id_kota ? 'selected' : '' }}>
                                            {{ $kota->kode_kota }}</option>
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
