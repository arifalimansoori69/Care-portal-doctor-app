@extends('users.master')


<link rel="stylesheet" href="{{ asset('assets/style.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<!-- Custom CSS for this page -->
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
    
.disease-hero {
    text-align: center;
    padding: 60px 20px 40px;
}

.disease-hero img {
    max-width: 300px;
    width: 100%;
    margin-bottom: 20px;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
}

.disease-hero h1 {
    font-size: 2.2rem;
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 10px;
}

.disease-hero p {
    font-size: 1.1rem;
    color: #6c757d;
}

.card {
    max-width: 900px;
    margin: 30px auto;
    padding: 30px;
    background: white;
    border-radius: 15px;
    box-shadow: 0 5px 25px rgba(0,0,0,0.1);
}

.card h3 {
    color: #0077b6;
    margin-top: 20px;
    margin-bottom: 10px;
}

.card ul {
    padding-left: 20px;
}

.card li {
    margin-bottom: 8px;
    line-height: 1.6;
}

/* Responsive */
@media (max-width: 768px) {
    .disease-hero img {
        max-width: 200px;
    }

    .disease-hero h1 {
        font-size: 1.8rem;
    }

    .card {
        padding: 20px;
    }
}
</style>
@section('content')
<div class="disease-hero">
    <img src="{{ asset('assets/images/hypertension.png') }}" alt="Hypertension" class="disease-image">
    <h1>Hypertension (High Blood Pressure)</h1>
    <p>Learn about symptoms, causes, lifestyle changes, medications, and monitoring of hypertension</p>
</div>

<div class="card">
  <h3>Overview</h3>
  <p>Hypertension is persistently elevated blood pressure, often asymptomatic, increasing risk of heart disease, stroke, and kidney problems.</p>

  <h3>Lifestyle</h3>
  <ul>
    <li>DASH diet: lower salt, more fruits/vegetables, lean proteins</li>
    <li>30–45 minutes moderate exercise most days</li>
    <li>Weight management, limit alcohol, stop smoking</li>
  </ul>

  <h3>Medications</h3>
  <ul>
    <li>ACE inhibitors/ARBs, thiazide diuretics, calcium channel blockers, beta blockers (as indicated)</li>
  </ul>

  <h3>Monitoring</h3>
  <ul>
    <li>Home BP monitoring and routine follow-ups</li>
  </ul>
</div>
@endsection
