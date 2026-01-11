@extends('dashboard.layouts.main')

@section('container')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-edit mr-2"></i>Edit Data Timbang</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item"><a href="/dashboard/timbangs">Hasil Timbang</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card card-success card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Edit Data Penimbangan</h3>
                        </div>
                        <form action="/dashboard/timbangs/{{ $timbang->id }}" method="POST">
                            @method('put')
                            @csrf
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="anak_id">Pilih Anak</label>
                                    <select class="form-control select2 @error('anak_id') is-invalid @enderror" id="anak_id"
                                        name="anak_id" required>
                                        <option value="">-- Pilih Anak --</option>
                                        @foreach($anaks as $anak)
                                            <option value="{{ $anak->id }}" {{ old('anak_id', $timbang->anak_id) == $anak->id ? 'selected' : '' }}>
                                                {{ $anak->nama }} ({{ $anak->nik }})
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('anak_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="tanggal">Tanggal Penimbangan</label>
                                    <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                                        id="tanggal" name="tanggal"
                                        value="{{ old('tanggal', $timbang->tanggal->format('Y-m-d')) }}" required>
                                    @error('tanggal')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="berat_badan">Berat Badan (kg)</label>
                                            <input type="number" step="0.01"
                                                class="form-control @error('berat_badan') is-invalid @enderror"
                                                id="berat_badan" name="berat_badan"
                                                value="{{ old('berat_badan', $timbang->berat_badan) }}" required>
                                            @error('berat_badan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="tinggi_badan">Tinggi Badan (cm)</label>
                                            <input type="number" step="0.01"
                                                class="form-control @error('tinggi_badan') is-invalid @enderror"
                                                id="tinggi_badan" name="tinggi_badan"
                                                value="{{ old('tinggi_badan', $timbang->tinggi_badan) }}" required>
                                            @error('tinggi_badan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="lingkar_kepala">Lingkar Kepala (cm)</label>
                                            <input type="number" step="0.01"
                                                class="form-control @error('lingkar_kepala') is-invalid @enderror"
                                                id="lingkar_kepala" name="lingkar_kepala"
                                                value="{{ old('lingkar_kepala', $timbang->lingkar_kepala) }}" required>
                                            @error('lingkar_kepala')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="keterangan">Keterangan / Catatan</label>
                                    <textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan"
                                        name="keterangan" rows="3">{{ old('keterangan', $timbang->keterangan) }}</textarea>
                                    @error('keterangan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-save mr-1"></i>Update
                                </button>
                                <a href="/dashboard/timbangs" class="btn btn-secondary">
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