@extends('dashboard.layouts.main')

@section('container')

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tambah Imunisasi</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item active">Tambah Imunisasi</li>
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
              <h3 class="card-title">Tambah Imunisasi</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="/dashboard/imunisasis" class="mb-5" enctype="multipart/form-data">
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

                        <div class="col-md-12">
                            <label for="jenisimunisasi_id">Jenis Imunisasi</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-syringe"></i></span>
                                </div>
                                <select class="form-control @error('jenisimunisasi_id') is-invalid @enderror" name="jenisimunisasi_id">
                                    <option selected="true" disabled="disabled" value="">-- Pilih Jenis Imunisasi --</option>
                                    @foreach ($datas as $data)
                                    <option value="{{ $data->id }}" {{ old('jenisimunisasi_id') == $data->id ? ' selected' : ' ' }}>{{ $data->nama_imun }}</option>
                                    @endforeach
                                </select>
                                @error('jenisimunisasi_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        
                        <input type="text" name="tgl_imun" id="tgl_imun" value="{{ $now }}" hidden>

                        <div class="col-md-12">
                            <label for="booster">Booster</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-crutch"></i></span>
                                </div>
                                <select class="form-control @error('booster') is-invalid @enderror" name="booster">
                                    <option selected="true" disabled="disabled" value="">-- Pilih Booster --</option>
                                    <option value="Ya" {{ old('booster') == 'Ya' ? ' selected' : ' ' }}>Ya</option>
                                    <option value="Tidak" {{ old('booster') == 'Tidak' ? ' selected' : ' ' }}>Tidak</option>
                                </select>
                                @error('booster')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label for="ket_imun">Keterangan</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-clipboard"></i></span>
                                </div>
                                <input type="text" class="form-control @error('ket_imun') is-invalid @enderror" id="ket_imun" name="ket_imun" value="{{ old('ket_imun') }}" >
                                @error('ket_imun')
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