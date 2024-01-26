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
                {{-- <div>
                    <a href="{{ url('danramil/anggota/create') }}" class="btn btn-primary btn-sm">Tambah Anggota</a>
                    <a href="{{ url('danramil/anggota/export-excel') }}" class="btn btn-success btn-sm">Export Anggota</a>
                    <a href="{{ url('danramil/anggota/print-pdf') }}" class="btn btn-warning btn-sm">Cetak PDF</a>
                </div> --}}
            </div>

            <div class="section-body">

                @include('components.alert')

                <div class="card">
                    <div class="card-header">
                        <p>Daftar Anggota</p>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <form class="row g-3">
                                <div class="col-9">
                                    <input type="search" name="search[name]" id="search" class="form-control"
                                        placeholder="Cari Anggota">
                                </div>
                                <div class="col-1">
                                    <button type="submit" class="btn btn-primary btn-block mb-3">Cari</button>
                                </div>
                                <div class="col-2">
                                    <a href="{{ route('admin.anggota.create') }}" class="btn btn-success btn-block">Tambah
                                        Anggota</a>
                                </div>
                            </form>
                        </div>


                        <table class="table table-bordered">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Nama Lengkap</th>
                                <th>NRP</th>
                                <th>Email</th>
                                <th>Telpon</th>
                                <th>Pangkat</th>
                                <th>Jabatan</th>
                                <th>Kecabangan</th>
                                <th>Aksi</th>
                            </tr>
                            @forelse($data as $key => $user)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->nama_lengkap }}</td>
                                    <td>{{ $user->nrp }}</td>
                                    <td>{{ $user->email ?? '' }}</td>
                                    <td>{{ $user->nomor_telepon ?? '' }}</td>
                                    <td>{{ $user->pangkat->name ?? '' }}</td>
                                    <td>{{ $user->jabatan->name ?? '' }}</td>
                                    <td>{{ $user->percabangan->name ?? '' }}</td>
                                    <td>
                                        <a href="{{ route('admin.anggota.edit', $user) }}" class="btn btn-success">Edit
                                            Data</a>

                                        <form method="post" action="{{ route('admin.anggota.destroy', $user) }}"
                                            class="d-inline">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>

                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </table>

                        {{ $data->links() }}
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
