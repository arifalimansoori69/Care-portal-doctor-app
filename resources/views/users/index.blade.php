@extends('users.master')



  <title>home page</title>
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
   <section class="heropage" style="background: url('{{ asset('assets/images/care.png') }}') center/cover no-repeat;">
  <h1 id="type-target" aria-label="We are here for your Care"></h1>
  <h3 class="para" style="opacity: 0; transform: translateY(20px); transition: opacity 0.8s ease-out, transform 0.8s ease-out; transition-delay: 0.5s;">
  Now find trusted and culturally responsive Care, <br>Where You Live.
  <br><br>
  We are on a mission to remove barriers to health and well-being for all those we serve, who we call our Family Members. Search specialists, book appointments online, and access reliable medical information.</h3>
  
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Wait for the typing animation to complete (assuming it takes about 2 seconds)
      setTimeout(function() {
        const para = document.querySelector('.para');
        if (para) {
          para.style.opacity = '1';
          para.style.transform = 'translateY(0)';
        }
      }, 2000);
    });
  </script>
</section>

<!-- Department Section -->
<section class="container" style="padding: 40px 0;">
  <h1 style="text-align:center;color:#034444" >Department</h1>
    <div class="section-header" style="text-align: center; margin-bottom: 40px;">
        <h2 class="section-title">Award Winning Patient Care</h2>
        <p class="section-subtitle" style="max-width: 700px; margin: 0 auto 30px; color: #666; line-height: 1.6;">
            Let's know more about our specialized departments. We provide comprehensive healthcare services with the latest technology and expert care.
        </p>
    </div>

    <div class="row" style="display: flex; flex-wrap: wrap; gap: 30px; justify-content: center;">
        <!-- Department Card 1 -->
        <div class="department-card" style="flex: 1 1 300px; max-width: 350px; background: #fff; border-radius: 10px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.1); transition: transform 0.3s ease, box-shadow 0.3s ease;">
            <div class="card-img" style="height: 200px; overflow: hidden;">
                <img src="{{ asset('assets/images/opththalmology.png') }}" alt="Ophthalmology" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
            <div class="card-content" style="padding: 20px;">
                <h3 style="color: #2c3e50; margin-bottom: 10px;">Ophthalmology</h3>
                <p style="color: #666; margin-bottom: 20px; line-height: 1.6;">
                    Expert eye care services including comprehensive eye exams, cataract surgery, and treatment for various eye conditions.
                </p>
               
            </div>
        </div>

        <!-- Department Card 2 -->
        <div class="department-card" style="flex: 1 1 300px; max-width: 350px; background: #fff; border-radius: 10px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.1); transition: transform 0.3s ease, box-shadow 0.3s ease;">
            <div class="card-img" style="height: 200px; overflow: hidden;">
                <img src="{{ asset('assets/images/cardiology.jpg') }}" alt="Cardiology" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
            <div class="card-content" style="padding: 20px;">
                <h3 style="color: #2c3e50; margin-bottom: 10px;">Cardiology</h3>
                <p style="color: #666; margin-bottom: 20px; line-height: 1.6;">
                    Comprehensive heart care services including diagnostic tests, interventional procedures, and cardiac rehabilitation.
                </p>
               
            </div>
        </div>

        <!-- Department Card 3 -->
        <div class="department-card" style="flex: 1 1 300px; max-width: 350px; background: #fff; border-radius: 10px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.1); transition: transform 0.3s ease, box-shadow 0.3s ease;">
            <div class="card-img" style="height: 200px; overflow: hidden;">
                <img src="{{ asset('assets/images/dentalcare.jpg') }}" alt="Dental Care" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
            <div class="card-content" style="padding: 20px;">
                <h3 style="color: #2c3e50; margin-bottom: 10px;">Dental Care</h3>
                <p style="color: #666; margin-bottom: 20px; line-height: 1.6;">
                    Complete dental services including routine check-ups, cosmetic dentistry, and specialized dental treatments.
                </p>
                
            </div>
        </div>

        <!-- Department Card 4 -->
        <div class="department-card" style="flex: 1 1 300px; max-width: 350px; background: #fff; border-radius: 10px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.1); transition: transform 0.3s ease, box-shadow 0.3s ease;">
            <div class="card-img" style="height: 200px; overflow: hidden;">
                <img src="{{ asset('assets/images/childcare.jpg') }}" alt="Child Care" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
            <div class="card-content" style="padding: 20px;">
                <h3 style="color: #2c3e50; margin-bottom: 10px;">Child Care</h3>
                <p style="color: #666; margin-bottom: 20px; line-height: 1.6;">
                    Specialized pediatric care for infants, children, and adolescents with a focus on preventive healthcare.
                </p>
                
            </div>
        </div>

        <!-- Department Card 5 -->
        <div class="department-card" style="flex: 1 1 300px; max-width: 350px; background: #fff; border-radius: 10px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.1); transition: transform 0.3s ease, box-shadow 0.3s ease;">
            <div class="card-img" style="height: 200px; overflow: hidden;">
                <img src="{{ asset('assets/images/pulmonology.jpg') }}" alt="Pulmonology" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
            <div class="card-content" style="padding: 20px;">
                <h3 style="color: #2c3e50; margin-bottom: 10px;">Pulmonology</h3>
                <p style="color: #666; margin-bottom: 20px; line-height: 1.6;">
                    Expert diagnosis and treatment of respiratory conditions including asthma, COPD, and sleep disorders.
                </p>

            </div>
        </div>

        <!-- Department Card 6 -->
        <div class="department-card" style="flex: 1 1 300px; max-width: 350px; background: #fff; border-radius: 10px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.1); transition: transform 0.3s ease, box-shadow 0.3s ease;">
            <div class="card-img" style="height: 200px; overflow: hidden;">
                <img src="{{ asset('assets/images/gynecology.jpg') }}" alt="Gynecology" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
            <div class="card-content" style="padding: 20px;">
                <h3 style="color: #2c3e50; margin-bottom: 10px;">Gynecology</h3>
                <p style="color: #666; margin-bottom: 20px; line-height: 1.6;">
                    Comprehensive women's health services including annual exams, family planning, and gynecological care.
                </p>

            </div>
        </div>
    </div>
