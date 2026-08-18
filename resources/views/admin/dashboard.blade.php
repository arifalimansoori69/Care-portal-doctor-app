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

<!-- ✅ Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- ✅ Sidebar Dropdown Toggle Script -->
<script>
  $(document).ready(function () {
    $('.menu-toggle').on('click', function (e) {
      e.preventDefault();
      $(this).next('.dropdown-menu').slideToggle(200);
      $(this).parent().toggleClass('active');
    });
  });

  // Dashboard Statistics Chart
  document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('appointmentsChart').getContext('2d');
    const myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [{
          label: 'Appointments',
          data: [12, 19, 3, 5, 2, 3, 15, 8, 10, 7, 9, 12],
          backgroundColor: 'rgba(54, 162, 235, 0.5)',
          borderColor: 'rgba(54, 162, 235, 1)',
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  });
</script>

<style>
  .stat-card {
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 20px;
    color: white;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
  }
  .stat-card:hover {
    transform: translateY(-5px);
  }
  .stat-card i {
    font-size: 2.5rem;
    margin-bottom: 15px;
  }
  .stat-card .count {
    font-size: 2rem;
    font-weight: 600;
    margin: 10px 0;
  }
  .stat-card .title {
    font-size: 0.9rem;
    opacity: 0.9;
  }
  .recent-activity {
    background: white;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }
  .activity-item {
    padding: 10px 0;
    border-bottom: 1px solid #eee;
  }
  .activity-item:last-child {
    border-bottom: none;
  }
</style>


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
        <li><a class="dropdown-item" href="{{ route('adddoctor.create') }}">Add Doctor</a></li>

          <li><a class="dropdown-item" href="{{ url('admin/showdoc') }}">Show All Doctors</a></li>
       
          <!-- <li><a class="nav-link" href="{{ url('/admin/patients') }}">View All Patients</a></li>
          <li><a class="nav-link" href="{{ url('/admin/appointments') }}">Appointments</a></li> -->
        </ul>
      </li>

      <!-- 🩺 Doctors -->
     

      <!-- 👨‍⚕️ Patients -->
     

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

<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Dashboard Overview</h1>
    </div>

    <div class="row">
      <!-- Total Patients -->
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="stat-card" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
          <i data-feather="users"></i>
          <div class="count">{{ $totalPatients ?? 0 }}</div>
          <div class="title">Total Patients</div>
        </div>
      </div>

      <!-- Total Doctors -->
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="stat-card" style="background: linear-gradient(135deg, #f6d365 0%, #fda085 100%);">
          <i data-feather="user-plus"></i>
          <div class="count">{{ $totalDoctors ?? 0 }}</div>
          <div class="title">Active Doctors</div>
        </div>
      </div>

      <!-- Total Appointments -->
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="stat-card" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
          <i data-feather="calendar"></i>
          <div class="count">{{ $totalAppointments ?? 0 }}</div>
          <div class="title">Total Appointments</div>
        </div>
      </div>

      <!-- Revenue -->
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="stat-card" style="background: linear-gradient(135deg, #0cebeb 0%, #20e3b2 50%, #29ffc6 100%);">
          <i data-feather="dollar-sign"></i>
          <div class="count">${{ number_format($totalRevenue ?? 0, 2) }}</div>
          <div class="title">Total Revenue</div>
        </div>
      </div>
    </div>

    <div class="row mt-4">
      <!-- Appointments Chart -->
      <div class="col-lg-8">
        <div class="card">
          <div class="card-header">
            <h4>Appointments Overview</h4>
          </div>
          <div class="card-body">
            <canvas id="appointmentsChart" height="300"></canvas>
          </div>
        </div>
      </div>

      <!-- Recent Activities -->
      <div class="col-lg-4">
        <div class="recent-activity">
          <h4>Recent Activities</h4>
          <div class="mt-3">
            @forelse($recentActivities as $activity)
            <div class="activity-item">
              <div class="d-flex justify-content-between">
                <h6>{{ $activity->title }}</h6>
                <small class="text-muted">{{ $activity->created_at->diffForHumans() }}</small>
              </div>
              <p class="mb-0 text-muted">{{ $activity->description }}</p>
            </div>
            @empty
            <div class="text-center py-4">
              <i data-feather="inbox" class="text-muted" style="width: 48px; height: 48px;"></i>
              <p class="mt-2">No recent activities</p>
            </div>
            @endforelse
          </div>
        </div>
      </div>
    </div>

    <!-- Quick Actions -->
    <div class="row mt-4">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Quick Actions</h4>
          </div>
          <div class="card-body">
            <div class="row text-center">
              <div class="col-md-3 col-6 mb-3">
                <a href="{{ route('adddoctor.create') }}" class="btn btn-primary btn-lg w-100 py-3">
                  <i data-feather="user-plus" class="mb-1"></i>
                  <div>Add Doctor</div>
                </a>
              </div>
              <div class="col-md-3 col-6 mb-3">
                <a href="{{ route('appointments.index') }}" class="btn btn-success btn-lg w-100 py-3">
                  <i data-feather="calendar" class="mb-1"></i>
                  <div>View Appointments</div>
                </a>
              </div>
             
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

@endsection
