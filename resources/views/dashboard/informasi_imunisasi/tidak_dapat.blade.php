@extends('dashboard.layouts.main')

@section('container')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-times-circle text-secondary mr-2"></i>Anak Tidak Dapat Diimunisasi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('informasi-imunisasi.index') }}">Informasi
                                Imunisasi</a></li>
                        <li class="breadcrumb-item active">Tidak Dapat Diimunisasi</li>
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

                    <div class="card card-secondary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-list mr-2"></i>
                                Daftar Anak Usia > 5 Tahun (Tidak Dapat Diimunisasi Program Posyandu)
                            </h3>
                            <div class="card-tools">
                                <span class="badge badge-secondary">{{ $anaks->count() }} Anak</span>
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
                                            <th>Total Imunisasi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($anaks as $anak)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><strong>{{ $anak->nama_anak }}</strong></td>
                                                <td>{{ $anak->tgl_lhr->isoFormat('D MMMM Y') }}</td>
                                                <td>
                                                    <span class="badge badge-secondary">{{ $anak->age }}</span>
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
                                                    <span class="badge badge-info">{{ $anak->imunisasis->count() }} kali
                                                        imunisasi</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div class="alert alert-info text-center">
                                    <i class="fas fa-info-circle fa-2x mb-2"></i>
                                    <p class="mb-0">Tidak ada anak dengan usia di atas 5 tahun.</p>
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