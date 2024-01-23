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

                        <form method="post" action="{{ url('danramil/kecamatan/store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="kode_kecamatan">Kode Kecamatan</label>
                                <input type="text" name="kode_kecamatan" id="kode_kecamatan" class="form-control"
                                    placeholder="Masukan Kode Kecamatan">
                            </div>

                            <div class="form-group">
                                <label for="nama_kecamatan">Nama Kecamatan</label>
                                <input type="text" name="nama_kecamatan" id="nama_kecamatan" class="form-control"
                                    placeholder="Masukan Nama Kecamatan">
                            </div>

                            <div class="form-group">
                                <label for="id_provinsi">Pilih Provinsi</label>
                                <select name="id_provinsi" id="id_provinsi" class="form-control" onchange="getKabupaten()">
                                    <option value="" disabled selected> Pilih Provinsi </option>
                                    @foreach (\App\Models\Provinsi::all() as $prov)
                                        <option value="{{ $prov->id }}">{{ $prov->nama_provinsi }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="id_kabupaten">Pilih Kabupaten</label>
                                <select name="id_kabupaten" id="id_kabupaten" class="form-control"
                                    onchange="getKecamatan()">
                                    <option value="" disabled selected> Pilih Kabupaten </option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-success">Simpan Data Anggota</button>

                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')

    @push('scripts')
        <script>
            function getKabupaten() {
                // ambil id provinsi
                var provinsi_id = document.getElementById('id_provinsi').value;

                // get / minta data kabupaten sesuai dengan id_provinsi nya
                $.ajax({
                    url: "{{ url('danramil/ajax/kabupaten') }}" + '/' + provinsi_id,
                    method: 'GET',
                    success: function(data, status) {
                        console.log(data);

                        // tuliskan di select id_kabupaten
                        var options = '';
                        data.forEach(function(item, index) {
                            options += "<option value='" + item.id + "'>" + item.nama_kota +
                                "</option>";
                        });

                        document.getElementById('id_kabupaten').innerHTML = options;
                    },
                    fail: function(err) {
                        console.error(err);
                    }
                });
            }
        </script>
    @endpush
