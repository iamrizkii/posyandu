@extends('dashboard.layouts.main')

@section('container')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-users-cog mr-2"></i>Kelola User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Kelola User</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    @if(session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                        </div>
                    @endif

                    @if(session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-circle mr-2"></i>{{ session('error') }}
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                        </div>
                    @endif

                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-list mr-2"></i>Daftar User
                            </h3>
                            <div class="card-tools">
                                <a href="/dashboard/users/create" class="btn btn-primary btn-sm">
                                    <i class="fas fa-plus-circle mr-1"></i>Tambah User
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Level</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><strong>{{ $user->name }}</strong></td>
                                            <td>{{ $user->username }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @if($user->level == 'admin')
                                                    <span class="badge badge-danger">Admin</span>
                                                @elseif($user->level == 'bidan')
                                                    <span class="badge badge-success">Bidan</span>
                                                @else
                                                    <span class="badge badge-secondary">Member</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="/dashboard/users/{{ $user->id }}/edit" class="btn btn-success btn-sm">
                                                    <i class="far fa-edit"></i>
                                                </a>
                                                @if(auth()->user()->id !== $user->id)
                                                    <form action="/dashboard/users/{{ $user->id }}" method="post" class="d-inline">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="btn btn-danger btn-sm border-0"
                                                            onclick="return confirm('Yakin hapus user ini?')">
                                                            <i class="far fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
@endsection