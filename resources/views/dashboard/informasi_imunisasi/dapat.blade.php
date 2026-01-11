@extends('dashboard.layouts.main')

@section('container')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-check-circle text-success mr-2"></i>Anak Dapat Diimunisasi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('informasi-imunisasi.index') }}">Informasi
                                Imunisasi</a></li>
                        <li class="breadcrumb-item active">Dapat Diimunisasi</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card card-success card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-list mr-2"></i>
                                Daftar Anak Usia 0-5 Tahun (Dapat Diimunisasi)
                            </h3>
                            <div class="card-tools">
                                <span class="badge badge-success">{{ $anaks->count() }} Anak</span>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Anak</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Usia</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Nama Ortu</th>
                                        <th>Riwayat Imunisasi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($anaks as $anak)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><strong>{{ $anak->nama_anak }}</strong></td>
                                            <td>{{ $anak->tgl_lhr->isoFormat('D MMMM Y') }}</td>
                                            <td>
                                                <span class="badge badge-info">{{ $anak->age }}</span>
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
                                                @if($anak->imunisasis->count() > 0)
                                                    @foreach($anak->imunisasis as $imun)
                                                        <span
                                                            class="badge badge-success mb-1">{{ $imun->jenisimunisasi->nama_imun ?? '-' }}</span>
                                                    @endforeach
                                                @else
                                                    <span class="badge badge-warning">Belum ada</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="/dashboard/imunisasis/create" class="btn btn-sm btn-primary">
                                                    <i class="fas fa-syringe"></i> Imunisasi
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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