@extends('dashboard.layouts.main')

@section('container')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-exclamation-triangle text-danger mr-2"></i>Anak Belum Diimunisasi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('informasi-imunisasi.index') }}">Informasi
                                Imunisasi</a></li>
                        <li class="breadcrumb-item active">Belum Diimunisasi</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            @if($anaks->count() > 0)
                <div class="alert alert-danger">
                    <h5><i class="icon fas fa-ban"></i> Perhatian!</h5>
                    Terdapat <strong>{{ $anaks->count() }} anak</strong> yang belum pernah mendapatkan imunisasi. Segera lakukan
                    imunisasi untuk menjaga kesehatan anak.
                </div>
            @endif

            <div class="row">
                <div class="col-12">

                    <div class="card card-danger card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-list mr-2"></i>
                                Daftar Anak yang Belum Pernah Diimunisasi
                            </h3>
                            <div class="card-tools">
                                <span class="badge badge-danger">{{ $anaks->count() }} Anak</span>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @if($anaks->count() > 0)
                                <table id="example1" class="table table-bordered table-striped table-hover">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Anak</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Usia</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Nama Ortu</th>
                                            <th>No HP Ortu</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($anaks as $anak)
                                            <tr class="table-danger">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <strong>{{ $anak->nama_anak }}</strong>
                                                    <br>
                                                    <small class="text-danger"><i class="fas fa-exclamation-circle"></i> Belum
                                                        imunisasi</small>
                                                </td>
                                                <td>{{ $anak->tgl_lhr->isoFormat('D MMMM Y') }}</td>
                                                <td>
                                                    <span class="badge badge-warning">{{ $anak->age }}</span>
                                                </td>
                                                <td>
                                                    @if($anak->jenis_kelamin == 'Laki-laki')
                                                        <span class="badge badge-primary"><i class="fas fa-mars"></i>
                                                            {{ $anak->jenis_kelamin }}</span>
                                                    @else
                                                        <span class="badge badge-pink"
                                                            style="background-color: #e83e8c; color: white;"><i
                                                                class="fas fa-venus"></i> {{ $anak->jenis_kelamin }}</span>
                                                    @endif
                                                </td>
                                                <td>{{ $anak->ortu->nama_ibu ?? '-' }}</td>
                                                <td>
                                                    @if($anak->ortu && $anak->ortu->nohp)
                                                        <a href="tel:{{ $anak->ortu->nohp }}" class="btn btn-sm btn-outline-success">
                                                            <i class="fas fa-phone"></i> {{ $anak->ortu->nohp }}
                                                        </a>
                                                    @else
                                                        <span class="text-muted">-</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="/dashboard/imunisasis/create" class="btn btn-sm btn-danger">
                                                        <i class="fas fa-syringe"></i> Imunisasi Sekarang
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div class="alert alert-success text-center">
                                    <i class="fas fa-check-circle fa-2x mb-2"></i>
                                    <p class="mb-0"><strong>Selamat!</strong> Semua anak sudah pernah diimunisasi.</p>
                                </div>
                            @endif
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection