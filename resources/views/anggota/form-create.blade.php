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

                        <form method="post" action="{{ url('danramil/anggota/store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="name">Nama Pengguna</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    placeholder="Masukan Nama Pengguna">
                            </div>
                            <div class="form-group">
                                <label for="nama_lengkap">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control"
                                    placeholder="Masukan Nama Lengkap">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" class="form-control"
                                    placeholder="Masukan E-mail ">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="Masukan Password">
                            </div>
                            <div class="form-group">
                                <label for="id_pangkat">Pangkat</label>
                                <select name="id_pangkat" id="id_pangkat" class="form-control">
                                    @foreach (\App\Models\Pangkat::all() as $pangkat)
                                        <option value="{{ $pangkat->id }}">{{ $pangkat->nama_pangkat }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_jabatan">Jabatan</label>
                                <select name="id_jabatan" id="id_jabatan" class="form-control">
                                    @foreach (\App\Models\Jabatan::all() as $jabatan)
                                        <option value="{{ $jabatan->id }}">{{ $jabatan->nama_jabatan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nrp">NRP</label>
                                <input type="text" name="nrp" id="nrp" class="form-control"
                                    placeholder="Masukan NRP">
                            </div>
                            <div class="form-group">
                                <label for="nomor_telepon">Nomor Telepon</label>
                                <input type="text" name="nomor_telepon" id="nomor_telepon" class="form-control"
                                    placeholder="Masukan Nama Lengkap">
                            </div>

                            <button type="submit" class="btn btn-success">Simpan Data Anggota</button>

                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
