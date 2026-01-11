@extends('dashboard.layouts.main')

@section('container')

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Jenis Imunisasi</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item active">Edit Jenis Imunisasi</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit Jenis Imunisasi</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="/dashboard/jenis_imunisasis/{{ $jenis->id }}" class="mb-5" enctype="multipart/form-data">
              @method('put')
              @csrf
              <div class="card-body">
                <div class="container">
                    <div class="row">

                        <div class="col-md-12">
                            <label for="nama_imun">Nama Imunisasi</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-venus"></i></span>
                                </div>
                                <input type="text" class="form-control @error('nama_imun') is-invalid @enderror" id="nama_imun" name="nama_imun" value="{{ old('nama_imun', $jenis->nama_imun) }}" autofocus>
                                @error('nama_imun')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>



                    </div>
                </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </form>
          </div>
          <!-- /.card -->
        </div>
      </div>
    </section>
@endsection