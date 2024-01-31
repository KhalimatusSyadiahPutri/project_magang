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
                    <a href="{{ url('danramil/pangkat/export-excel') }}" class="btn btn-success btn-sm">Export Pangkat</a>
                    <a href="{{ url('danramil/pagkat/print-pdf') }}" class="btn btn-warning btn-sm">Cetak PDF</a>
                </div> --}}
            </div>

            <div class="section-body">

                @include('components.alert')

                <div class="card">
                    <div class="card-header">
                        <p>Pangkat Anggota</p>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <form class="row g-3">
                                <div class="col-9">
                                    <input type="search" name="search[name]" id="search" class="form-control"
                                        value="{{ request()->get('search')['name'] ?? '' }}" placeholder="Cari Pangkat">
                                </div>
                                <div class="col-1">
                                    <button type="submit" class="btn btn-primary btn-block mb-3">Cari</button>
                                </div>
                                <div class="col-2">
                                    <a href="{{ route('admin.jabatan.create') }}" class="btn btn-success btn-block">Tambah
                                        Jabatan</a>
                                </div>
                            </form>
                        </div>

                        <table class="table table-bordered">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Aksi</th>
                            </tr>
                            @forelse($data as $key => $user)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $user->nama_jabatan }}</td>
                                    <td>
                                        <a href="{{ route('admin.jabatan.edit', $user) }}" class="btn btn-success">Edit
                                            Data</a>

                                        <form method="post" action="{{ route('admin.jabatan.destroy', $user) }}"
                                            class="d-inline-block">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>

                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </table>
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
