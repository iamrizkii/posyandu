@extends('dashboard.layouts.main')

@section('container')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-plus-circle mr-2"></i>Tambah Agenda</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item"><a href="/dashboard/agendas">Agenda</a></li>
                        <li class="breadcrumb-item active">Tambah</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Form Tambah Agenda Baru</h3>
                        </div>
                        <form action="/dashboard/agendas" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="judul">Judul Agenda</label>
                                    <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul"
                                        name="judul" value="{{ old('judul') }}" required>
                                    @error('judul')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="waktu">Waktu Pelaksanaan</label>
                                    <input type="datetime-local" class="form-control @error('waktu') is-invalid @enderror"
                                        id="waktu" name="waktu" value="{{ old('waktu') }}" required>
                                    @error('waktu')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="lokasi">Lokasi</label>
                                    <input type="text" class="form-control @error('lokasi') is-invalid @enderror"
                                        id="lokasi" name="lokasi" value="{{ old('lokasi') }}" required>
                                    @error('lokasi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="isi">Deskripsi Kegiatan</label>
                                    @error('isi')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <input id="isi" type="hidden" name="isi" value="{{ old('isi') }}">
                                    <trix-editor input="isi"></trix-editor>
                                </div>

                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control @error('status') is-invalid @enderror" id="status"
                                        name="status" required>
                                        <option value="Segera">Segera</option>
                                        <option value="Selesai">Selesai</option>
                                        <option value="Batal">Batal</option>
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save mr-1"></i>Simpan
                                </button>
                                <a href="/dashboard/agendas" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left mr-1"></i>Kembali
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection