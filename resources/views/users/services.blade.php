@extends('users.master')



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Medical Services</title>
  <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <style>
    /* Typing animation */
    @keyframes typing {
      from { width: 0 }
      to { width: 100% }
    }
    
    @keyframes blink-caret {
      from, to { border-color: transparent }
      50% { border-color: #fff; }
    }
    
    .typing-animation {
      overflow: hidden;
      white-space: nowrap;
      margin: 0 auto;
      letter-spacing: 2px;
    }
    
    .cursor, .blinking-cursor {
      display: inline-block;
      width: 3px;
      background-color: #fff;
      margin-left: 2px;
      animation: blink 1s step-end infinite;
    }
    
    @keyframes blink {
      from, to { opacity: 1; }
      50% { opacity: 0; }
    }
    
    /* Scroll animations */
    .fade-in {
      opacity: 0;
      transform: translateY(20px);
      transition: opacity 0.6s ease-out, transform 0.6s ease-out;
    }
    
    .fade-in.visible {
      opacity: 1;
      transform: translateY(0);
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
</head>
<body>

<section class="servicepage" style="position: relative; min-height: 100vh; width: 100%; margin: 0; padding: 0; overflow: hidden;">
  <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
    <img src="{{ asset('assets/images/service.png') }}" alt="Medical Services" style="width: 100%; height: 100%; object-fit: cover;">
  </div>
  <div style="position: relative; z-index: 1; display: flex; align-items: center; justify-content: center; min-height: 100vh; width: 100%;">
  <div style="max-width: 800px; padding: 20px; background-color: rgba(0, 0, 0, 0.7); border-radius: 10px; box-shadow: 0 0 20px rgba(0,0,0,0.1);">
    <h1 id="services-heading" style="font-size: 3em; margin-bottom: 20px; color: #ffffff;" aria-label="Medical Services"></h1>
    <p class="para" style="font-size: 1.3em; line-height: 1.7; color: #ffffff;">
      We provide comprehensive healthcare services including expert medical consultations, advanced diagnostic procedures, 
      specialized surgical interventions, and convenient telemedicine options available across multiple cities. 
      Our network of board-certified physicians and healthcare professionals is committed to delivering personalized, 
      culturally sensitive care tailored to your unique health needs.
    </p>
  </div>
  </div>
</section>
</section>

<script>
  // Typing animation for the heading
  document.addEventListener('DOMContentLoaded', function() {
    const heading = document.getElementById('services-heading');
    if (!heading) return;
    
    const text = heading.getAttribute('aria-label') || 'Medical Services';
    const typingSpeed = 100; // Typing speed in milliseconds
    const pauseDuration = 2000; // Pause at the end in milliseconds
    
    function typeWriter() {
      let i = 0;
      let isDeleting = false;
      
      function type() {
        const currentText = text.substring(0, i);
        heading.innerHTML = currentText + '<span class="cursor">|</span>';
        
        if (!isDeleting && i === text.length) {
          // Pause at the end before deleting
          setTimeout(() => {
            isDeleting = true;
            type();
          }, pauseDuration);
          return;
        }
        
        if (isDeleting && i === 0) {
          // Pause at the beginning before typing again
          isDeleting = false;
          setTimeout(type, 500);
          return;
        }
        
        if (isDeleting) {
          i--;
          setTimeout(type, typingSpeed / 2); // Faster when deleting
        } else {
          i++;
          setTimeout(type, typingSpeed);
        }
      }
      
      type();
    }
    
    // Start the typing effect
    heading.innerHTML = '';
    heading.classList.add('typing-animation');
    typeWriter();
    
    // Scroll animation for elements with fade-in class
    const fadeElements = document.querySelectorAll('.fade-in');
    
    const fadeInOnScroll = function() {
      fadeElements.forEach(element => {
        const elementTop = element.getBoundingClientRect().top;
        const windowHeight = window.innerHeight;
        
        if (elementTop < windowHeight - 50) {
          element.classList.add('visible');
        }
      });
    };
    
    // Check on load
    window.addEventListener('load', fadeInOnScroll);
    
    // Check on scroll
    window.addEventListener('scroll', fadeInOnScroll);
  });
</script>
<div class="servicecard fade-in" style="margin-top:16px;">
  <p class="muted" style="margin-top:10px">Comprehensive, culturally responsive care programs supported by trusted specialists.</p>

  <h2 style="margin-top:18px">Key Service Categories</h2>
  <div class="grid" style="margin-top:12px">
    <div class="card"><h3>Consultations</h3><p class="muted">In-person and telemedicine consults across multiple specialties.</p></div>
    <div class="card"><h3>Diagnostics</h3><p class="muted">Laboratory tests, radiology (X-ray, CT, MRI), and preventive screenings.</p></div>
    <div class="card"><h3>Surgeries</h3><p class="muted">Elective and emergency procedures with pre/post-operative care.</p></div>
    <div class="card"><h3>Telemedicine</h3><p class="muted">Video/audio visits, e-prescriptions, and remote monitoring.</p></div>
    <div class="card"><h3>Emergency Care</h3><p class="muted">24/7 triage guidance and expedited in-person referrals.</p></div>
    <div class="card"><h3>Rehabilitation</h3><p class="muted">Physiotherapy, occupational therapy, and cardiac rehab.</p></div>
  </div>

  <h2 style="margin-top:22px">Detailed Offerings</h2>
  <div class="grid" style="margin-top:12px">
    <div class="card">
      <h3>Primary Care</h3>
      <ul>
        <li>Annual checkups and preventive counseling</li>
        <li>Hypertension and diabetes management</li>
        <li>Vaccination and travel medicine</li>
      </ul>
    </div>
    <div class="card">
      <h3>Women’s Health</h3>
      <ul>
        <li>Gynecology and prenatal care</li>
        <li>Breast and cervical cancer screening</li>
        <li>Menopause counseling</li>
      </ul>
    </div>
    <div class="card">
      <h3>Pediatrics</h3>
      <ul>
        <li>Newborn to adolescent care</li>
        <li>Immunizations and development tracking</li>
        <li>Nutrition and common illness management</li>
      </ul>
    </div>
    <div class="card">
      <h3>Mental Health</h3>
      <ul>
        <li>Counseling and therapy sessions</li>
        <li>Medication management</li>
        <li>Stress and sleep programs</li>
      </ul>
    </div>
  </div>

  <h2 style="margin-top:22px">How It Works</h2>
  <ol>
    <li>Search or browse services and specialists.</li>
    <li>Choose in-person or telemedicine appointment.</li>
    <li>Receive reminders, lab orders, and e-prescriptions.</li>
    <li>Follow care plans with remote monitoring where applicable.</li>
  </ol>

  <div style="margin-top:16px"><a class="button" href="#">Book an Appointment</a></div>
</div>



</body>
</html>
@endsection