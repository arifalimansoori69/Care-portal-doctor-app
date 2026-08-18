@extends('users.master')

<link rel="stylesheet" href="{{ asset('assets/style.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<!-- Hero Section -->
<section class="heroabout" style="padding: 80px 0;">
    <div class="container" style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px; align-items: center;">
        <div class="hero-content">
            <h1 style="font-size: 2.5em; margin-bottom: 20px;">About CARE Group</h1>
            <p style=" line-height: 1.8; margin-bottom: 20px;">
                Transforming healthcare through innovation, compassion, and excellence. At CARE Group, we are committed to providing world-class medical services with a personal touch.
            </p>
            <p style=" line-height: 1.8;">
                Our team of dedicated healthcare professionals works tirelessly to ensure every patient receives the highest standard of care in a comfortable and supportive environment.
            </p>
        </div>
        <div class="hero-image" style="border-radius: 12px; overflow: hidden; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);">
            <!-- Replace the src with your actual image path -->
            <img src="{{ asset('assets/images/about_03.jpg') }}" alt="CARE Group Healthcare Services" style="width: 100%; height: auto; display: block; transition: transform 0.3s ease;">
        </div>
    </div>
</section>

<style>
    @media (max-width: 768px) {
        .container {
            grid-template-columns: 1fr !important;
        }
        .hero-content {
            order: 2;
        }
        .hero-image {
            order: 1;
            margin-bottom: 30px;
        }
    }

    
        
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
<!-- Mission & Vision -->
<section class="container" style="padding: 60px 20px;">
    <div class="grid" style="grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; margin-top: 30px;">
        <div class="card" style="background: #f8fafc; border-radius: 12px; padding: 30px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
            <div style="background: #3b82f6; width: 60px; height: 60px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px;">
                <i class="fas fa-bullseye" style="color: white; font-size: 24px;"></i>
            </div>
            <h3 style="color: #1e293b; margin-bottom: 15px; font-size: 1.5em; text-align: center;">Our Mission</h3>
            <p style="color: #475569; line-height: 1.6; text-align: center;">
                To provide accessible, high-quality healthcare services to everyone through innovative digital solutions and compassionate medical professionals.
            </p>
        </div>
        
        <div class="card" style="background: #f8fafc; border-radius: 12px; padding: 30px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
            <div style="background: #10b981; width: 60px; height: 60px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px;">
                <i class="fas fa-eye" style="color: white; font-size: 24px;"></i>
            </div>
            <h3 style="color: #1e293b; margin-bottom: 15px; font-size: 1.5em; text-align: center;">Our Vision</h3>
            <p style="color: #475569; line-height: 1.6; text-align: center;">
                To be the most trusted healthcare platform, breaking down barriers to quality medical care through technology and innovation.
            </p>
        </div>
    </div>
</section>
<!-- Our Story -->
<section style="background: #f8fafc; padding: 80px 0;">
    <div class="container" style="display: grid; grid-template-columns: 1fr 1fr; gap: 50px; align-items: center;">
        <div>
            <h2 style="font-size: 2.5em; color: #1e293b; margin-bottom: 20px; position: relative; padding-bottom: 15px;">
                <span style="position: absolute; bottom: 0; left: 0; width: 80px; height: 4px; background: #3b82f6;"></span>
                Our Story
            </h2>
            <p style="color: #475569; line-height: 1.8; margin-bottom: 20px;">
                Founded in 2020, CARE Group has grown from a single clinic to a leading healthcare provider with multiple facilities across the country. Our journey began with a simple idea: to make quality healthcare accessible to everyone, regardless of their location or background.
            </p>
            <p style="color: #475569; line-height: 1.8; margin-bottom: 25px;">
                Today, we serve thousands of patients annually, offering a wide range of medical services through our network of experienced healthcare professionals and state-of-the-art facilities.
            </p>
            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-top: 30px;">
                <div>
                    <div style="font-size: 2.5em; font-weight: bold; color: #3b82f6; margin-bottom: 5px;">10+</div>
                    <div style="color: #64748b;">Specialties</div>
                </div>
                <div>
                    <div style="font-size: 2.5em; font-weight: bold; color: #3b82f6; margin-bottom: 5px;">50+</div>
                    <div style="color: #64748b;">Expert Doctors</div>
                </div>
                <div>
                    <div style="font-size: 2.5em; font-weight: bold; color: #3b82f6; margin-bottom: 5px;">10K+</div>
                    <div style="color: #64748b;">Patients Served</div>
                </div>
            </div>
        </div>
        <div style="position: relative;">
            <img src="{{ asset('assets/images/team.png') }}" alt="Our Medical Team" style="width: 100%; border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
            <div style="position: absolute; bottom: -30px; right: -30px; background: white; padding: 20px; border-radius: 12px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); width: 200px;">
                <div style="font-size: 2.5em; font-weight: bold; color: #3b82f6; line-height: 1;">98%</div>
                <div style="color: #64748b; margin-top: 5px;">Patient Satisfaction</div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section style=" padding: 80px 20px;color: white; text-align: center;">
    <div class="container">
        <h2 style="font-size: 2.5em; margin-bottom: 20px;">Ready to Experience Better Healthcare?</h2>
        <p style="max-width: 700px; margin: 0 auto 30px; font-size: 1.1em; opacity: 0.9; line-height: 1.6;">
            Join thousands of patients who trust CARE Group for their healthcare needs. Book an appointment today and take the first step towards better health.
        </p>
        <div style="display: flex; gap: 15px; justify-content: center; flex-wrap: wrap;">
            <a href="{{ route('appointments.index') }}" style="display: inline-block; background: white; color: #3b82f6; padding: 12px 30px; border-radius: 50px; text-decoration: none; font-weight: 600; transition: all 0.3s ease;">
                Book Appointment
            </a>
            <a href="{{ route('contact') }}" style="display: inline-block; border: 2px solid white; color: white; padding: 12px 30px; border-radius: 50px; text-decoration: none; font-weight: 500; transition: all 0.3s ease;">
                Contact Us
            </a>
        </div>
    </div>
</section>

<!-- Add Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<style>
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .container {
            grid-template-columns: 1fr;
            text-align: center;
        }
        
        .grid {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection