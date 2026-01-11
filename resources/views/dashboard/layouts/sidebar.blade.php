<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-success elevation-4"
  style="background: linear-gradient(180deg, #1a252f 0%, #2c3e50 100%) !important;">
  <!-- Brand Logo -->
  <a href="/dashboard" class="brand-link"
    style="background: rgba(46, 204, 113, 0.15); border-bottom: 1px solid rgba(255,255,255,0.1);">
    <i class="fas fa-heartbeat brand-image" style="font-size: 1.8rem; margin-left: 0.8rem; color: #2ecc71;"></i>
    <span class="brand-text font-weight-bold text-white">POSYANDU</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center"
      style="border-bottom: 1px solid rgba(255,255,255,0.1);">
      <div class="image">
        <i class="fas fa-user-circle" style="font-size: 2.5rem; color: #2ecc71;"></i>
      </div>
      <div class="info">
        <a href="#" class="d-block text-white font-weight-bold">{{ auth()->user()->name }}</a>
        <span class="badge"
          style="background: #2ecc71; color: white; font-size: 0.7rem;">{{ ucfirst(auth()->user()->level) }}</span>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="/dashboard" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>

        @can('admin')
          <li class="nav-item">
            <a href="/dashboard/users" class="nav-link {{ Request::is('dashboard/users*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-users-cog"></i>
              <p>Kelola User</p>
            </a>
          </li>
        @endcan

        @can('admin')
          <li class="nav-item">
            <a href="#"
              class="nav-link {{ Request::is('dashboard/ortus*') || Request::is('dashboard/anaks*') || Request::is('dashboard/jenis_imunisasis*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-database"></i>
              <p>
                Data Master
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/dashboard/ortus" class="nav-link {{ Request::is('dashboard/ortus*') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Ortu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/dashboard/anaks" class="nav-link {{ Request::is('dashboard/anaks*') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Anak</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/dashboard/jenis_imunisasis"
                  class="nav-link {{ Request::is('dashboard/jenis_imunisasis*') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jenis Imunisasi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data kader</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>PKK</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>UKM</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="/dashboard/timbangs/create"
              class="nav-link {{ Request::is('dashboard/timbangs/create') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Timbang Anak
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/dashboard/timbangs"
              class="nav-link {{ Request::is('dashboard/timbangs') || Request::is('dashboard/timbangs/*/edit') ? 'active' : '' }}">
              <i class="nav-icon fas fa-balance-scale"></i>
              <p>
                Hasil Timbang
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/dashboard/imunisasis" class="nav-link {{ Request::is('dashboard/imunisasis*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-syringe"></i>
              <p>
                Imunisasi
              </p>
            </a>
          </li>
        @endcan

        @can('bidan')
          <li class="nav-item {{ Request::is('dashboard/informasi-imunisasi*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ Request::is('dashboard/informasi-imunisasi*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-info-circle"></i>
              <p>
                Informasi Imunisasi
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('informasi-imunisasi.index') }}"
                  class="nav-link {{ Request::is('dashboard/informasi-imunisasi') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard Info</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('informasi-imunisasi.dapat') }}"
                  class="nav-link {{ Request::is('dashboard/informasi-imunisasi/dapat*') ? 'active' : '' }}">
                  <i class="fas fa-check-circle nav-icon text-success"></i>
                  <p>Dapat Imunisasi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('informasi-imunisasi.tidak-dapat') }}"
                  class="nav-link {{ Request::is('dashboard/informasi-imunisasi/tidak-dapat*') ? 'active' : '' }}">
                  <i class="fas fa-times-circle nav-icon text-secondary"></i>
                  <p>Tidak Dapat</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('informasi-imunisasi.sudah') }}"
                  class="nav-link {{ Request::is('dashboard/informasi-imunisasi/sudah*') ? 'active' : '' }}">
                  <i class="fas fa-syringe nav-icon text-info"></i>
                  <p>Sudah Imunisasi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('informasi-imunisasi.belum') }}"
                  class="nav-link {{ Request::is('dashboard/informasi-imunisasi/belum*') ? 'active' : '' }}">
                  <i class="fas fa-exclamation-triangle nav-icon text-danger"></i>
                  <p>Belum Imunisasi</p>
                </a>
              </li>
            </ul>
          </li>
        @endcan

        @can('admin')
          <li class="nav-item">
            <a href="/dashboard/vitamin_as" class="nav-link {{ Request::is('dashboard/vitamin_as*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-capsules"></i>
              <p>
                Vitamin A
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/dashboard/agendas" class="nav-link {{ Request::is('dashboard/agendas*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Agenda
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/dashboard/buku_tamus" class="nav-link {{ Request::is('dashboard/buku_tamus*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-address-book"></i>
              <p>
                Buku Tamu
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link {{ Request::is('dashboard/posts*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-list-ol"></i>
              <p>
                Kegiatan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/dashboard/posts" class="nav-link {{ Request::is('dashboard/posts*') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Berita</p>
                </a>
              </li>
            </ul>
          </li>
        @endcan

        <!-- Pengaduan - Accessible by all authenticated users -->
        <li class="nav-item">
          <a href="/dashboard/pengaduans" class="nav-link {{ Request::is('dashboard/pengaduans*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-bullhorn"></i>
            <p>
              Pengaduan
            </p>
          </a>
        </li>

        @can('admin')
          <li class="nav-item">
            <a href="/dashboard/laporan" class="nav-link {{ Request::is('dashboard/laporan*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-print"></i>
              <p>
                Laporan
              </p>
            </a>
          </li>
        @endcan
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>