</section>

<!-- Features Grid -->
<section class="container" style="padding: 80px 0; background: linear-gradient(135deg, #f8f9fa 0%,rgb(141, 196, 172) 100%);border-radius:40px">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="section-title" style="color: #034444; font-size: 2.5rem; font-weight: 700; margin-bottom: 15px; position: relative; display: inline-block;">
        Explore Our Platform
        <span style="content: ''; position: absolute; bottom: -10px; left: 50%; transform: translateX(-50%); width: 80px; height: 3px; background: linear-gradient(90deg, #00b4d8, #0077b6); border-radius: 3px;"></span>
      </h2>
      <p class="lead text-muted" style="max-width: 700px; margin: 20px auto 0; font-size: 1.1rem; line-height: 1.6;">
        Discover comprehensive healthcare solutions designed for your well-being and peace of mind.
      </p>
    </div>

    <div class="row g-4" style="justify-content: center;">
      <!-- Service 1 -->
      <div class="col-lg-4 col-md-6">
        <a href="{{ route('services') }}" class="card h-100 border-0 shadow-sm text-decoration-none" style="transition: all 0.4s ease; border-radius: 15px; overflow: hidden; background: white;">
          <div class="card-body p-4 text-center">
            <div class="icon-wrapper mb-4" style="width: 80px; height: 80px; margin: 0 auto; background: rgba(0, 119, 182, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; transition: all 0.3s ease;">
              <i class="fas fa-stethoscope fa-2x" style="color: #0077b6; transition: all 0.3s ease;"></i>
            </div>
            <span class="badge bg-primary bg-opacity-10 text-primary mb-3 px-3 py-2 rounded-pill" style="font-size: 0.8rem; font-weight: 600;">Services</span>
            <h3 class="h4 mb-3" style="color: #2c3e50; font-weight: 600;">Medical Services</h3>
            <p class="text-muted mb-4" style="line-height: 1.6; font-size: 0.95rem;">
              Expert consultations, advanced diagnostics, surgical procedures, and comprehensive healthcare services.
            </p>
            <div class="explore-more" style="color: #00b4d8; font-weight: 500; font-size: 0.9rem; display: inline-flex; align-items: center; gap: 5px;">
              Learn more <i class="fas fa-arrow-right" style="transition: transform 0.3s ease;"></i>
            </div>
          </div>
        </a>
      </div>

      <!-- Service 2 -->
      <div class="col-lg-4 col-md-6">
        <a href="{{ route('diseases.index') }}" class="card h-100 border-0 shadow-sm text-decoration-none" style="transition: all 0.4s ease; border-radius: 15px; overflow: hidden; background: white;">
          <div class="card-body p-4 text-center">
            <div class="icon-wrapper mb-4" style="width: 80px; height: 80px; margin: 0 auto; background: rgba(0, 180, 216, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; transition: all 0.3s ease;">
              <i class="fas fa-book-medical fa-2x" style="color: #00b4d8; transition: all 0.3s ease;"></i>
            </div>
            <span class="badge bg-primary bg-opacity-10 text-primary mb-3 px-3 py-2 rounded-pill" style="font-size: 0.8rem; font-weight: 600;">Library</span>
            <h3 class="h4 mb-3" style="color: #2c3e50; font-weight: 600;">Diseases & Cures</h3>
            <p class="text-muted mb-4" style="line-height: 1.6; font-size: 0.95rem;">
              Comprehensive information on symptoms, prevention strategies, and the latest treatment and options.
            </p>
            <div class="explore-more" style="color: #00b4d8; font-weight: 500; font-size: 0.9rem; display: inline-flex; align-items: center; gap: 5px;">
              Explore library <i class="fas fa-arrow-right" style="transition: transform 0.3s ease;"></i>
            </div>
          </div>
        </a>
      </div>

      <!-- Service 3 -->
      <div class="col-lg-4 col-md-6">
        <a href="{{ route('news') }}" class="card h-100 border-0 shadow-sm text-decoration-none" style="transition: all 0.4s ease; border-radius: 15px; overflow: hidden; background: white;">
          <div class="card-body p-4 text-center">
            <div class="icon-wrapper mb-4" style="width: 80px; height: 80px; margin: 0 auto; background: rgba(72, 202, 228, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; transition: all 0.3s ease;">
              <i class="fas fa-newspaper fa-2x" style="color: #48cae4; transition: all 0.3s ease;"></i>
            </div>
            <span class="badge bg-primary bg-opacity-10 text-primary mb-3 px-3 py-2 rounded-pill" style="font-size: 0.8rem; font-weight: 600;">Updates</span>
            <h3 class="h4 mb-3" style="color: #2c3e50; font-weight: 600;">Medical News</h3>
            <p class="text-muted mb-4" style="line-height: 1.6; font-size: 0.95rem;">
              Stay informed with the latest healthcare news, medical breakthroughs, and research developments.
            </p>
            <div class="explore-more" style="color: #48cae4; font-weight: 500; font-size: 0.9rem; display: inline-flex; align-items: center; gap: 5px;">
              Read news <i class="fas fa-arrow-right" style="transition: transform 0.3s ease;"></i>
            </div>
          </div>
        </a>
      </div>
    </div>
  </div>
  
  <style>
    /* Hover Effects */
    .card {
      transition: all 0.3s ease;
      border: none;
    }
    
    .card:hover {
      transform: translateY(-10px);
      box-shadow: 0 15px 30px rgba(0,0,0,0.1) !important;
    }
    
    .card:hover .icon-wrapper {
      background: #0077b6 !important;
    }
    
    .card:hover .icon-wrapper i {
      color: white !important;
    }
    
    .card:hover .explore-more i {
      transform: translateX(5px);
    }
    
    .card:hover h3 {
      color: #0077b6 !important;
    }
  </style>
  
  <script>
    // Add animation on scroll
    document.addEventListener('DOMContentLoaded', function() {
      const cards = document.querySelectorAll('.card');
      
      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
          }
        });
      }, { threshold: 0.1 });
      
      cards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        card.style.transition = `opacity 0.6s ease ${index * 0.2}s, transform 0.6s ease ${index * 0.2}s`;
        observer.observe(card);
      });
    });
  </script>
