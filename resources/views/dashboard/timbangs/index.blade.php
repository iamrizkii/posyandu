@extends('dashboard.layouts.main')

@section('container')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-balance-scale mr-2"></i>Hasil Timbang</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Hasil Timbang</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    @if(session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                        </div>
                    @endif

                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-list mr-2"></i>Riwayat Penimbangan
                            </h3>
                            <div class="card-tools">
                                <a href="/dashboard/timbangs/create" class="btn btn-primary btn-sm">
                                    <i class="fas fa-plus-circle mr-1"></i>Input Timbang Anak
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Tanggal</th>
                                        <th>Nama Anak</th>
                                        <th>Berat (kg)</th>
                                        <th>Tinggi (cm)</th>
                                        <th>Lingkar Kepala (cm)</th>
                                        <th>Ket.</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($timbangs as $timbang)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ date('d F Y', strtotime($timbang->tanggal)) }}</td>
                                            <td><strong>{{ $timbang->anak->nama }}</strong></td>
                                            <td>{{ $timbang->berat_badan }} kg</td>
                                            <td>{{ $timbang->tinggi_badan }} cm</td>
                                            <td>{{ $timbang->lingkar_kepala }} cm</td>
                                            <td>{{ $timbang->keterangan ?? '-' }}</td>
                                            <td>
                                                <a href="/dashboard/timbangs/{{ $timbang->id }}/edit"
                                                    class="btn btn-success btn-sm">
                                                    <i class="far fa-edit"></i>
                                                </a>
                                                <form action="/dashboard/timbangs/{{ $timbang->id }}" method="post"
                                                    class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-danger btn-sm border-0"
                                                        onclick="return confirm('Yakin hapus data ini?')">
                                                        <i class="far fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection