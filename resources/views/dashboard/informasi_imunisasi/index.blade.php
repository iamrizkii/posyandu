@extends('dashboard.layouts.main')

@section('container')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-info-circle mr-2"></i>Informasi Imunisasi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Informasi Imunisasi</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <!-- Dapat Diimunisasi -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-gradient-success">
                        <div class="inner">
                            <h3>{{ $dapatDiimunisasi }}</h3>
                            <p>Dapat Diimunisasi</p>
                            <small class="text-white-50">Usia 0-5 tahun</small>
                        </div>
                        <div class="icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <a href="{{ route('informasi-imunisasi.dapat') }}" class="small-box-footer">
                            Lihat Detail <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Tidak Dapat Diimunisasi -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-gradient-secondary">
                        <div class="inner">
                            <h3>{{ $tidakDapatDiimunisasi }}</h3>
                            <p>Tidak Dapat Diimunisasi</p>
                            <small class="text-white-50">Usia > 5 tahun</small>
                        </div>
                        <div class="icon">
                            <i class="fas fa-times-circle"></i>
                        </div>
                        <a href="{{ route('informasi-imunisasi.tidak-dapat') }}" class="small-box-footer">
                            Lihat Detail <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Sudah Diimunisasi -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-gradient-info">
                        <div class="inner">
                            <h3>{{ $sudahDiimunisasi }}</h3>
                            <p>Sudah Diimunisasi</p>
                            <small class="text-white-50">Minimal 1x imunisasi</small>
                        </div>
                        <div class="icon">
                            <i class="fas fa-syringe"></i>
                        </div>
                        <a href="{{ route('informasi-imunisasi.sudah') }}" class="small-box-footer">
                            Lihat Detail <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Belum Diimunisasi -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-gradient-danger">
                        <div class="inner">
                            <h3>{{ $belumDiimunisasi }}</h3>
                            <p>Belum Diimunisasi</p>
                            <small class="text-white-50">Belum pernah imunisasi</small>
                        </div>
                        <div class="icon">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <a href="{{ route('informasi-imunisasi.belum') }}" class="small-box-footer">
                            Lihat Detail <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->

            <!-- Statistik Jenis Imunisasi -->
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-chart-bar mr-2"></i>
                                Statistik per Jenis Imunisasi
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @foreach($jenisImunisasis as $jenis)
                                    <div class="col-md-3 col-sm-6 col-12">
                                        <div class="info-box bg-gradient-light">
                                            <span class="info-box-icon bg-primary"><i class="fas fa-syringe"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">{{ $jenis->nama_imun }}</span>
                                                <span class="info-box-number">{{ $jenis->imunisasis_count }} anak</span>
                                                <div class="progress">
                                                    <div class="progress-bar bg-primary"
                                                        style="width: {{ min(($jenis->imunisasis_count / max($dapatDiimunisasi, 1)) * 100, 100) }}%">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection