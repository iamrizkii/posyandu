<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-dark"
  style="background: linear-gradient(90deg, #2E7D32 0%, #43A047 100%);">
  <!-- Left navbar links -->
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>
  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">

    <!-- User Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#" style="display: flex; align-items: center; gap: 8px;">
        <i class="far fa-user-circle" style="font-size: 1.3rem;"></i>
        <span class="d-none d-md-inline">{{ auth()->user()->name }}</span>
        <i class="fas fa-caret-down ml-1"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="min-width: 250px;">
        <div class="dropdown-header bg-light">
          <strong>{{ auth()->user()->name }}</strong>
          <br>
          <small class="text-muted">{{ auth()->user()->email }}</small>
          <br>
          <span class="badge badge-success mt-1">{{ ucfirst(auth()->user()->level) }}</span>
        </div>
        <div class="dropdown-divider"></div>
        <form action="/logout" method="post">
          @csrf
          <button type="submit" class="dropdown-item text-danger" style="display: flex; align-items: center; gap: 8px;">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span>
          </button>
        </form>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
        <i class="fas fa-th-large"></i>
      </a>
    </li>
  </ul>
</nav>
<!-- /.navbar -->