@extends('dashboard.layouts.main')

@section('container')

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tambah Berita</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item active">Tambah Berita</li>
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
              <h3 class="card-title">Tambah Berita</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="/dashboard/posts" class="mb-5" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="title">Judul</label>
                  <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" autofocus>
                  @error('title')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="slug">Slug</label>
                  <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug') }}" readonly>
                  @error('slug')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="category">Kategori</label>
                  <select class="form-control @error('category') is-invalid @enderror" name="category_id">
                    <option selected>Open this select menu</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? ' selected' : ' ' }}>{{ $category->name }}</option>
                    @endforeach
                  </select>
                  @error('category')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="image">Sampul</label>
                  <img class="imgPreview img-fluid mb-3 col-sm-5">
                  <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                  @error('image')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="isi">Isi</label>
                  <textarea id="summernote" name="body" class="@error('body') is-invalid @enderror">
                    {{ old('body') }}
                  </textarea>
                  @error('body')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                  @enderror
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

  <script>
    const title = document.querySelector("#title");
    const slug = document.querySelector("#slug");

    title.addEventListener("keyup", function() {
        let preslug = title.value;
        preslug = preslug.replace(/ /g,"-");
        slug.value = preslug.toLowerCase();
    });

    function previewImage() {
      const image = document.querySelector('#image')
      const imgPreview = document.querySelector('.imgPreview')

      imgPreview.style.display = 'block'

      const oFReader = new FileReader()
      oFReader.readAsDataURL(image.files[0])
      oFReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result
      }
    }
  </script>
@endsection