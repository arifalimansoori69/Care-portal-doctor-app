<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>home page</title>
  <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
  <link rel="shortcut icon" href="images/fevicon.ico.png" type="image/x-icon" />
  <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="css/colors.css">
  <link rel="stylesheet" href="css/versions.css">
  <link rel="stylesheet" href="css/responsive.css">
  <link rel="stylesheet" href="css/custom.css">
  <style>
    /* Reset and Base Styles */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    
    body {
      font-family: Arial, sans-serif;
      padding-top: 80px; /* Space for fixed header */
    }
    
    /* Navigation Styles */
    .site-header {
      background: #fff;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
      position: fixed;
      width: 100%;
      top: 0;
      z-index: 1000;
    }
    
    .header-inner {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px 20px;
      max-width: 1200px;
      margin: 0 auto;
      position: relative;
    }
    
    .brand a {
      display: flex;
      align-items: center;
      text-decoration: none;
      margin-right: 0;
      margin-left:0
    }
    
    .logo {
      height: 60px;
      margin-right: 5px;
      margin-left: 0;
      border-radius: 10px;
    }
    
    .brand h1 {
      font-size: 20px;
      color: teal;
      margin: 0;
      font-weight: 600;
    }
    
    /* Navigation Links */
    .nav-link {
      display: flex;
      align-items: center;
      gap: 3px;
      padding: 8px 10px;
    }
    
    .nav-link i {
      font-size: 0.6em;
    }
    
    .nav {
      display: flex;
      list-style: none;
      margin: 0;
      padding: 0;
      align-items: center;
    }
    
    .nav-link {
      color: #000 !important;
      text-decoration: none;
      padding: 10px 15px;
      font-weight: 500;
      transition: color 0.3s;
    }
    
    .nav-link:hover {
      color: #3490dc !important;
    }
    
    /* Desktop Navigation */
    .desktop-nav {
      display: block;
      
    
    }
    
    /* Mobile Navigation */
    .mobile-nav {
      display: none;
      position: relative;
    }
    
    /* Menu Toggle Button */
    .menu-toggle {
      background: none;
      border: 2px solid #000;
      border-radius: 4px;
      font-size: 24px;
      cursor: pointer;
      color: #000;
      padding: 5px 10px;
      z-index: 1001;
    }
    
    /* Dropdown Menu */
    .dropdown-menu {
      display: none;
      position: absolute;
      right: 0;
      top: 100%;
      background: #fff;
      min-width: 200px;
      box-shadow: 0 8px 16px rgba(0,0,0,0.1);
      z-index: 1000;
      border-radius: 4px;
      padding: 10px 0;
      margin-top: 10px;
    }
    
    .dropdown-menu.active {
      display: block;
    }
    
    .dropdown-item {
      display: block;
      padding: 10px 20px;
      color: #000;
      text-decoration: none;
      transition: background-color 0.2s;
    }
    
    .dropdown-item:hover {
      background-color: #f8f9fa;
      color: #3490dc;
    }
    
    /* Responsive Styles */
    @media (max-width: 992px) {
      .desktop-nav {
        display: none;
      }
      
      .mobile-nav {
        display: block;
      }
      
      .nav-link {
        color: #000 !important;
      }
      .menu-toggle {
        display: block;
        z-index: 1001;
      }
      
      .nav {
        display: none;
        position: absolute;
        top: 80px;
        left: 0;
        right: 0;
        background: #fff;
        flex-direction: column;
        padding: 20px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        z-index: 1000;
      }
      
      .nav.active {
        display: flex;
      }
      
      .nav-link {
        padding: 12px 0;
        border-bottom: 1px solid #eee;
        width: 100%;
        text-align: center;
      }
      
      .ms-auto {
        margin-top: 15px;
        display: flex;
        flex-direction: column;
        gap: 10px;
        width: 100%;
      }
      
      .ms-auto .btn {
        margin: 5px 0 !important;
        width: 100%;
        text-align: center;
      }
    }
    
    /* Button Styles */
    .btn-outline-light {
      color: #000 !important;
      border-color: #000;
    }
    
    .btn-outline-light:hover {
      background-color: #000;
      color: #fff !important;
    }
    
    .btn-warning {
      background-color: #ffc107;
      color: #000 !important;
    }
    
    .btn-warning:hover {
      background-color: #e0a800;
    }
    
    /* Ensure content is not hidden behind fixed header */
    body {
      padding-top: 80px;
    }
  </style>
</head>
<body>


