@extends('layouts.admin')

@section('title', $title ?? '')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $title ?? 'ini title kosong' }}</h1>
            </div>

            <div class="section-body">

                <div class="card">
                    <div class="card-body">

                        @include('components.alert')

                        <form method="POST" action="{{ route('admin.wilayah-penugasan.update', $data) }}">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-6">
                                    <input type="hidden" name="user_id" value="{{ auth()->user()->id ?? '' }}">
                                    <div class="form-group">
                                        <label for="id_pimpinan">Pimpinan</label>
                                        <select name="id_pimpinan" id="id_pimpinan" class="form-control">
                                            @foreach (\App\Models\User::where('id_jabatan', 1)->get() as $user)
                                                <option value="{{ $user->id }}"
                                                    {{ $user->id == $data->id_pimpinan ? 'selected' : '' }}>
                                                    {{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="id_anggota">Anggota</label>
                                        <select name="id_anggota" id="id_anggota" class="form-control">
                                            @foreach (\App\Models\User::where('id_jabatan', 2)->get() as $user)
                                                <option value="{{ $user->id }}"
                                                    {{ $user->id == $data->id_anggota ? 'selected' : '' }}>
                                                    {{ $user->nama_lengkap }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="jumlah_penduduk">Jumlah Masyarakat</label>
                                        <input type="number" name="jumlah_penduduk" id="jumlah_penduduk"
                                            class="form-control" placeholder="Jumlah Maysarakat"
                                            value="{{ $data->jumlah_penduduk ?? 0 }}">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="jumlah_kepala_keluarga">Jumlah KK</label>
                                        <input type="number" name="jumlah_kepala_keluarga" id="jumlah_kepala_keluarga"
                                            class="form-control" placeholder="Jumlah Kepala Keluarga"
                                            value="{{ $data->jumlah_kepala_keluarga ?? 0 }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="jumlah_pria">Jumlah Laki-Laki</label>
                                        <input type="number" name="jumlah_pria" id="jumlah_pria" class="form-control"
                                            placeholder="Jumlah Laki-Laki" value="{{ $data->jumlah_pria ?? 0 }}">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="jumlah_perempuan">Jumlah Perempuan</label>
                                        <input type="number" name="jumlah_perempuan" id="jumlah_perempuan"
                                            class="form-control" placeholder="Jumlah Perempuan"
                                            value="{{ $data->jumlah_perempuan ?? 0 }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="area">Area</label>
                                        <input type="number" name="area" id="area" class="form-control"
                                            placeholder="Jumlah Perempuan" value="{{ $data->area ?? 0 }}">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="id_kecamatan">Kecamatan</label>
                                        <select name="id_kecamatan" id="id_kecamatan" class="form-control">
                                            @foreach ($kecamatan as $kecamatan)
                                                <option value="{{ $kecamatan->id }}"
                                                    {{ $kecamatan->id == $data->id_kecamatan ? 'selected' : '' }}>
                                                    {{ $kecamatan->nama_kecamatan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success">Simpan</button>
                            <button type="reset" class="btn btn-warning">Reset</button>

                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
