@extends('layouts.admin')

@section('title', $title ?? '')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header justify-content-between">
                <h1 class="d-inline-block">{{ $title ?? 'ini title kosong' }}</h1>
            </div>

            <div class="section-body">

                @include('components.alert')

                <div class="card">
                    <div class="card-header">
                        <p>{{ $title ?? '' }}</p>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <form class="row g-3">
                                <div class="col-7">
                                    <input type="search" name="search" id="search" class="form-control"
                                        placeholder="Cari Nomor Petugas atau Wilayah Penugasan">
                                </div>
                                <div class="col-1">
                                    <button type="submit" class="btn btn-primary btn-block mb-3">Cari</button>
                                </div>
                                <div class="col-2">
                                    <a href="{{ route('admin.wilayah-penugasan.index', ['cetak' => 1]) }}"
                                        class="btn btn-outline-success btn-block">Cetak Laporan Penugasan</a>
                                </div>
                                <div class="col-2">
                                    <a href="{{ route('admin.wilayah-penugasan.create') }}"
                                        class="btn btn-success btn-block">Tambah Penugasan</a>
                                </div>
                            </form>
                        </div>

                        <table class="table table-bordered">
                            <tr>
                                <th>No</th>
                                <th>Pimpinan</th>
                                <th>Petugas</th>
                                <th>Kecamatan</th>
                                <th>Populasi</th>
                                <th>KK</th>
                                <th>Laki-Laki</th>
                                <th>Perempuan</th>
                                <th>Aksi</th>
                            </tr>
                            @forelse($data as $key => $dt)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $dt->pimpinan->nama_lengkap ?? '' }}</td>
                                    <td>{{ $dt->anggota->nama_lengkap ?? ($dt->anggota->nama ?? '') }}</td>
                                    <td>{{ $dt->kecamatan->nama_kecamatan ?? '' }}</td>
                                    <td>{{ $dt->jumlah_penduduk ?? '' }}</td>
                                    <td>{{ $dt->jumlah_kepala_keluarga ?? '' }}</td>
                                    <td>{{ $dt->jumlah_pria ?? '' }}</td>
                                    <td>{{ $dt->jumlah_perempuan ?? '' }}</td>
                                    <th>
                                        <a href="{{ route('admin.wilayah-penugasan.edit', $dt) }}" class="btn btn-success">
                                            Edit
                                        </a>

                                        <form method="post" action="{{ route('admin.wilayah-penugasan.destroy', $dt) }}"
                                            class="d-inline">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </th>
                                </tr>
                            @empty
                            @endforelse
                        </table>

                        <div class="row">
                            {!! $data->links() !!}
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
