@extends('layouts.admin')

@section('title', $title ?? '')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $title ?? 'Edit Data Provinsi' }}</h1>
            </div>

            <div class="section-body">

                <div class="card">
                    <div class="card-body">

                        @include('components.alert')

                        <form method="POST" action="{{ url("danramil/provinsi/$data->id/update") }}">
                            @method('PUT')
                            @csrf

                            <div class="form-group">
                                <label for="kode_provinsi">Kode Provinsi</label>
                                <input type="text" name="kode" id="kode" class="form-control"
                                    placeholder="Masukan Kode Provinsi" value="{{ $data->kode_provinsi }}">
                            </div>
                            <div class="form-group">
                                <label for="nama_provinsi">Nama Provinsi</label>
                                <input type="text" name="nama" id="nama" class="form-control"
                                    placeholder="Masukan Nama Provinsi" value="{{ $data->nama_provinsi }}">
                            </div>

                            <button type="submit" class="btn btn-success">Simpan Edit Provinsi</button>

                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
