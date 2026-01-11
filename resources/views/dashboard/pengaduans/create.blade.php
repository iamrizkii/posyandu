@extends('dashboard.layouts.main')

@section('container')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-bullhorn mr-2"></i>Buat Pengaduan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item"><a href="/dashboard/pengaduans">Pengaduan</a></li>
                        <li class="breadcrumb-item active">Buat Baru</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-edit mr-2"></i>Form Pengaduan Baru</h3>
                        </div>
                        <form method="post" action="/dashboard/pengaduans" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="judul"><i class="fas fa-heading mr-1"></i>Judul Pengaduan <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul"
                                        name="judul" placeholder="Masukkan judul pengaduan..." required autofocus
                                        value="{{ old('judul') }}">
                                    @error('judul')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="isi"><i class="fas fa-align-left mr-1"></i>Isi Pengaduan <span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control @error('isi') is-invalid @enderror" id="isi" name="isi"
                                        rows="6" placeholder="Jelaskan detail pengaduan Anda..."
                                        required>{{ old('isi') }}</textarea>
                                    @error('isi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="foto"><i class="fas fa-camera mr-1"></i>Upload Foto (Opsional)</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input @error('foto') is-invalid @enderror"
                                                id="foto" name="foto" accept="image/*">
                                            <label class="custom-file-label" for="foto">Pilih foto...</label>
                                        </div>
                                    </div>
                                    <small class="form-text text-muted">
                                        <i class="fas fa-info-circle"></i> Format: JPG, PNG, JPEG. Max: 2MB
                                    </small>
                                    @error('foto')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-paper-plane mr-1"></i> Kirim Pengaduan
                                </button>
                                <a href="/dashboard/pengaduans" class="btn btn-secondary">
                                    <i class="fas fa-times mr-1"></i> Batal
                                </a>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Info Card -->
                <div class="col-md-4">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-info-circle mr-2"></i>Informasi</h3>
                        </div>
                        <div class="card-body">
                            <p><strong>Catatan Penting:</strong></p>
                            <ul class="pl-3">
                                <li>Isi form dengan lengkap dan jelas</li>
                                <li>Pengaduan akan ditanggapi oleh Bidan</li>
                                <li>Anda dapat memantau status pengaduan</li>
                                <li>Pengaduan yang pending dapat dihapus</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Update custom file input label
        document.querySelector('.custom-file-input').addEventListener('change', function (e) {
            var fileName = e.target.files[0]?.name || 'Pilih foto...';
            var nextSibling = e.target.nextElementSibling;
            nextSibling.innerText = fileName;
        });
    </script>

@endsection