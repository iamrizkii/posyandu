@extends('dashboard.layouts.main')

@section('container')

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tambah Vitamin A</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item active">Tambah Vitamin A</li>
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
              <h3 class="card-title">Tambah Vitamin A</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="/dashboard/vitamin_as" class="mb-5" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                <div class="container">
                    <div class="row">

                        <div class="col-md-12">
                            <label for="anak_id">Nama Anak</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-child"></i></span>
                                </div>
                                <select class="form-control @error('anak_id') is-invalid @enderror" name="anak_id">
                                    <option selected="true" disabled="disabled" value="">-- Pilih Anak --</option>
                                    @foreach ($anaks as $anak)
                                    <option value="{{ $anak->id }}" {{ old('anak_id') == $anak->id ? ' selected' : ' ' }}>{{ $anak->nama_anak }}</option>
                                    @endforeach
                                </select>
                                @error('anak_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <input type="text" name="tgl" id="tgl" value="{{ $now }}" hidden>

                        <div class="col-md-12">
                            <label for="keterangan">Keterangan</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-clipboard"></i></span>
                                </div>
                                <input type="text" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" value="{{ old('keterangan') }}">
                                @error('keterangan')
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
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-danger">Reset</button>
              </div>
            </form>
          </div>
          <!-- /.card -->
        </div>
      </div>
    </section>
@endsection