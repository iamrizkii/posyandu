@extends('dashboard.layouts.main')

@section('container')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Preview Laporan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard/laporan">Laporan</a></li>
                        <li class="breadcrumb-item active">Preview</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $title }}</h3>
                    <div class="card-tools">
                        <form action="/dashboard/laporan/preview" method="GET" target="_blank">
                            <input type="hidden" name="jenis" value="{{ $jenis }}">
                            <input type="hidden" name="bulan" value="{{ $bulan }}">
                            <input type="hidden" name="tahun" value="{{ $tahun }}">
                            <input type="hidden" name="print" value="true">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-print"></i> Cetak PDF
                            </button>
                        </form>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                @if($jenis == 'anak')
                                    <th>Nama Anak</th>
                                    <th>NIK</th>
                                    <th>Tgl Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Nama Ortu</th>
                                @elseif($jenis == 'timbang')
                                    <th>Tanggal</th>
                                    <th>Nama Anak</th>
                                    <th>Berat (kg)</th>
                                    <th>Tinggi (cm)</th>
                                    <th>Ket.</th>
                                @elseif($jenis == 'imunisasi')
                                    <th>Tanggal</th>
                                    <th>Nama Anak</th>
                                    <th>Jenis Imunisasi</th>
                                    <th>Petugas</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $d)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    @if($jenis == 'anak')
                                        <td>{{ $d->nama }}</td>
                                        <td>{{ $d->nik }}</td>
                                        <td>{{ $d->tgl_lhr->format('d/m/Y') }}</td>
                                        <td>{{ $d->jk }}</td>
                                        <td>{{ $d->ortu->nama_ibu ?? '-' }}</td>
                                    @elseif($jenis == 'timbang')
                                        <td>{{ $d->tanggal->format('d/m/Y') }}</td>
                                        <td>{{ $d->anak->nama }}</td>
                                        <td>{{ $d->berat_badan }}</td>
                                        <td>{{ $d->tinggi_badan }}</td>
                                        <td>{{ $d->keterangan }}</td>
                                    @elseif($jenis == 'imunisasi')
                                        <td>{{ $d->tanggal_imunisasi }}</td>
                                        <td>{{ $d->anak->nama }}</td>
                                        <td>{{ $d->jenis_imunisasi->nama }}</td>
                                        <td>{{ $d->user->name ?? 'Petugas' }}</td>
                                    @endif
                                </tr>
                            @endforeach
                            @if(count($data) == 0)
                                <tr>
                                    <td colspan="6" class="text-center">Tidak ada data</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection