@extends('users.master')
<!-- ✅ Bootstrap CSS -->
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




        
       
       </style>

@section('content')
<section class="contact-section py-5">
  <div class="container">
    <div class="text-center mb-5">
      <h1 class="fw-bold">Get in <span>Touch</span></h1>
      <p class="text-muted">We’d love to hear from you. Fill out the form below or visit us directly at our center.</p>
    </div>

    <div class="row g-4 align-items-stretch">
      <!-- Contact Form -->
      <div class="col-lg-6">
        <div class="contact-form shadow-lg p-4 rounded-4 bg-white h-100">
          @if(session('success'))
            <div class="alert alert-success text-center">
              {{ session('success') }}
            </div>
          @endif

          <form action="{{ route('contact.submit') }}" method="POST">
            @csrf

            <div class="form-group mb-3 position-relative">
              <i class="fas fa-user form-icon"></i>
              <input type="text" name="name" class="form-control form-input" placeholder="Your Name" required>
            </div>

            <div class="form-group mb-3 position-relative">
              <i class="fas fa-envelope form-icon"></i>
              <input type="email" name="email" class="form-control form-input" placeholder="Email Address" required>
            </div>

            <div class="form-group mb-3 position-relative">
              <i class="fas fa-tag form-icon"></i>
              <input type="text" name="subject" class="form-control form-input" placeholder="Subject" required>
            </div>

            <div class="form-group mb-4 position-relative">
              <i class="fas fa-comment-dots form-icon"></i>
              <textarea name="message" rows="4" class="form-control form-input" placeholder="Write your message..." required></textarea>
            </div>

            <button type="submit" class="btn-submit w-100">
              <i class="fas fa-paper-plane me-2"></i> Send Message
            </button>
          </form>
        </div>
      </div>

      <!-- Google Map -->
      <div class="col-lg-6">
        <div class="map-container shadow-lg rounded-4 overflow-hidden h-100">
        <iframe src="https://www.google.com/maps/embed?pb=!1m12!1m8!1m3!1d57908.026975768356!2d67.0301628!3d24.8893952!3m2!1i1024!2i768!4f13.1!2m1!1saptech%20near%20garden%20east%20karachi%20map!5e0!3m2!1sen!2s!4v1760289454091!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

        </div>
      </div>
    </div>
  </div>
</section>
@endsection
