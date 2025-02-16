<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-store"></i>
    </div>
    <div class="sidebar-brand-text mx-3">NoyShop</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route('dashboard') }}">
      <i class="fas fa-home"></i>
      <span>Dashboard</span>
    </a>
  </li>

  <!-- Nav Item - Products -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route('products.index') }}">
      <i class="fas fa-box-open"></i>
      <span>Products</span>
    </a>
  </li>

  <!-- Nav Item - Admin Users -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route('admin.users') }}">
      <i class="fas fa-user-shield"></i>
      <span>Admin Users</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('admin.profile.show') }}">
      <i class="fas fa-user-shield"></i>
      <span>profile</span>
    </a>
  </li>
  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
