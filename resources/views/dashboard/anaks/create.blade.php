@extends('dashboard.layouts.main')

@section('container')

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tambah Anak</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item active">Tambah Anak</li>
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
              <h3 class="card-title">Tambah Anak</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="/dashboard/anaks" class="mb-5" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                <div class="container">
                    <div class="row">

                        <div class="col-md-12">
                            <label for="nama_anak">Nama Anak</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-venus"></i></span>
                                </div>
                                <input type="text" class="form-control @error('nama_anak') is-invalid @enderror" id="nama_anak" name="nama_anak" value="{{ old('nama_anak') }}" autofocus>
                                @error('nama_anak')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label for="ortu_id">Nama Orang Tua</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-venus"></i></span>
                                </div>
                                <select class="form-control @error('ortu_id') is-invalid @enderror" name="ortu_id">
                                    <option selected="true" disabled="disabled" value="">-- Pilih Orang Tua --</option>
                                    @foreach ($ortus as $ortu)
                                    <option value="{{ $ortu->id }}" {{ old('ortu_id') == $ortu->id ? ' selected' : ' ' }}>{{ $ortu->nama_ibu }}</option>
                                    @endforeach
                                </select>
                                @error('ortu_id')
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
                                <input type="text" class="form-control @error('tempat_lhr') is-invalid @enderror" id="tempat_lhr" name="tempat_lhr" value="{{ old('tempat_lhr') }}">
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
                                <input type="date" class="form-control @error('tgl_lhr') is-invalid @enderror" id="tgl_lhr" name="tgl_lhr" value="{{ old('tgl_lhr') }}">
                                @error('tgl_lhr')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="bb_lhr">Berat Badan</label>
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-weight"></i></span>
                              </div>
                              <input type="text" class="form-control @error('bb_lhr') is-invalid @enderror" id="bb_lhr" name="bb_lhr" value="{{ old('bb_lhr') }}">
                              <div class="input-group-append">
                                  <span class="input-group-text">kg</span>
                              </div>
                              @error('bb_lhr')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                              @enderror
                            </div>
                        </div>
      
                          <div class="col-md-6">
                            <label for="tb_lhr">Tinggi Badan</label>
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-text-height"></i></span>
                              </div>
                              <input type="text" class="form-control @error('tb_lhr') is-invalid @enderror" id="tb_lhr" name="tb_lhr" value="{{ old('tb_lhr') }}">
                              <div class="input-group-append">
                                  <span class="input-group-text">cm</span>
                              </div>
                              @error('tb_lhr')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                              @enderror
                            </div>
                          </div>

                          <div class="col-md-12">
                              <p class="text-muted">Note: gunakan (.) sebagai pengganti (,)</p>
                          </div>

                        <div class="col-md-12">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
                              </div>
                              <select class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" id="jenis_kelamin">
                                <option selected="true" disabled="disabled" value="">-- Pilih jenis_kelamin --</option>
                                <option value="Laki - Laki" {{ old('jenis_kelamin') == 'Laki - Laki' ? ' selected' : ' ' }}>Laki - Laki</option>
                                <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? ' selected' : ' ' }}>Perempuan</option>
                              </select>
                              @error('jenis_kelamin')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                              @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label for="anak_ke">Anak Ke-</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-child"></i></span>
                                </div>
                                <input type="number" class="form-control @error('anak_ke') is-invalid @enderror" id="anak_ke" name="anak_ke" value="{{ old('anak_ke') }}">
                                @error('anak_ke')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label for="nik_anak">NIK</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-address-card"></i></span>
                                </div>
                                <input type="text" class="form-control @error('nik_anak') is-invalid @enderror" id="nik_anak" name="nik_anak" value="{{ old('nik_anak') }}">
                                @error('nik_anak')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label for="bpjs_anak">No BPJS</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-address-card"></i></span>
                                </div>
                                <input type="text" class="form-control @error('bpjs_anak') is-invalid @enderror" id="bpjs_anak" name="bpjs_anak" value="{{ old('bpjs_anak') }}">
                                @error('bpjs_anak')
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