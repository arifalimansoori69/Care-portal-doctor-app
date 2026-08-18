@extends('users.master')


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>doctor page</title>
  <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<style>
        
         .nav-link {
            color: white !important;
        }
        
        :root {
            --primary-color: #0077b6;
            --secondary-color: #48cae4;
            --accent-color: #00b4d8;
            --dark-text: #2b2d42;
            --light-text: #6c757d;
        }
        
        body {
            background: var(--light-bg);
            color: var(--dark-text);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .hero-section {
            background: url('{{ asset('assets/images/doc.png') }}');
            background-size: cover;
            background-position: center 20%;
            background-repeat: no-repeat;
            min-height: 500px;
            display: flex;
            align-items: center;
            color: white;
            padding: 80px 0 60px;
            margin-bottom: 50px;
            position: relative;
        }
        
        .search-box {
            max-width: 700px;
            margin: 0 auto 40px;
            position: relative;
        }
        
        .search-box input {
            padding: 15px 30px;
            border-radius: 50px;
            border: none;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            width: 100%;
            font-size: 16px;
        }
        
        .search-box i {
            position: absolute;
            right: 20px;
            top: 15px;
            color: var(--light-text);
        }
        
        .filter-section {
            background: white;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 30px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.05);
        }
        
        .filter-title {
            font-weight: 600;
            margin-bottom: 15px;
            color: var(--primary-color);
        }
        
        .filter-option {
            margin-bottom: 15px;
        }
        
        .filter-option label {
            display: block;
            margin-bottom: 8px;
            color: var(--dark-text);
            font-weight: 500;
        }
        
        .filter-option select, 
        .filter-option input {
            width: 100%;
            padding: 8px 15px;
            border: 1px solid #dee2e6;
            border-radius: 8px;
        }
        
        .doctor-section {
            padding: 40px 0;
        }
        
        .section-title {
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 30px;
            position: relative;
            display: inline-block;
        }
        
        .section-title:after {
            content: '';
            position: absolute;
            width: 60px;
            height: 3px;
            background: var(--accent-color);
            bottom: -10px;
            left: 0;
        }
        
        .doctor-card {
            border: none;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
            margin-bottom: 30px;
            background: white;
        }
        
        .doctor-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        }
        
        .doctor-img-container {
            position: relative;
            overflow: hidden;
        }
        
        .doctor-img {
            width: 100%;
            height: 280px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .doctor-card:hover .doctor-img {
            transform: scale(1.05);
        }
        
        .doctor-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(transparent, rgba(0,0,0,0.7));
            padding: 20px;
            color: white;
        }
        
        .doctor-name {
            font-size: 1.4rem;
            font-weight: 700;
            margin: 0;
            color: white;
        }
        
        .doctor-specialty {
            color: #e9ecef;
            margin-bottom: 5px;
        }
        
        .doctor-rating {
            color: #ffc107;
            margin-bottom: 10px;
        }
        
        .card-body {
            padding: 25px;
        }
        
        .doctor-meta {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
            flex-wrap: wrap;
        }
        
        .meta-item {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            color: var(--light-text);
            font-size: 0.9rem;
        }
        
        .meta-item i {
            margin-right: 8px;
            color: var(--accent-color);
            width: 20px;
            text-align: center;
        }
        
        .doctor-bio {
            color: var(--light-text);
            margin-bottom: 20px;
            line-height: 1.6;
        }
        
        .timing {
            background: #e3f8ff;
            border-radius: 8px;
            padding: 8px 15px;
            display: inline-block;
            margin-top: 5px;
            font-size: 0.85rem;
            color: var(--primary-color);
            font-weight: 500;
            width: 100%;
            text-align: center;
        }
        
        .btn-appoint {
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            color: white;
            border: none;
            border-radius: 50px;
            padding: 10px 20px;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            width: 100%;
            margin-top: 15px;
            box-shadow: 0 4px 15px rgba(0, 119, 182, 0.2);
        }
        
        .btn-appoint:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 119, 182, 0.3);
            background: linear-gradient(135deg, #00629b, #00a6d4);
        }
        
        .availability {
            display: inline-flex;
            align-items: center;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
            margin-bottom: 15px;
        }
        
        .available {
            background: #e6f7ee;
            color: #28a745;
        }
        
        .unavailable {
            background: #fce8e8;
            color: #dc3545;
        }
        
        .dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            display: inline-block;
            margin-right: 5px;
        }
        
        .dot-available {
            background: #28a745;
        }
        
        .dot-unavailable {
            background: #dc3545;
        }
        
        .experience {
            background: #fff3e0;
            color: #e65100;
            padding: 3px 10px;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 600;
            display: inline-block;
            margin-bottom: 10px;
        }
        
        .pagination {
            justify-content: center;
            margin-top: 40px;
        }
        
        .page-link {
            color: var(--primary-color);
            border: 1px solid #dee2e6;
            margin: 0 5px;
            border-radius: 8px !important;
            padding: 8px 15px;
        }
        
        .page-item.active .page-link {
            background: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        @media (max-width: 768px) {
            .doctor-img {
                height: 220px;
            }
            
            .search-box {
                margin-bottom: 20px;
            }
            
            .section-title {
                font-size: 1.5rem;
            }
        }
    </style> 

</head>
<body>
<!-- Additional CSS for Doctors Page -->

@section('content')

<!-- Hero Section with Search -->
<section class="hero-section">
    <div class="container text-center">
        <h1 class="display-4 fw-bold mb-4">Find & Consult with Expert Doctors</h1>
        <p class="lead mb-5">Book appointments with certified healthcare professionals from the comfort of your home</p>
        
       
        
        <div class="d-flex justify-content-center flex-wrap gap-3">
            <a href="#cardiologists" class="btn btn-outline-dark rounded-pill px-4">Cardiologists</a>
            <a href="#dermatologists" class="btn btn-outline-dark rounded-pill px-4">Dermatologists</a>
            <a href="#gynecologists" class="btn btn-outline-dark rounded-pill px-4">Gynecologists</a>
            <a href="#neurologists" class="btn btn-outline-dark rounded-pill px-4">Neurologists</a>
            <a href="#pediatricians" class="btn btn-outline-dark rounded-pill px-4">Pediatricians</a>
        </div>
    </div>
</section>

<div class="container">
    <!-- Filters Section -->
    <div class="row mb-5">
        <div class="col-md-3">
            <div class="filter-section">
                <h5 class="filter-title">Filter Doctors</h5>
                
                <div class="filter-option">
                    <label for="specialty">Specialty</label>
                    <select id="specialty" class="form-select">
                        <option>All Specialties</option>
                        <option>Cardiology</option>
                        <option>Dermatology</option>
                        <option>Gynecology</option>
                        <option>Neurology</option>
                        <option>Pediatrics</option>
                        <option>General Physician</option>
                    </select>
                </div>
                
                <div class="filter-option">
                    <label for="availability">Availability</label>
                    <select id="availability" class="form-select">
                        <option>All Availability</option>
                        <option>Available Today</option>
                        <option>Available This Week</option>
                        <option>Weekends</option>
                    </select>
                </div>
                
                <div class="filter-option">
                    <label for="experience">Experience</label>
                    <select id="experience" class="form-select">
                        <option>Any Experience</option>
                        <option>5+ Years</option>
                        <option>10+ Years</option>
                        <option>15+ Years</option>
                    </select>
                </div>
                
                <div class="filter-option">
                    <label for="rating">Minimum Rating</label>
                    <select id="rating" class="form-select">
                        <option>Any Rating</option>
                        <option>4.0+</option>
                        <option>4.5+</option>
                        <option>5.0</option>
                    </select>
                </div>
            </div>
        </div>
        
        <div class="col-md-9">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="section-title">Our Expert Doctors</h2>
                <div class="sort-by">
                    <select class="form-select" style="width: auto; display: inline-block;">
                        <option>Sort by: Recommended</option>
                        <option>Most Experienced</option>
                        <option>Highest Rated</option>
                        <option>Most Reviewed</option>
                    </select>
                </div>
            </div>
            
            <div id="doctorsContainer" class="row">
                @forelse($doctors as $doctor)
                <div class="col-md-6 col-lg-4 mb-4 doctor-card-item" data-name="{{ strtolower($doctor->name) }}" data-specialty="{{ strtolower($doctor->specialization) }}">
                    <div class="card doctor-card h-100">
                        <div class="doctor-img-container">
                            @if($doctor->image)
                                <img src="{{ asset('uploads/doctors/' . $doctor->image) }}" class="doctor-img" alt="Dr. {{ $doctor->name }}">
                            @else
                                <img src="{{ asset('assets/images/doctor-placeholder.jpg') }}" class="doctor-img" alt="Dr. {{ $doctor->name }}">
                            @endif
                            <div class="doctor-overlay">
                                <h3 class="doctor-name">Dr. {{ $doctor->name }}</h3>
                                <p class="doctor-specialty">{{ $doctor->specialization }}</p>
                                <div class="doctor-rating">
                                    @php
                                        $rating = $doctor->rating ?? 4.5;
                                        $reviews = $doctor->reviews_count ?? 0;
                                    @endphp
                                    <i class="fas fa-star"></i> {{ number_format($rating, 1) }} ({{ $reviews }} {{ Str::plural('review', $reviews) }})
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <span class="experience">{{ $doctor->experience ?? '5' }}+ Years Experience</span>
                            <span class="availability {{ $doctor->status == 'active' ? 'available' : 'not-available' }}">
                                <span class="dot dot-{{ $doctor->status == 'active' ? 'available' : 'not-available' }}"></span> 
                                {{ $doctor->status == 'active' ? 'Available Today' : 'Not Available' }}
                            </span>
                            <p class="doctor-bio mb-2">
                                {{ $doctor->qualification ?? 'MBBS' }}, {{ $doctor->specialization }}
                            </p>
                            @if($doctor->bio)
                                <p class="doctor-bio small text-muted">
                                    {{ Str::limit($doctor->bio, 100, '...') }}
                                </p>
                            @endif
                            
                            <div class="doctor-meta">
                                <span class="meta-item">
                                    <i class="fas fa-phone"></i> {{ $doctor->phone }}
                                </span>
                                <span class="meta-item">
                                    <i class="fas fa-envelope"></i> {{ $doctor->email }}
                                </span>
                                <span class="meta-item">
                                    <i class="fas fa-calendar-check"></i> {{ $doctor->availability ?? 'Mon - Fri' }}
                                </span>
                            </div>
                            
                            <div class="timing">
                                <i class="far fa-clock"></i> {{ $doctor->timing ?? '9:00 AM - 5:00 PM' }}
                            </div>
                            
                            @if($doctor->status == 'active')
                            <a href="{{ route('index') }}" class="btn btn-appoint">
                                <i class="far fa-calendar-check me-2"></i> Book Appointment
                            </a>
                            @else
                            <button class="btn btn-secondary" disabled>
                                <i class="far fa-calendar-times me-2"></i> Not Available
                            </button>
                            @endif
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center py-5">
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i> No doctors found. Please check back later.
                    </div>
                </div>
                @endforelse
                
                <!-- Doctor 2 -->
                <!-- <div class="col-md-6 col-lg-4 mb-4 doctor-card-item" data-name="usman ali" data-specialty="dermatologist" data-department="dermatology">
                    <div class="card doctor-card h-100">
                        <div class="doctor-img-container">
                            <img src="{{ asset('assets/images/usman.jpg') }}" class="doctor-img" alt="Dr. Usman Ali">
                            <div class="doctor-overlay">
                                <h3 class="doctor-name">Dr. Usman Ali</h3>
                                <p class="doctor-specialty">Dermatologist & Cosmetologist</p>
                                <div class="doctor-rating">
                                    <i class="fas fa-star"></i> 4.8 (95 reviews)
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <span class="experience">9+ Years Experience</span>
                            <span class="availability available">
                                <span class="dot dot-available"></span> Available Tomorrow
                            </span>
                            <p class="doctor-bio">MBBS, DDV, Consultant acne and hair fall, and cosmetic dermatology procedures.</p>
                            
                            <div class="doctor-meta">
                                <span class="meta-item">
                                    <i class="fas fa-map-marker-alt"></i> Lahore
                                </span>
                                <span class="meta-item">
                                    <i class="fas fa-money-bill-wave"></i> Rs. 2,500
                                </span>
                                <span class="meta-item">
                                    <i class="fas fa-calendar-check"></i> Tue, Thu, Sat
                                </span>
                            </div>
                            
                            <div class="timing">
                                <i class="far fa-clock"></i> 10:00 AM - 4:00 PM
                            </div>
                            
                            <a href="{{ route('appointments.index') }}" class="btn btn-appoint">
                                <i class="far fa-calendar-check me-2"></i> Book Appointment
                            </a>
                        </div>
                    </div>
                </div> -->
                
                <!-- Doctor 3 -->
                <!-- <div class="col-md-6 col-lg-4 mb-4 doctor-card-item" data-name="ayesha khan" data-specialty="gynecologist" data-department="gynecology">
                    <div class="card doctor-card h-100">
                        <div class="doctor-img-container">
                            <img src="{{ asset('assets/images/ayesha.jpg') }}" class="doctor-img" alt="Dr. Ayesha Khan">
                            <div class="doctor-overlay">
                                <h3 class="doctor-name">Dr. Ayesha Khan</h3>
                                <p class="doctor-specialty">Gynecologist & Obstetrician</p>
                                <div class="doctor-rating">
                                    <i class="fas fa-star"></i> 4.9 (142 reviews)
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <span class="experience">11+ Years Experience</span>
                            <span class="availability available">
                                <span class="dot dot-available"></span> Available Today
                            </span>
                            <p class="doctor-bio">MBBS, FCPS, Specialist in high-risk pregnancies, infertility treatments, and minimally invasive gynecological surgeries.</p>
                            
                            <div class="doctor-meta">
                                <span class="meta-item">
                                    <i class="fas fa-map-marker-alt"></i> Islamabad
                                </span>
                                <span class="meta-item">
                                    <i class="fas fa-money-bill-wave"></i> Rs. 3,500
                                </span>
                                <span class="meta-item">
                                    <i class="fas fa-calendar-check"></i> Mon, Wed, Fri
                                </span>
                            </div>
                            
                            <div class="timing">
                                <i class="far fa-clock"></i> 11:00 AM - 5:00 PM
                            </div>
                            
                            <a href="{{ route('appointments.index') }}" class="btn btn-appoint">
                                <i class="far fa-calendar-check me-2"></i> Book Appointment
                            </a>
                        </div>
                    </div>
                </div> -->
                
                <!-- Doctor 4 -->
                <!-- <div class="col-md-6 col-lg-4 mb-4 doctor-card-item" data-name="shoib atif" data-specialty="neurologist" data-department="neurology">
                    <div class="card doctor-card h-100">
                        <div class="doctor-img-container">
                            <img src="{{ asset('assets/images/shoib.jpg') }}" class="doctor-img" alt="Dr. Shoib Atif">
                            <div class="doctor-overlay">
                                <h3 class="doctor-name">Dr. Shoib Atif</h3>
                                <p class="doctor-specialty">Neurologist</p>
                                <div class="doctor-rating">
                                    <i class="fas fa-star"></i> 4.7 (87 reviews)
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <span class="experience">14+ Years Experience</span>
                            <span class="availability unavailable">
                                <span class="dot dot-unavailable"></span> Available from Monday
                            </span>
                            <p class="doctor-bio">MBBS, FRCP, Specialist in treating migraines, epilepsy, stroke, and other neurological disorders with a patient-centered approach.</p>
                            
                            <div class="doctor-meta">
                                <span class="meta-item">
                                    <i class="fas fa-map-marker-alt"></i> Karachi
                                </span>
                                <span class="meta-item">
                                    <i class="fas fa-money-bill-wave"></i> Rs. 4,000
                                </span>
                                <span class="meta-item">
                                    <i class="fas fa-calendar-check"></i> Mon, Tue, Thu
                                </span>
                            </div>
                            
                            <div class="timing">
                                <i class="far fa-clock"></i> 9:00 AM - 3:00 PM
                            </div>
                            
                            <a href="{{ route('appointments.index') }}" class="btn btn-appoint">
                                <i class="far fa-calendar-check me-2"></i> Book Appointment
                            </a>
                        </div>
                    </div>
                </div> -->
                
                <!-- Doctor 5 -->
                <!-- <div class="col-md-6 col-lg-4 mb-4 doctor-card-item" data-name="ahmed raza" data-specialty="pediatrician" data-department="pediatrics">
                    <div class="card doctor-card h-100">
                        <div class="doctor-img-container">
                            <img src="{{ asset('assets/images/ahmed.jpg') }}" class="doctor-img" alt="Dr. Ahmed Raza">
                            <div class="doctor-overlay">
                                <h3 class="doctor-name">Dr. Ahmed Raza</h3>
                                <p class="doctor-specialty">Pediatrician</p>
                                <div class="doctor-rating">
                                    <i class="fas fa-star"></i> 4.9 (156 reviews)
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <span class="experience">8+ Years Experience</span>
                            <span class="availability available">
                                <span class="dot dot-available"></span> Available Today
                            </span>
                            <p class="doctor-bio">MBBS, DCH, Specialist in child healthcare, vaccinations, growth monitoring, and treatment of childhood illnesses.</p>
                            
                            <div class="doctor-meta">
                                <span class="meta-item">
                                    <i class="fas fa-map-marker-alt"></i> Lahore
                                </span>
                                <span class="meta-item">
                                    <i class="fas fa-money-bill-wave"></i> Rs. 2,000
                                </span>
                                <span class="meta-item">
                                    <i class="fas fa-calendar-check"></i> Mon - Sat
                                </span>
                            </div>
                            
                            <div class="timing">
                                <i class="far fa-clock"></i> 10:00 AM - 6:00 PM
                            </div>
                            
                            <a href="{{ route('appointments.index') }}" class="btn btn-appoint">
                                <i class="far fa-calendar-check me-2"></i> Book Appointment
                            </a>
                        </div>
                    </div>
                </div> -->
                
                <!-- Doctor 6 -->
                <!-- <div class="col-md-6 col-lg-4 mb-4 doctor-card-item" data-name="fatima shah" data-specialty="physician" data-department="general">
                    <div class="card doctor-card h-100">
                        <div class="doctor-img-container">
                            <img src="{{ asset('assets/images/fatima.jpg') }}" class="doctor-img" alt="Dr. Fatima Shah">
                            <div class="doctor-overlay">
                                <h3 class="doctor-name">Dr. Fatima Shah</h3>
                                <p class="doctor-specialty">General Physician</p>
                                <div class="doctor-rating">
                                    <i class="fas fa-star"></i> 4.8 (112 reviews)
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <span class="experience">7+ Years Experience</span>
                            <span class="availability available">
                                <span class="dot dot-available"></span> Available Now
                            </span>
                            <p class="doctor-bio">MBBS, MCPS, Specialist in family medicine, preventive healthcare, and management of chronic diseases like diabetes and hypertension.</p>
                            
                            <div class="doctor-meta">
                                <span class="meta-item">
                                    <i class="fas fa-map-marker-alt"></i> Islamabad
                                </span>
                                <span class="meta-item">
                                    <i class="fas fa-money-bill-wave"></i> Rs. 1,800
                                </span>
                                <span class="meta-item">
                                    <i class="fas fa-calendar-check"></i> Mon - Sat
                                </span>
                            </div>
                            
                            <div class="timing">
                                <i class="far fa-clock"></i> 9:00 AM - 8:00 PM
                            </div>
                            
                            <a href="{{ route('index') }}" class="btn btn-appoint">
                                <i class="far fa-calendar-check me-2"></i> Book Appointment
                            </a>
                        </div>
                    </div>
                </div>
            </div> -->
            
            <!-- Pagination -->
          
        </div>
    </div>
</div>
</div>

<!-- Why Choose Us Section -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-5 section-title">Why Choose Our Doctors?</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="text-center p-4 rounded-3 bg-white h-100">
                    <div class="mb-3" style="font-size: 2.5rem; color: var(--primary-color);">
                        <i class="fas fa-user-md"></i>
                    </div>
                    <h4>Expert Specialists</h4>
                    <p class="text-muted">Our doctors are highly qualified with years of experience in their respective fields.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="text-center p-4 rounded-3 bg-white h-100">
                    <div class="mb-3" style="font-size: 2.5rem; color: var(--primary-color);">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h4>24/7 Availability</h4>
                    <p class="text-muted">Book appointments at your convenience with our easy online scheduling system.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="text-center p-4 rounded-3 bg-white h-100">
                    <div class="mb-3" style="font-size: 2.5rem; color: var(--primary-color);">
                        <i class="fas fa-heart"></i>
                    </div>
                    <h4>Patient-Centered Care</h4>
                    <p class="text-muted">Personalized treatment plans tailored to your specific health needs and goals.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
</body>
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const buttons = document.querySelectorAll('.btn-outline-dark');
    const doctorCards = document.querySelectorAll('.doctor-card-item');

    buttons.forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            
            const target = this.getAttribute('href').replace('#', '');

           
            doctorCards.forEach(card => {
                card.style.display = 'none';
            });

          
            doctorCards.forEach(card => {
                if (card.dataset.specialty === target.slice(0, -1)) {
                    card.style.display = 'block';
                }
            });

            if (target === 'cardiologists') {
                showSpecialty('cardiologist');
            } else if (target === 'dermatologists') {
                showSpecialty('dermatologist');
            } else if (target === 'gynecologists') {
                showSpecialty('gynecologist');
            } else if (target === 'neurologists') {
                showSpecialty('neurologist');
            } else if (target === 'pediatricians') {
                showSpecialty('pediatrician');
            }
        });
    });

    function showSpecialty(specialty) {
        doctorCards.forEach(card => {
            if (card.dataset.specialty === specialty) {
                card.style.display = 'block';
            }
        });
    }
});
</script>

</html>


