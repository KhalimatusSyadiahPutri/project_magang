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

                        <form method="POST" action="{{ route('admin.pangkat.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" name="nama_pangkat" id="name" class="form-control"
                                    placeholder="Masukan Nama Pangkat">
                            </div>

                            <button type="submit" class="btn btn-success">Simpan Pangkat</button>

                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
