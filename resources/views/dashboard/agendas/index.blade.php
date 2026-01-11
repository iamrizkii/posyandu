@extends('dashboard.layouts.main')

@section('container')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-calendar-alt mr-2"></i>Agenda Kegiatan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Agenda</li>
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
                                <i class="fas fa-list mr-2"></i>Daftar Agenda
                            </h3>
                            <div class="card-tools">
                                <a href="/dashboard/agendas/create" class="btn btn-primary btn-sm">
                                    <i class="fas fa-plus-circle mr-1"></i>Tambah Agenda
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Judul Agenda</th>
                                        <th>Waktu</th>
                                        <th>Lokasi</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($agendas as $agenda)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><strong>{{ $agenda->judul }}</strong></td>
                                            <td>{{ date('d F Y H:i', strtotime($agenda->waktu)) }}</td>
                                            <td>{{ $agenda->lokasi }}</td>
                                            <td>
                                                @if($agenda->status == 'Segera')
                                                    <span class="badge badge-warning">Segera</span>
                                                @elseif($agenda->status == 'Selesai')
                                                    <span class="badge badge-success">Selesai</span>
                                                @else
                                                    <span class="badge badge-danger">Batal</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="/dashboard/agendas/{{ $agenda->slug }}/edit"
                                                    class="btn btn-success btn-sm">
                                                    <i class="far fa-edit"></i>
                                                </a>
                                                <form action="/dashboard/agendas/{{ $agenda->slug }}" method="post"
                                                    class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-danger btn-sm border-0"
                                                        onclick="return confirm('Yakin hapus agenda ini?')">
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