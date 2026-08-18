@extends('users.master')



<link rel="stylesheet" href="{{ asset('assets/style.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<!-- Hero Section with Full-width Image -->


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
<section class="disease-hero" style="position: relative; min-height: 60vh; width: 100%; margin: 0; padding: 0; overflow: hidden;">
  <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; overflow: hidden;">
    <img src="{{ asset('assets/images/disease.png') }}" alt="Diseases & Cures" style="width: 100%; height: 100%; object-fit: cover; object-position: center 30%;">
  </div>
  <div style="position: relative; z-index: 1; min-height: 60vh; display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center; color: white; padding: 2rem;">
    <h1 style="font-size: 3.5em; margin-bottom: 1rem; text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">Diseases & Cures</h1>
    <p style="font-size: 1.4em; max-width: 800px; margin: 0 auto; text-shadow: 1px 1px 3px rgba(0,0,0,0.8);">
      Comprehensive information about common diseases, their symptoms, and treatment options
    </p>
  </div>
</section>

<!-- Main Content -->
<div class="container" style="padding: 3rem 1rem;">
  <h2 class="section-title" style="text-align: center; margin-bottom: 2rem; color: #2c3e50;">Browse Health Topics</h2>
  
  <div class="grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 2rem; margin: 0 auto; max-width: 1200px;">
    <!-- Disease Card 1 -->
    <a href="{{ route('diseases.diabetes') }}" class="disease-card" style="background: white; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1); transition: transform 0.3s ease; text-decoration: none; color: inherit;">
      <div style="height: 200px; overflow: hidden;">
        <img src="{{ asset('assets/images/dibates.png') }}" alt="Diabetes" style="width: 100%; height: 100%; object-fit: cover;">
      </div>
      <div style="padding: 1.5rem;">
        <h3 style="color: #2c3e50; margin-bottom: 0.8rem;">Diabetes</h3>
        <p class="muted" style="color: #7f8c8d; margin-bottom: 1rem;">Learn about types, symptoms, and management of diabetes</p>
      
      </div>
    </a>

    <!-- Disease Card 2 -->
    <a href="{{ route('diseases.hypertension') }}" class="disease-card" style="background: white; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1); transition: transform 0.3s ease; text-decoration: none; color: inherit;">
      <div style="height: 200px; overflow: hidden;">
        <img src="{{ asset('assets/images/hypertension.png') }}" alt="Hypertension" style="width: 100%; height: 100%; object-fit: cover;">
      </div>
      <div style="padding: 1.5rem;">
        <h3 style="color: #2c3e50; margin-bottom: 0.8rem;">Hypertension</h3>
        <p class="muted" style="color: #7f8c8d; margin-bottom: 1rem;">Understanding and managing high blood pressure</p>
      
      </div>
    </a>

    <!-- Disease Card 3 -->
    <a href="{{ route('diseases.influenza') }}" class="disease-card" style="background: white; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1); transition: transform 0.3s ease; text-decoration: none; color: inherit;">
      <div style="height: 200px; overflow: hidden;">
        <img src="{{ asset('assets/images/influenza.png') }}" alt="Influenza" style="width: 100%; height: 100%; object-fit: cover;">
      </div>
      <div style="padding: 1.5rem;">
        <h3 style="color: #2c3e50; margin-bottom: 0.8rem;">Influenza</h3>
        <p class="muted" style="color: #7f8c8d; margin-bottom: 1rem;">Flu symptoms, prevention, and treatment options</p>
     
      </div>
    </a>
  </div>
</div>

<style>
  .disease-card:hover {
    transform: translateY(-5px);
  }
  
  @media (max-width: 768px) {
    .grid {
      grid-template-columns: 1fr;
    }
    
    .disease-hero h1 {
      font-size: 2.5em !important;
    }
    
    .disease-hero p {
      font-size: 1.1em !important;
      padding: 0 1rem;
    }
  }
</style>
@endsection