<header class="site-header">
  <div class="header-inner">
    <div class="brand">
      <a href="{{ route('index') }}">
        <img src="{{ asset('assets/images/logo.png') }}" 
             alt="CARE Health Portal Logo" 
             class="logo">
        <h1>CARE Portal</h1>
      </a>
    </div>
    
    <!-- Desktop Navigation -->
    <nav class="desktop-nav">
      <ul class="nav">
        <li><a class="nav-link" href="{{ route('index') }}"><span>Home</span></a></li>
        <li><a class="nav-link" href="{{ route('about') }}"><span>About</span></a></li>
        <li><a class="nav-link" href="{{ route('doctor') }}"><span>Doctor</span></a></li>
        <li><a class="nav-link" href="{{ route(name: 'services') }}"><span>Services</span></a></li>
        <li><a class="nav-link" href="{{ route('diseases.index') }}"><span>Diseases</span></a></li>
        <li><a class="nav-link" href="{{ route('news') }}"><span>News</span></a></li>
        <li><a class="nav-link" href="{{ route('appointments.index') }}"><span>Appointment</span></a></li>
        <li><a class="nav-link" href="{{ route('contact') }}"><span>Contact</span></a></li>
        <li class="ms-auto">
          @auth
              <x-logout-button class="nav-link" />
          @else
              <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm">Login</a>
              <a href="{{ route('register') }}" class="btn btn-warning btn-sm">Register</a>
          @endauth
        </li>
      </ul>
    </nav>
    
    <!-- Mobile Navigation -->
    <div class="mobile-nav">
      <button class="menu-toggle" id="mobile-menu" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>
      <div class="dropdown-menu" id="dropdown-menu">
        <a class="dropdown-item" href="{{ route('index') }}">Home</a>
        <a class="dropdown-item" href="{{ route('about') }}">About</a>
        <a class="dropdown-item" href="{{ route('doctor') }}">Doctor</a>
        <a class="dropdown-item" href="{{ route('services') }}"></i>Services</a>
        <a class="dropdown-item" href="{{ route('diseases.index') }}">Diseases</a>
        <a class="dropdown-item" href="{{ route('news') }}">News</a>
        <a class="dropdown-item" href="{{ route('appointments.index') }}">Appointments</a>
        <a class="dropdown-item" href="{{ route('contact') }}">Contact</a>
        @auth
            <x-logout-button class="dropdown-item" />
        @else
            <a href="{{ route('login') }}" class="dropdown-item">Login</a>
            <a href="{{ route('register') }}" class="dropdown-item">Register</a>
        @endauth
      </div>
    </div>
  </div>
</header>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const menuToggle = document.getElementById('mobile-menu');
  const dropdownMenu = document.querySelector('.dropdown-menu');
  
  // Toggle dropdown menu
  menuToggle.addEventListener('click', function(e) {
    e.stopPropagation();
    dropdownMenu.classList.toggle('active');
  });
  
  // Close dropdown when clicking outside
  document.addEventListener('click', function(event) {
    if (!dropdownMenu.contains(event.target) && !menuToggle.contains(event.target)) {
      dropdownMenu.classList.remove('active');
    }
  });
  
  // Close dropdown when a menu item is clicked
  document.querySelectorAll('.dropdown-item').forEach(item => {
    item.addEventListener('click', function() {
      dropdownMenu.classList.remove('active');
    });
  });
  
  // Handle window resize
  function handleResize() {
    if (window.innerWidth > 992) {
      dropdownMenu.classList.remove('active');
    }
  }
  
  // Add resize event listener
  window.addEventListener('resize', handleResize);
});
</script>
 @yield('content')
<footer class="site-footer">
  <div class="footer-inner">
    <div class="footer-section">
      <h3>CARE Health Portal</h3>
      <p>Your trusted partner for online health services.  
      Find doctors, book appointments, and access reliable medical info.</p>
    </div>
    
    <div class="footer-section">
      <h3>Quick Links</h3>
      <ul>
      <a class="nav-link" href="{{ route('index') }}">Home</a>


        <li><a href="{{ route('doctor') }}">Find Doctors</a></li>
        <li><a href="{{ route('appointments.index') }}">Appointments</a></li>
        <li><a href="{{ route('about') }}">About Us</a></li>
      </ul>
    </div>
    
    <div class="footer-section">
      <h3>Resources</h3>
      <ul>
        <li><a href="{{ route('diseases.index') }}">Diseases & Cures</a></li>
        <li><a href="{{ route('news') }}">Medical News</a></li>
        <li><a href="#">Contact Support</a></li>
      </ul>
    </div>
    
    <div class="footer-section">
      <h3>Follow Us</h3>
      <ul>
        <li><a href="#">Facebook</a></li>
        <li><a href="#">Twitter</a></li>
        <li><a href="#">LinkedIn</a></li>
      </ul>
    </div>
  </div>

  <!-- <div class="footer-bottom">
    &copy; <?php echo date("Y"); ?> CARE Health Portal. All rights reserved.
  </div> -->
</footer>
</body>
</html>