@extends('dashboard.layouts.main')

@section('container')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-reply mr-2"></i>Tanggapi Pengaduan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item"><a href="/dashboard/pengaduans">Pengaduan</a></li>
                        <li class="breadcrumb-item active">Tanggapi</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-comments mr-2"></i>Form Tanggapan</h3>
                        </div>
                        <form method="post" action="/dashboard/pengaduans/{{ $pengaduan->id }}">
                            @method('put')
                            @csrf

                            <div class="card-body">
                                <!-- Display Pengaduan Info -->
                                <div class="callout callout-info">
                                    <h5><i class="fas fa-info-circle"></i> Detail Pengaduan:</h5>
                                    <p><strong>Judul:</strong> {{ $pengaduan->judul }}</p>
                                    <p><strong>Dari:</strong> {{ $pengaduan->user->name }}</p>
                                    <p><strong>Tanggal:</strong> {{ $pengaduan->created_at->format('d M Y H:i') }}</p>
                                    <p class="mb-0"><strong>Isi:</strong><br>{{ $pengaduan->isi }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="status"><i class="fas fa-tasks mr-1"></i>Status <span
                                            class="text-danger">*</span></label>
                                    <select class="form-control select2" name="status" id="status" required>
                                        <option value="Pending" {{ $pengaduan->status == 'Pending' ? 'selected' : '' }}>
                                            🕐 Pending - Belum Ditangani
                                        </option>
                                        <option value="Proses" {{ $pengaduan->status == 'Proses' ? 'selected' : '' }}>
                                            ⏳ Proses - Sedang Ditangani
                                        </option>
                                        <option value="Selesai" {{ $pengaduan->status == 'Selesai' ? 'selected' : '' }}>
                                            ✅ Selesai - Sudah Ditanggapi
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="tanggapan"><i class="fas fa-comment-dots mr-1"></i>Tanggapan <span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control @error('tanggapan') is-invalid @enderror" id="tanggapan"
                                        name="tanggapan" rows="6" placeholder="Tulis tanggapan Anda untuk pengaduan ini..."
                                        required>{{ old('tanggapan', $pengaduan->tanggapan) }}</textarea>
                                    @error('tanggapan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-save mr-1"></i> Simpan Tanggapan
                                </button>
                                <a href="/dashboard/pengaduans" class="btn btn-secondary">
                                    <i class="fas fa-times mr-1"></i> Batal
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection