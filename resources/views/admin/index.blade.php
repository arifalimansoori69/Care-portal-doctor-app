@extends('admin.layout')

@section('content')
<!-- ✅ jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- ✅ Bootstrap Bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- ✅ Feather Icons -->
<script src="https://unpkg.com/feather-icons"></script>
<script>
  feather.replace();
</script>

<!-- ✅ Sidebar Dropdown Toggle Script -->
<script>
  $(document).ready(function () {
    $('.menu-toggle').on('click', function (e) {
      e.preventDefault();
      $(this).next('.dropdown-menu').slideToggle(200);
      $(this).parent().toggleClass('active');
    });
  });
</script>


<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">

    <!-- 🔹 Brand Logo -->
    <div class="sidebar-brand">
      <a href="{{ url('/admin/dashboard') }}">
        <img alt="image" src="{{ asset('asset/img/logo.png') }}" class="header-logo" />
        <span class="logo-name">Otika</span>
      </a>
    </div>

    <!-- 🔹 Sidebar Menu -->
    <ul class="sidebar-menu">
      <li class="menu-header">Main</li>

      <!-- 🟢 Dashboard -->
      <li class="dropdown active">
        <a href="{{ url('/admin/dashboard') }}" class="nav-link">
          <i data-feather="monitor"></i>
          <span>Admin Dashboard</span>
        </a>
      </li>

      <!-- 🧩 Widgets Dropdown -->
      <li class="dropdown">
        <a href="" class="menu-toggle nav-link has-dropdown">
          <i data-feather="grid"></i>
          <span>Widgets</span>
        </a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="{{ url('admin.adddoctor.create') }}">Add Doctor</a></li>
          <li><a class="dropdown-item" href="{{ url('admin/showdoc') }}">Show All Doctors</a></li>
          <li><a class="nav-link" href="{{ url('/admin/patients/create') }}">Add Patient</a></li>
          <li><a class="nav-link" href="{{ url('/admin/patients') }}">View All Patients</a></li>
          <li><a class="nav-link" href="{{ url('/admin/appointments') }}">Appointments</a></li>
        </ul>
      </li>

      <!-- 🩺 Doctors -->
      <li class="dropdown">
        <a href="#" class="menu-toggle nav-link has-dropdown">
          <i data-feather="user-plus"></i>
          <span>Doctors</span>
        </a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="{{ url('/admin/doctors/create') }}">Add New Doctor</a></li>
          <li><a class="nav-link" href="{{ url('/admin/doctors') }}">View All Doctors</a></li>
        </ul>
      </li>

      <!-- 👨‍⚕️ Patients -->
      <li class="dropdown">
        <a href="#" class="menu-toggle nav-link has-dropdown">
          <i data-feather="users"></i>
          <span>Patients</span>
        </a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="{{ url('/admin/patients/create') }}">Add New Patient</a></li>
          <li><a class="nav-link" href="{{ url('/admin/patients') }}">View All Patients</a></li>
        </ul>
      </li>

      <!-- 📅 Appointments -->
      <li class="dropdown">
        <a href="#" class="menu-toggle nav-link has-dropdown">
          <i data-feather="calendar"></i>
          <span>Appointments</span>
        </a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="{{ url('/admin/appointments/create') }}">Add Appointment</a></li>
          <li><a class="nav-link" href="{{ url('/admin/appointments') }}">View All Appointments</a></li>
        </ul>
      </li>

      <!-- ⚙️ Settings -->
      <li>
        <a href="{{ url('/admin/settings') }}" class="nav-link">
          <i data-feather="settings"></i>
          <span>Settings</span>
        </a>
      </li>

      <!-- 🚪 Logout -->
      <li>
        <a href="{{ route('logout') }}" class="nav-link"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <i data-feather="log-out"></i>
          <span>Logout</span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </li>

    </ul>
  </aside>
</div>

@endsection
