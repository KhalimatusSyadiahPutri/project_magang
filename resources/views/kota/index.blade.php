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
                <div>
                    <a href="{{ url('danramil/kota/create') }}" class="btn btn-primary btn-sm">Tambah Kota</a>
                    <a href="{{ url('danramil/kota/export-excel') }}" class="btn btn-success btn-sm">Export Kota</a>
                    <a href="{{ url('danramil/kota/print-pdf') }}" class="btn btn-warning btn-sm">Cetak PDF</a>
                </div>
            </div>

            <div class="section-body">

                @include('components.alert')

                <div class="card">
                    <div class="card-header">
                        <p>DAFTAR KOTA</p>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>No</th>
                                <th>Kode Kota</th>
                                <th>Nama Kota</th>
                                <th>ID Provinsi</th>
                                <th>Aksi</th>
                            </tr>
                            @forelse($data as $key => $user)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $user->kode_kota }}</td>
                                    <td>{{ $user->nama_kota }}</td>
                                    <td>{{ $user->provinsi->nama_provinsi ?? ' ' }}</td>
                                    <td>
                                        <a href="{{ url('danramil/kota/' . $user->id . '/edit') }}"
                                            class="btn btn-success">Edit Data</a>

                                        <form method="post" action="{{ url('danramil/kota/' . $user->id . '/delete') }}">
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
