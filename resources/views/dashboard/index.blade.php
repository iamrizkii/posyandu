@extends('dashboard.layouts.main')

@section('container')

  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"><i class="fas fa-tachometer-alt mr-2"></i>Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">

      <!-- Welcome Alert -->
      <div class="alert alert-success alert-dismissible fade show"
        style="background: linear-gradient(135deg, #2E7D32 0%, #43A047 100%); border: none; color: white;">
        <button type="button" class="close text-white" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-hand-sparkles"></i> Selamat Datang, {{ auth()->user()->name }}!</h5>
        <span>Anda login sebagai <strong class="text-uppercase">{{ auth()->user()->level }}</strong>.
          @can('bidan')
            Anda memiliki akses ke menu <a href="{{ route('informasi-imunisasi.index') }}"
              class="text-white text-decoration-underline"><strong>Informasi Imunisasi</strong></a>.
          @endcan
        </span>
      </div>

      <!-- Small boxes (Stat box) -->
      <div class="row">
        <!-- Ibu/Keluarga -->
        <div class="col-lg-3 col-6">
          <div class="small-box bg-gradient-info">
            <div class="inner">
              <h3>{{ $ibu }}</h3>
              <p>Keluarga</p>
              <small class="text-white-50">Data Orang Tua</small>
            </div>
            <div class="icon">
              <i class="fas fa-users"></i>
            </div>
            <a href="/dashboard/ortus" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <!-- Anak -->
        <div class="col-lg-3 col-6">
          <div class="small-box bg-gradient-success">
            <div class="inner">
              <h3>{{ $anak }}</h3>
              <p>Anak</p>
              <small class="text-white-50">Total Data Anak</small>
            </div>
            <div class="icon">
              <i class="fas fa-child"></i>
            </div>
            <a href="/dashboard/anaks" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <!-- Imunisasi -->
        <div class="col-lg-3 col-6">
          <div class="small-box bg-gradient-warning">
            <div class="inner">
              <h3>{{ $imunisasi }}</h3>
              <p>Imunisasi</p>
              <small class="text-white-50">Total Record Imunisasi</small>
            </div>
            <div class="icon">
              <i class="fas fa-syringe"></i>
            </div>
            <a href="/dashboard/imunisasis" class="small-box-footer">Lihat Detail <i
                class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <!-- User -->
        <div class="col-lg-3 col-6">
          <div class="small-box bg-gradient-secondary">
            <div class="inner">
              <h3>{{ $user }}</h3>
              <p>User</p>
              <small class="text-white-50">Total Pengguna</small>
            </div>
            <div class="icon">
              <i class="fas fa-user"></i>
            </div>
            <a href="#" class="small-box-footer">Kelola User <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
      <!-- /.row -->

      <!-- Status Imunisasi Row -->
      @can('bidan')
        <div class="row">
          <div class="col-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-2"></i>
                  Status Imunisasi Anak
                </h3>
                <div class="card-tools">
                  <a href="{{ route('informasi-imunisasi.index') }}" class="btn btn-sm btn-primary">
                    <i class="fas fa-external-link-alt"></i> Lihat Detail
                  </a>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <!-- Dapat Diimunisasi -->
                  <div class="col-md-4">
                    <div class="info-box bg-gradient-success">
                      <span class="info-box-icon"><i class="fas fa-check-circle"></i></span>
                      <div class="info-box-content">
                        <span class="info-box-text">Dapat Diimunisasi</span>
                        <span class="info-box-number">{{ $dapatImunisasi }} Anak</span>
                        <small>Usia 0-5 tahun</small>
                      </div>
                    </div>
                  </div>

                  <!-- Sudah Diimunisasi -->
                  <div class="col-md-4">
                    <div class="info-box bg-gradient-info">
                      <span class="info-box-icon"><i class="fas fa-syringe"></i></span>
                      <div class="info-box-content">
                        <span class="info-box-text">Sudah Diimunisasi</span>
                        <span class="info-box-number">{{ $sudahImunisasi }} Anak</span>
                        <small>Minimal 1x imunisasi</small>
                      </div>
                    </div>
                  </div>

                  <!-- Belum Diimunisasi -->
                  <div class="col-md-4">
                    <div class="info-box bg-gradient-danger">
                      <span class="info-box-icon"><i class="fas fa-exclamation-triangle"></i></span>
                      <div class="info-box-content">
                        <span class="info-box-text">Belum Diimunisasi</span>
                        <span class="info-box-number">{{ $belumImunisasi }} Anak</span>
                        <a href="{{ route('informasi-imunisasi.belum') }}" class="text-white">
                          <small><i class="fas fa-eye"></i> Lihat Daftar</small>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>

                @if($belumImunisasi > 0)
                  <div class="alert alert-warning">
                    <i class="fas fa-exclamation-circle"></i>
                    <strong>Perhatian!</strong> Terdapat <strong>{{ $belumImunisasi }} anak</strong> yang belum pernah
                    diimunisasi.
                    <a href="{{ route('informasi-imunisasi.belum') }}" class="alert-link">Klik di sini</a> untuk melihat
                    daftarnya.
                  </div>
                @endif
              </div>
            </div>
          </div>
        </div>
      @endcan

      <!-- Quick Actions -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header bg-gradient-dark">
              <h3 class="card-title">
                <i class="fas fa-bolt mr-2"></i>
                Aksi Cepat
              </h3>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-3 col-sm-6">
                  <a href="/dashboard/ortus/create" class="btn btn-primary btn-block mb-3">
                    <i class="fas fa-plus-circle mr-2"></i>Tambah Keluarga
                  </a>
                </div>
                <div class="col-md-3 col-sm-6">
                  <a href="/dashboard/anaks/create" class="btn btn-success btn-block mb-3">
                    <i class="fas fa-plus-circle mr-2"></i>Tambah Anak
                  </a>
                </div>
                <div class="col-md-3 col-sm-6">
                  <a href="/dashboard/imunisasis/create" class="btn btn-warning btn-block mb-3">
                    <i class="fas fa-syringe mr-2"></i>Input Imunisasi
                  </a>
                </div>
                <div class="col-md-3 col-sm-6">
                  <a href="/dashboard/vitamin_as/create" class="btn btn-info btn-block mb-3">
                    <i class="fas fa-capsules mr-2"></i>Input Vitamin A
                  </a>
                </div>
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