@extends('dashboard.layouts.main')

@section('container')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-file-alt mr-2"></i>Detail Pengaduan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item"><a href="/dashboard/pengaduans">Pengaduan</a></li>
                        <li class="breadcrumb-item active">Detail</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ $pengaduan->judul }}</h3>
                            <div class="card-tools">
                                @if($pengaduan->status == 'Selesai')
                                    <span class="badge badge-success"><i class="fas fa-check-circle"></i>
                                        {{ $pengaduan->status }}</span>
                                @elseif($pengaduan->status == 'Proses')
                                    <span class="badge badge-info"><i class="fas fa-spinner"></i>
                                        {{ $pengaduan->status }}</span>
                                @else
                                    <span class="badge badge-warning"><i class="fas fa-clock"></i>
                                        {{ $pengaduan->status }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="card-body">
                            <dl class="row">
                                <dt class="col-sm-3"><i class="fas fa-user mr-1"></i>Pelapor</dt>
                                <dd class="col-sm-9">{{ $pengaduan->user->name }}</dd>

                                <dt class="col-sm-3"><i class="fas fa-calendar mr-1"></i>Tanggal</dt>
                                <dd class="col-sm-9">{{ $pengaduan->created_at->format('d F Y, H:i') }} WIB</dd>

                                <dt class="col-sm-3"><i class="fas fa-align-left mr-1"></i>Isi Pengaduan</dt>
                                <dd class="col-sm-9">
                                    <div class="bg-light p-3 rounded">
                                        {{ $pengaduan->isi }}
                                    </div>
                                </dd>

                                @if($pengaduan->foto)
                                    <dt class="col-sm-3"><i class="fas fa-image mr-1"></i>Foto</dt>
                                    <dd class="col-sm-9">
                                        <img src="{{ asset('storage/' . $pengaduan->foto) }}" class="img-fluid rounded"
                                            style="max-height: 300px;">
                                    </dd>
                                @endif
                            </dl>

                            <hr>

                            <h5 class="mb-3"><i class="fas fa-reply mr-2"></i>Tanggapan Petugas</h5>
                            @if($pengaduan->tanggapan)
                                <div class="callout callout-success">
                                    <p style="white-space: pre-wrap;">{{ $pengaduan->tanggapan }}</p>
                                    <small class="text-muted">
                                        <i class="far fa-clock"></i> Ditanggapi:
                                        {{ $pengaduan->updated_at->format('d M Y, H:i') }} WIB
                                    </small>
                                </div>
                            @else
                                <div class="alert alert-info">
                                    <i class="fas fa-info-circle"></i> Belum ada tanggapan dari petugas.
                                </div>
                            @endif
                        </div>

                        <div class="card-footer">
                            <a href="/dashboard/pengaduans" class="btn btn-secondary">
                                <i class="fas fa-arrow-left mr-1"></i> Kembali
                            </a>
                            @if(auth()->user()->level != 'ortu')
                                <a href="/dashboard/pengaduans/{{ $pengaduan->id }}/edit" class="btn btn-warning">
                                    <i class="fas fa-reply mr-1"></i> Tanggapi
                                </a>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Timeline Card -->
                <div class="col-md-4">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-history mr-2"></i>Status Timeline</h3>
                        </div>
                        <div class="card-body">
                            <div class="timeline">
                                <div class="time-label">
                                    <span class="bg-success">{{ $pengaduan->created_at->format('d M Y') }}</span>
                                </div>
                                <div>
                                    <i class="fas fa-paper-plane bg-primary"></i>
                                    <div class="timeline-item">
                                        <span class="time"><i class="fas fa-clock"></i>
                                            {{ $pengaduan->created_at->format('H:i') }}</span>
                                        <h3 class="timeline-header">Pengaduan Dikirim</h3>
                                        <div class="timeline-body">
                                            Pengaduan telah dikirim oleh {{ $pengaduan->user->name }}
                                        </div>
                                    </div>
                                </div>

                                @if($pengaduan->status != 'Pending')
                                    <div>
                                        <i class="fas fa-spinner bg-warning"></i>
                                        <div class="timeline-item">
                                            <h3 class="timeline-header">Status: {{ $pengaduan->status }}</h3>
                                        </div>
                                    </div>
                                @endif

                                <div>
                                    <i class="fas fa-clock bg-gray"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection