@extends('dashboard.layouts.main')

@section('container')

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Ortu</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item active">Edit Ortu</li>
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
              <h3 class="card-title">Edit Ortu</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="/dashboard/ortus/{{ $ortu->id }}" class="mb-5" enctype="multipart/form-data">
              @method('put')
              @csrf
              <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="nama_ibu">Nama Ibu</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-venus"></i></span>
                                </div>
                                <input type="text" class="form-control @error('nama_ibu') is-invalid @enderror" id="nama_ibu" name="nama_ibu" value="{{ old('nama_ibu', $ortu->nama_ibu) }}" autofocus>
                                @error('nama_ibu')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
        
                        <div class="col-md-12">
                            <label for="nama_ayah">Nama Ayah</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-mars"></i></span>
                                </div>
                                <input type="text" class="form-control @error('nama_ayah') is-invalid @enderror" id="nama_ayah" name="nama_ayah" value="{{ old('nama_ayah', $ortu->nama_ayah) }}">
                                @error('nama_ayah')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
        
                        <div class="col-md-6">
                            <label for="tempat_lhr">Tempat Lahir</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-home"></i></span>
                                </div>
                                <input type="text" class="form-control @error('tempat_lhr') is-invalid @enderror" id="tempat_lhr" name="tempat_lhr" value="{{ old('tempat_lhr', $ortu->tempat_lhr) }}">
                                @error('tempat_lhr')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
        
                        <div class="col-md-6">
                            <label for="tgl_lhr">Tanggal Lahir</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="date" class="form-control @error('tgl_lhr') is-invalid @enderror" id="tgl_lhr" name="tgl_lhr" value="{{ old('tgl_lhr', $ortu->tgl_lhr) }}">
                                @error('tgl_lhr')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label for="alamat">Alamat</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                                </div>
                                <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ old('alamat', $ortu->alamat) }}">
                                @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label for="agama">Agama</label>
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-praying-hands"></i></span>
                              </div>
                              <select class="form-control @error('agama') is-invalid @enderror" name="agama" id="agama">
                                <option selected="true" disabled="disabled" value="">-- Pilih Agama --</option>
                                <option value="Islam" {{ old('agama', $ortu->agama) == 'Islam' ? ' selected' : ' ' }}>Islam</option>
                                <option value="Kristen" {{ old('agama', $ortu->agama) == 'Kristen' ? ' selected' : ' ' }}>Kristen</option>
                                <option value="Hindu" {{ old('agama', $ortu->agama) == 'Hindu' ? ' selected' : ' ' }}>Hindu</option>
                                <option value="Buddha" {{ old('agama', $ortu->agama) == 'Buddha' ? ' selected' : ' ' }}>Buddha</option>
                              </select>
                              @error('agama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                              @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label for="nik">NIK</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-address-card"></i></span>
                                </div>
                                <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" value="{{ old('nik', $ortu->nik) }}">
                                @error('nik')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label for="kk">No KK</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-address-card"></i></span>
                                </div>
                                <input type="text" class="form-control @error('kk') is-invalid @enderror" id="kk" name="kk" value="{{ old('kk', $ortu->kk) }}">
                                @error('kk')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label for="nohp">No HP</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                                <input type="text" class="form-control @error('nohp') is-invalid @enderror" id="nohp" name="nohp" value="{{ old('nohp', $ortu->nohp) }}">
                                @error('nohp')
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