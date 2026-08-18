<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Care portal - Admin Dashboard Template</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('asset/css/app.min.css') }}">
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/css/components.css') }}">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="{{ asset('asset/css/custom.css') }}">
  <link rel='shortcut icon' type='image/x-icon' href="{{ asset('asset/img/favicon.ico') }}" />
</head>

<body>

  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg collapse-btn">
              <i data-feather="align-justify"></i>
            </a></li>
          </ul>
        </div>
        <div class="navbar-nav navbar-right">
          <a href="#" class="nav-link nav-link-lg fullscreen-btn">
            <i data-feather="maximize"></i>
          </a>
          <div class="dropdown">
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
              <img alt="image" src="{{ asset('asset/img/user.png') }}" class="user-img-radious-style">
              <span class="d-sm-none d-lg-inline-block"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
            @if(Auth::check())
    <div class="dropdown-title">Hello {{ Auth::user()->name }}</div>
@else
    <div class="dropdown-title">Hello Guest</div>
@endif

              <a href="{{ route('profile.show') }}" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <div class="dropdown-divider"></div>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}" 
                   onclick="event.preventDefault(); this.closest('form').submit();" 
                   class="dropdown-item has-icon text-danger">
                  <i class="fas fa-sign-out-alt"></i> Logout
                </a>
              </form>
            </div>
          </div>
        </div>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
              class="nav-link nav-link-lg message-toggle"><i data-feather="mail"></i>
              <span class="badge headerBadge1">
                6 </span> </a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
              <div class="dropdown-header">
                Messages
                <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>
              </div>
              <div class="dropdown-list-content dropdown-list-message">
                <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar
											text-white"> <img alt="image" src="assets/img/users/user-1.png" class="rounded-circle">
                  </span> <span class="dropdown-item-desc"> <span class="message-user">John
                      Deo</span>
                    <span class="time messege-text">Please check your mail !!</span>
                    <span class="time">2 Min Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                    <img alt="image" src="assets/img/users/user-2.png" class="rounded-circle">
                  </span> <span class="dropdown-item-desc"> <span class="message-user">Sarah
                      Smith</span> <span class="time messege-text">Request for leave
                      application</span>
                    <span class="time">5 Min Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                    <img alt="image" src="assets/img/users/user-5.png" class="rounded-circle">
                  </span> <span class="dropdown-item-desc"> <span class="message-user">Jacob
                      Ryan</span> <span class="time messege-text">Your payment invoice is
                      generated.</span> <span class="time">12 Min Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                    <img alt="image" src="assets/img/users/user-4.png" class="rounded-circle">
                  </span> <span class="dropdown-item-desc"> <span class="message-user">Lina
                      Smith</span> <span class="time messege-text">hii John, I have upload
                      doc
                      Min Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                    <img alt="image" src="assets/img/users/user-3.png" class="rounded-circle">
                  </span> <span class="dropdown-item-desc"> <span class="message-user">Jalpa
        </ul>
      </nav>
      
      <!-- Sidebar Start -->
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}">
              <img alt="image" src="{{ asset('asset/img/logo.png') }}" class="header-logo" />
              <span class="logo-name">Care Portal</a></span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            
            <!-- Dashboard -->
            <li class="dropdown {{ request()->is('admin/dashboard*') ? 'active' : '' }}">
              <a href="{{ route('admin.dashboard') }}" class="nav-link">
                <i data-feather="monitor"></i>
                <span>Admin Dashboard</span>
              </a>
            </li>

            <!-- Widgets -->
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                <i data-feather="grid"></i>
                <span>Widgets</span>
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('adddoctor.create') }}">Add Doctor</a></li>
                <li><a class="dropdown-item" href="{{ route('showdoc') }}">Show All Doctors</a></li>
                <!-- <li><a class="dropdown-item" href="#">Add Patient</a></li>
                <li><a class="dropdown-item" href="#">View All Patients</a></li>
                <li><a class="dropdown-item" href="#">Appointments</a></li>
              </ul>
            </li>

          
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown">
                <i data-feather="user-plus"></i>
                <span>Doctors</span>
              </a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('adddoctor.create') }}">Add New Doctor</a></li>
                <li><a class="nav-link" href="#">View All Doctors</a></li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown">
                <i data-feather="users"></i>
                <span>Patients</span>
              </a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="#">Add New Patient</a></li>
                <li><a class="nav-link" href="#">View All Patients</a></li>
              </ul>
            </li>

          
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown">
                <i data-feather="calendar"></i>
                <span>Appointments</span>
              </a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="#">Add Appointment</a></li>
                <li><a class="nav-link" href="#">View All Appointments</a></li>
              </ul>
            </li> -->

            <!-- Settings -->
            <li>
              <a href="#" class="nav-link">
                <i data-feather="settings"></i>
                <span>Settings</span>
              </a>
            </li>

            <!-- Logout -->
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
      <!-- Sidebar End -->

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            @yield('content')
          </div>
        </section>
        
        <!-- Footer -->
        <footer class="main-footer">
          <div class="footer-left">
            Copyright &copy; {{ date('Y') }} <div class="bullet"></div> Care Portal - Admin Dashboard
          </div>
          <div class="footer-right">
            v1.0.0
          </div>
        </footer>
      </div>
  </div>
  <!-- General JS Scripts -->
  <script src="{{ asset('asset/js/app.min.js') }}"></script>
  
  <!-- JS Libraies -->
  <script src="{{ asset('asset/bundles/apexcharts/apexcharts.min.js') }}"></script>
  
  <!-- Template JS File -->
  <script src="{{ asset('asset/js/scripts.js') }}"></script>
  
  <!-- Feather Icons -->
  <script src="https://unpkg.com/feather-icons"></script>
  
  <!-- Custom JS File -->
  <script src="{{ asset('asset/js/custom.js') }}"></script>
  
  <!-- Simple Dropdown Toggle -->
  <!-- <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Initialize Feather Icons
      feather.replace();
      
      // Toggle dropdown on click
      document.querySelectorAll('.has-dropdown').forEach(toggle => {
        toggle.addEventListener('click', function(e) {
          e.preventDefault();
          e.stopPropagation();
          
          // Get the dropdown menu
          const dropdown = this.nextElementSibling;
          
          // Toggle the dropdown
          if (dropdown.style.display === 'block') {
            dropdown.style.display = 'none';
          } else {
            // Close all dropdowns first
            document.querySelectorAll('.dropdown-menu').forEach(menu => {
              menu.style.display = 'none';
            });
            // Open the clicked dropdown
            dropdown.style.display = 'block';
          }
        });
      });
      
      // Close dropdowns when clicking outside
      document.addEventListener('click', function() {
        document.querySelectorAll('.dropdown-menu').forEach(menu => {
          menu.style.display = 'none';
        });
      });
      
      // Prevent dropdown from closing when clicking inside it
      document.querySelectorAll('.dropdown-menu').forEach(menu => {
        menu.addEventListener('click', function(e) {
          e.stopPropagation();
        });
      });
      
      // Close dropdown when clicking on a menu item
      document.querySelectorAll('.dropdown-item').forEach(item => {
        item.addEventListener('click', function() {
          document.querySelectorAll('.dropdown-menu').forEach(menu => {
            menu.style.display = 'none';
          });
        });
      });
    });
  </script>
  
  <style>
    /* Ensure dropdowns are styled correctly */
    .dropdown-menu {
      display: none;
      position: absolute;
      background: #fff;
      min-width: 200px;
      box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
      z-index: 1000;
      border-radius: 0.25rem;
      padding: 0.5rem 0;
    }
    
    .dropdown-item {
      display: block;
      width: 100%;
      padding: 0.5rem 1.5rem;
      clear: both;
      font-weight: 400;
      color: #212529;
      text-align: inherit;
      white-space: nowrap;
      background-color: transparent;
      border: 0;
      text-decoration: none;
    }
    
    .dropdown-item:hover {
      background-color: #f8f9fa;
    }
    
    .dropdown:hover > .dropdown-menu {
      display: block;
    }
  </style>
  
  @stack('scripts') -->
  
  </body>
  </html>