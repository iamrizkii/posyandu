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
      @if(auth()->user()->level == 'ortu')
        <div class="row">
          <div class="col-12">
            <div class="alert alert-success">
              <h5><i class="icon fas fa-info"></i> Selamat Datang, {{ auth()->user()->name }}!</h5>
              Lihat grafik pertumbuhan anak Anda di bawah ini dan gunakan menu Pengaduan jika ada keluhan.
            </div>
          </div>
        </div>

        @if(isset($anaks) && count($anaks) > 0)
          <div class="row">
            @foreach($anaks as $anak)
              <div class="col-md-6">
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Grafik Pertumbuhan: {{ $anak->nama }}</h3>
                  </div>
                  <div class="card-body">
                    <canvas id="chart-{{ $anak->id }}"
                      style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                  </div>
                </div>
              </div>
            @endforeach
          </div>

          <!-- ChartJS -->
          <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
          <script>
            document.addEventListener('DOMContentLoaded', function () {
              @foreach($anaks as $anak)
                @if(isset($chartData[$anak->id]))
                  var ctx{{ $anak->id }} = document.getElementById('chart-{{ $anak->id }}').getContext('2d');
                  new Chart(ctx{{ $anak->id }}, {
                    type: 'line',
                    data: {
                      labels: {!! json_encode($chartData[$anak->id]['labels']) !!},
                      datasets: [
                        {
                          label: 'Berat Badan (kg)',
                          backgroundColor: 'rgba(60,141,188,0.9)',
                          borderColor: 'rgba(60,141,188,0.8)',
                          pointRadius: 4,
                          pointColor: '#3b8bba',
                          pointStrokeColor: 'rgba(60,141,188,1)',
                          pointHighlightFill: '#fff',
                          pointHighlightStroke: 'rgba(60,141,188,1)',
                          data: {!! json_encode($chartData[$anak->id]['berat']) !!},
                          fill: false
                        },
                        {
                          label: 'Tinggi Badan (cm)',
                          backgroundColor: 'rgba(210, 214, 222, 1)',
                          borderColor: 'rgba(210, 214, 222, 1)',
                          pointRadius: 4,
                          pointColor: 'rgba(210, 214, 222, 1)',
                          pointStrokeColor: '#c1c7d1',
                          pointHighlightFill: '#fff',
                          pointHighlightStroke: 'rgba(220,220,220,1)',
                          data: {!! json_encode($chartData[$anak->id]['tinggi']) !!},
                          fill: false,
                          yAxisID: 'y1'
                        }
                      ]
                    },
                    options: {
                      maintainAspectRatio: false,
                      responsive: true,
                      interaction: {
                        mode: 'index',
                        intersect: false,
                      },
                      scales: {
                        y: {
                          type: 'linear',
                          display: true,
                          position: 'left',
                          title: { display: true, text: 'Berat (kg)' }
                        },
                        y1: {
                          type: 'linear',
                          display: true,
                          position: 'right',
                          title: { display: true, text: 'Tinggi (cm)' },
                          grid: { drawOnChartArea: false }
                        }
                      }
                    }
                  });
                @endif
              @endforeach
            });
          </script>
        @else
          <p class="text-center text-muted">Data anak belum tersedia. Silakan hubungi admin/kader.</p>
        @endif

      @else
        <!-- Admin/Bidan Widgets -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $anak }}</h3>

                <p>Data Anak</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-contacts"></i>
              </div>
              <a href="/dashboard/anaks" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $ibu }}</h3>

                <p>Data Orang Tua</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-stalker"></i>
              </div>
              <a href="/dashboard/ortus" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $user }}</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="/dashboard/users" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $imunisasi }}</h3>

                <p>Data Imunisasi</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="/dashboard/imunisasis" class="small-box-footer">More info <i
                  class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $sudahImunisasi }}</h3>

                <p>Sudah Diimunisasi</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-contacts"></i>
              </div>
              <a href="/dashboard/informasi-imunisasi/sudah" class="small-box-footer">More info <i
                  class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $dapatImunisasi }}</h3>

                <p>Dapat Diimunisasi</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-stalker"></i>
              </div>
              <a href="/dashboard/informasi-imunisasi/dapat" class="small-box-footer">More info <i
                  class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $belumImunisasi }}</h3>

                <p>Belum Diimunisasi</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="/dashboard/informasi-imunisasi/belum" class="small-box-footer">More info <i
                  class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
  </div>

  <!-- Pengaduan Stats for Admin/Bidan -->
  @if(auth()->user()->level != 'ortu')
  <div class="row">
    <div class="col-12">
      <div class="card card-warning card-outline">
        <div class="card-header">
          <h3 class="card-title">
            <i class="fas fa-bullhorn mr-2"></i>
            Status Pengaduan Masyarakat
          </h3>
          <div class="card-tools">
            <a href="/dashboard/pengaduans" class="btn btn-sm btn-warning">
              <i class="fas fa-external-link-alt"></i> Lihat Semua
            </a>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-3">
              <div class="info-box bg-warning">
                <span class="info-box-icon"><i class="fas fa-clock"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Pending</span>
                  <span class="info-box-number">{{ $pengaduanPending ?? 0 }} Laporan</span>
                  <small>Menunggu Tanggapan</small>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="info-box bg-info">
                <span class="info-box-icon"><i class="fas fa-spinner"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Proses</span>
                  <span class="info-box-number">{{ $pengaduanProses ?? 0 }} Laporan</span>
                  <small>Sedang Ditangani</small>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="info-box bg-success">
                <span class="info-box-icon"><i class="fas fa-check-circle"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Selesai</span>
                  <span class="info-box-number">{{ $pengaduanSelesai ?? 0 }} Laporan</span>
                  <small>Sudah Ditanggapi</small>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="info-box bg-secondary">
                <span class="info-box-icon"><i class="fas fa-list"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Total</span>
                  <span class="info-box-number">{{ $pengaduanTotal ?? 0 }} Laporan</span>
                  <small>Semua Pengaduan</small>
                </div>
              </div>
            </div>
          </div>

          @if(($pengaduanPending ?? 0) > 0)
          <div class="alert alert-warning">
            <i class="fas fa-exclamation-triangle"></i>
            <strong>Perhatian!</strong> Terdapat <strong>{{ $pengaduanPending }} pengaduan baru</strong> yang belum ditanggapi.
            <a href="/dashboard/pengaduans" class="alert-link">Klik di sini</a> untuk melihat dan menanggapi.
          </div>
          @endif
        </div>
      </div>
    </div>
  </div>
  @endif

      @endif
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

      <!-- Quick Actions - Only for Admin/Bidan -->
      @if(auth()->user()->level != 'ortu')
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
      @endif

    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection