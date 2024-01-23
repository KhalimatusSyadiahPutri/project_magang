@extends('layouts.admin')

@section('title', $title ?? '')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $title ?? 'Tambah Provinsi Baru ' }}</h1>
            </div>

            <div class="section-body">

                <div class="card">
                    <div class="card-body">

                        @include('components.alert')

                        <form method="POST" action="{{ url('danramil/provinsi/store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="kode_provinsi">Kode Provinsi</label>
                                <input type="text" name="kode" id="nama" class="form-control"
                                    placeholder="Masukan Kode Provinsi">
                            </div>
                            <div class="form-group">
                                <label for="nama_provinsi">Nama Provinsi</label>
                                <input type="text" name="nama" id="nama" class="form-control"
                                    placeholder="Masukan Nama Provinsi">
                            </div>

                            <button type="submit" class="btn btn-success">Simpan Provinsi</button>

                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