</section>

<!-- Stats Section -->
<section class="stats" style="padding:30px 0">
  <div class="stat">
    <div class="stat-number">500+</div>
    <div class="stat-label">Verified Doctors</div>
  </div>
  <div class="stat">
    <div class="stat-number">20+</div>
    <div class="stat-label">Cities Covered</div>
  </div>
  <div class="stat">
    <div class="stat-number">25k+</div>
    <div class="stat-label">Appointments Booked</div>
  </div>
  <div class="stat">
    <div class="stat-number">4.8/5</div>
    <div class="stat-label">Average Rating</div>
  </div>
</section>

<!-- Services Highlight -->
<section class="container" style="padding:40px 0">
  <h2 class="section-title" style="color:#034444;">Top Services</h2>
  <div class="grid">
    <div class="card"><h3>Telemedicine</h3><p class="muted">Video consults and e-prescriptions.</p></div>
    <div class="card"><h3>Diagnostics</h3><p class="muted">Labs and radiology with quick turnarounds.</p></div>
    <div class="card"><h3>Chronic Care</h3><p class="muted">Programs for BP, diabetes, and more.</p></div>
  </div>
</section>

<!-- Testimonials -->
<section class="container" style="padding:40px 0">
  <h2 class="section-title" style="color:#034444;">What Patients Say</h2>
  <div class="grid">
    <div class="card">
      <p>“Booking an appointment took less than 2 minutes and the video consult was seamless.”</p>
      <small class="muted">— Ayesha, Karachi</small>
    </div>
    <div class="card">
      <p>“I quickly found a specialist near me and got lab results directly in the portal.”</p>
      <small class="muted">— Hamza, Lahore</small>
    </div>
    <div class="card">
      <p>“The doctors are verified and the chronic care program really helped my BP.”</p>
      <small class="muted">— Sana, Islamabad</small>
    </div>
  </div>
