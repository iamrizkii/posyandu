@extends('dashboard.layouts.main')

@section('container')

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Jenis Imunisasi</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item active">Jenis Imunisasi</li>
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
            <h3 class="card-title">Data Jenis Imunisasi</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <a href="/dashboard/jenis_imunisasis/create" class="btn btn-primary mb-3"><i class="fas fa-plus-square"></i> Create</a>
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>#</th>
                <th>Nama Imunisasi</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
              @foreach ($datas as $data)    
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->nama_imun }}</td>
                <td>
                  <a href="/dashboard/jenis_imunisasis/{{ $data->id }}/edit" class="btn btn-success"><i class="far fa-edit"></i></a>
                  <form action="/dashboard/jenis_imunisasis/{{ $data->id }}" method="post" class="d-inline">
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
                <th>Nama Imunisasi</th>
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