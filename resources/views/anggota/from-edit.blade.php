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

                        <form method="post" action="{{ url('danramil/anggota/' . $data->id . '/update') }}">
                            @method('PATCH')
                            @csrf

                            <div class="form-group">
                                <label for="name">Nama Pengguna</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    placeholder="Masukan Nama Pengguna" value="{{ $data->name }}">
                            </div>

                            <div class="form-group">
                                <label for="nama_lengkap">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control"
                                    placeholder="Masukan Nama Lengkap" value="{{ $data->nama_lengkap }}">
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" class="form-control"
                                    placeholder="Masukan E-mail" value="{{ $data->email }}">
                            </div>

                            <div class="form-group">
                                <label for="id_pangkat">Pangkat</label>
                                <select name="id_pangkat" id="id_pangkat" class="form-control">
                                    @foreach (\App\Models\Pangkat::all() as $pangkat)
                                        <option value="{{ $pangkat->id }}"
                                            {{ $pangkat->id == $data->id_pangkat ? 'selected' : '' }}>
                                            {{ $pangkat->nama_pangkat }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="id_jabatan">Jabatan</label>
                                <select name="id_jabatan" id="id_jabatan" class="form-control">
                                    @foreach (\App\Models\Jabatan::all() as $jabatan)
                                        <option value="{{ $jabatan->id }}"
                                            {{ $jabatan->id == $data->id_pangkat ? ' selected' : '' }}>
                                            {{ $jabatan->nama_jabatan }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="nrp">NRP</label>
                                <input type="text" name="nrp" id="nrp" class="form-control"
                                    placeholder="Masukan NRP" value="{{ $data->nrp }}">
                            </div>
                            <div class="form-group">
                                <label for="nomor_telepon">Nomor Telepon</label>
                                <input type="text" name="nomor_telepon" id="nomor_telepon" class="form-control"
                                    placeholder="Masukan Nama Lengkap" value="{{ $data->nomor_telepon }}">
                            </div>

                            <button type="submit" class="btn btn-success">Simpan Data Anggota</button>

                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