</section>

<!-- FAQs -->
<section class="container" style="padding:40px 0">
  <h2 class="section-title" style="color:#034444;">FAQs</h2>
  <div class="grid">
    <details class="card"><summary><strong>How do I book an appointment?</strong></summary><p class="muted">Choose a service/doctor, pick a time, and confirm. You’ll receive reminders.</p></details>
    <details class="card"><summary><strong>Do you offer telemedicine?</strong></summary><p class="muted">Yes, video and audio consults are available with e-prescriptions.</p></details>
    <details class="card"><summary><strong>Are doctors verified?</strong></summary><p class="muted">All specialists are vetted for credentials and experience.</p></details>
  </div>
</section>

<!-- CTA -->
<section class="container" style="padding:40px 0">
  <div class="card" style="text-align:center">
    <h2 style="color:#034444;">Ready to start your care journey?</h2>
    <p class="muted">Search specialists, compare availability, and book online in seconds.</p>
    <a class="button" href="{{ route('appointments.index') }}">Book an Appointment</a>
  </div>
</section>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    var el = document.getElementById('type-target');
    if (!el) return;
    var text = el.getAttribute('aria-label') || 'We are here for your Care';
    var speed = 80; // milliseconds per character
    var delay = 2000; // delay before restarting
    
    function type() {
      var i = 0;
      function typeWriter() {
        if (i <= text.length) {
          el.textContent = text.slice(0, i);
          i++;
          setTimeout(typeWriter, speed);
        } else {
          // After typing is complete, wait and then start over
          setTimeout(type, delay);
        }
      }
      // Start typing
      typeWriter();
    }
    
    // Start the typing effect
    type();
  });

  
  
</script>
<script>
document.addEventListener("DOMContentLoaded", () => {
  const cards = document.querySelectorAll(".department-card");

  // Observer to fade in cards
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add("visible");
      }
    });
  }, { threshold: 0.2 });

  cards.forEach(card => observer.observe(card));
});
</script>




@endsection