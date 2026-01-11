@extends('dashboard.layouts.main')

@section('container')
<!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Berita</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
              <li class="breadcrumb-item"><a href="/dashboard/posts">Berita</a></li>
              <li class="breadcrumb-item active">Detail Berita</li>
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
              <h3 class="card-title">Detail Berita {{ $post->title }}</h3>
            </div>
            <div class="card-body">
                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
                <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger" onclick="return confirm('Are you Sure?')"><span data-feather="x-circle"></span> Delete</button>
                </form>
                @if ($post->image)
                <div style="max-height: 350px; overflow:hidden;">
                    <img class="img-fluid mt-3" src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}">
                </div>
                @else
                <img class="img-fluid mt-3" src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}">
                @endif
            <article class="my-3 fs-5">
                {!! $post->body !!}
            </article>
            </div>
            </div>
          </div>
        </div>
    </div>
  </section>

@endsection