@extends('dashboard.layouts.main')

@section('container')

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Orang Tua</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item active">Orang Tua</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  @if(session()->has('success'))
    <div class="container-fluid">
      <div class="alert alert-success col-lg-12" role="alert">
        {{ session('success') }}
      </div>
    </div>
  @endif

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Ortu</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <a href="/dashboard/ortus/create" class="btn btn-primary mb-3"><i class="fas fa-plus-square"></i> Create</a>
              <table id="example1" class="table table-bordered table-striped table-hover">
                <thead class="thead-light">
                  <tr>
                    <th>#</th>
                    <th>Nama Ibu</th>
                    <th>Nama Ayah</th>
                    <th>Alamat</th>
                    <th>Jumlah Anak</th>
                    <th>No HP</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($ortus as $ortu)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td><strong>{{ $ortu->nama_ibu }}</strong></td>
                      <td>{{ $ortu->nama_ayah }}</td>
                      <td>{{ $ortu->alamat }}</td>
                      <td>
                        @if($ortu->anaks->count() > 0)
                          <span class="badge badge-primary badge-lg">
                            <i class="fas fa-child mr-1"></i>{{ $ortu->anaks->count() }} Anak
                          </span>
                        @else
                          <span class="badge badge-secondary">Belum ada</span>
                        @endif
                      </td>
                      <td>{{ $ortu->nohp }}</td>
                      <td>
                        <a href="/dashboard/ortus/{{ $ortu->id }}/edit" class="btn btn-success btn-sm">
                          <i class="far fa-edit"></i>
                        </a>
                        <form action="/dashboard/ortus/{{ $ortu->id }}" method="post" class="d-inline">
                          @method('delete')
                          @csrf
                          <button class="btn btn-danger btn-sm border-0" onclick="return confirm('Kamu Yakin?')">
                            <i class="far fa-trash-alt"></i>
                          </button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Nama Ibu</th>
                    <th>Nama Ayah</th>
                    <th>Alamat</th>
                    <th>Jumlah Anak</th>
                    <th>No HP</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
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