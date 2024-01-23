@extends('layouts.admin')

@section('title', $title ?? '')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $title ?? 'Tambah Pangkat Baru ' }}</h1>
            </div>

            <div class="section-body">

                <div class="card">
                    <div class="card-body">

                        @include('components.alert')

                        <form method="POST" action="{{ url("danramil/pangkat/$data->id/update") }}">
                            @method('PUT')
                            @csrf

                            <div class="form-group">
                                <label for="name">Edit Nama Pangkat</label>
                                <input type="text" name="nama" id="nama" class="form-control"
                                    placeholder="Masukan Nama Pangkat" value="{{ $data->nama_pangkat }}">
                            </div>

                            <button type="submit" class="btn btn-success">Simpan Edit Pangkat</button>

                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
