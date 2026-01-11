@extends('dashboard.layouts.main')

@section('container')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-print mr-2"></i>Laporan Posyandu</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Laporan</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Filter Laporan</h3>
                        </div>
                        <form action="/dashboard/laporan/preview" method="GET">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="jenis">Jenis Laporan</label>
                                    <select class="form-control" name="jenis" id="jenis" required>
                                        <option value="anak">Data Anak</option>
                                        <option value="timbang">Riwayat Penimbangan</option>
                                        <option value="imunisasi">Riwayat Imunisasi</option>
                                    </select>
                                </div>

                                <div class="row" id="periode-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="bulan">Bulan</label>
                                            <select class="form-control" name="bulan" id="bulan">
                                                @for($i = 1; $i <= 12; $i++)
                                                    <option value="{{ $i }}" {{ date('m') == $i ? 'selected' : '' }}>
                                                        {{ date('F', mktime(0, 0, 0, $i, 10)) }}
                                                    </option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tahun">Tahun</label>
                                            <select class="form-control" name="tahun" id="tahun">
                                                @for($i = date('Y'); $i >= 2020; $i--)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-eye mr-1"></i>Tampilkan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Simple script to toggle period inputs based on report type
        document.getElementById('jenis').addEventListener('change', function () {
            var style = (this.value === 'anak') ? 'none' : 'flex';
            document.getElementById('periode-row').style.display = style;
        });
        // Trigger on load
        document.getElementById('jenis').dispatchEvent(new Event('change'));
    </script>
@endsection