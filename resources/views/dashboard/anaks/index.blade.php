@extends('dashboard.layouts.main')

@section('container')

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Anak</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item active">Anak</li>
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
            <h3 class="card-title">Data Anak</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <a href="/dashboard/anaks/create" class="btn btn-primary mb-3"><i class="fas fa-plus-square"></i> Create</a>
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>#</th>
                <th>Nama Anak</th>
                <th>Orang Tua</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Lahir</th>
                <th>Usia</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
              @foreach ($anaks as $anak)    
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $anak->nama_anak }}</td>
                <td>{{ $anak->ortu->nama_ibu }}</td>
                <td>{{ $anak->jenis_kelamin }}</td>
                <td>{{ $anak->tgl_lhr->isoFormat('dddd, D MMMM Y') }}</td>
                <td>{{ $anak->getAgeAttribute() }}</td>
                <td>
                  <a href="/dashboard/anaks/{{ $anak->id }}/edit" class="btn btn-success"><i class="far fa-edit"></i></a>
                  <form action="/dashboard/anaks/{{ $anak->id }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger border-0" onclick="return confirm('Kamu Yakin?')"><i class="far fa-trash-alt"></i></button>
                  </form>
                </td>
              </tr>
              @endforeach
              </tbody>
              <tfoot>
              <tr>
                <th>#</th>
                <th>Nama Anak</th>
                <th>Orang Tua</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Lahir</th>
                <th>Usia</th>
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