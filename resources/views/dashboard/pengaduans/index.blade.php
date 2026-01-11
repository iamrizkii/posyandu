@extends('dashboard.layouts.main')

@section('container')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-bullhorn mr-2"></i>Daftar Pengaduan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Pengaduan</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <i class="icon fas fa-check"></i> {{ session('success') }}
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Pengaduan Masyarakat</h3>
                    <div class="card-tools">
                        @can('ortu')
                            <a href="/dashboard/pengaduans/create" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus"></i> Buat Pengaduan Baru
                            </a>
                        @endcan
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th style="width: 50px;">#</th>
                                <th>Judul Pengaduan</th>
                                @can('admin')
                                <th>Pelapor</th> @endcan
                                <th style="width: 120px;">Status</th>
                                <th style="width: 130px;">Tanggal</th>
                                <th style="width: 150px;" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pengaduans as $pengaduan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <strong>{{ Str::limit($pengaduan->judul, 50) }}</strong>
                                        <br>
                                        <small class="text-muted">{{ Str::limit($pengaduan->isi, 80) }}</small>
                                    </td>
                                    @can('admin')
                                        <td>
                                            <i class="fas fa-user-circle text-muted"></i> {{ $pengaduan->user->name }}
                                        </td>
                                    @endcan
                                    <td>
                                        @if($pengaduan->status == 'Pending')
                                            <span class="badge bg-warning"><i class="fas fa-clock"></i> Pending</span>
                                        @elseif($pengaduan->status == 'Proses')
                                            <span class="badge bg-info"><i class="fas fa-spinner"></i> Proses</span>
                                        @else
                                            <span class="badge bg-success"><i class="fas fa-check-circle"></i> Selesai</span>
                                        @endif
                                    </td>
                                    <td>
                                        <small>
                                            <i class="far fa-calendar"></i> {{ $pengaduan->created_at->format('d M Y') }}
                                            <br>
                                            <i class="far fa-clock"></i> {{ $pengaduan->created_at->format('H:i') }}
                                        </small>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group btn-group-sm">
                                            <a href="/dashboard/pengaduans/{{ $pengaduan->id }}" class="btn btn-info"
                                                title="Lihat Detail">
                                                <i class="fas fa-eye"></i>
                                            </a>

                                            @if(auth()->user()->level != 'ortu')
                                                <a href="/dashboard/pengaduans/{{ $pengaduan->id }}/edit" class="btn btn-warning"
                                                    title="Tanggapi">
                                                    <i class="fas fa-reply"></i>
                                                </a>
                                            @endif

                                            @if(auth()->user()->level == 'ortu' && $pengaduan->status == 'Pending')
                                                <form action="/dashboard/pengaduans/{{ $pengaduan->id }}" method="post"
                                                    class="d-inline" onsubmit="return confirm('Yakin hapus pengaduan ini?')">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-danger" type="submit" title="Hapus">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-4">
                                        <i class="fas fa-inbox fa-3x mb-3"></i>
                                        <p>Belum ada pengaduan.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection