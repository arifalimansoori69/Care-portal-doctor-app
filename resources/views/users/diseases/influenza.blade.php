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
    <img src="{{ asset('assets/images/influenza.png') }}" alt="Influenza" class="disease-image">
    <h1>Influenza (Flu)</h1>
    <p>Learn about symptoms, prevention, and treatment of influenza</p>
</div>

<div class="card">
  <h3>Overview</h3>
  <p>Influenza, commonly called the flu, is a contagious respiratory illness caused by influenza viruses. It can cause mild to severe illness, and at times can lead to hospitalization or death.</p>

  <h3>Symptoms</h3>
  <ul>
    <li>Fever, chills, and body aches</li>
    <li>Cough, sore throat, runny or stuffy nose</li>
    <li>Fatigue and headaches</li>
  </ul>

  <h3>Prevention</h3>
  <ul>
    <li>Annual flu vaccination</li>
    <li>Frequent handwashing and respiratory hygiene</li>
    <li>Avoid close contact with sick individuals</li>
  </ul>

  <h3>Treatment</h3>
  <ul>
    <li>Antiviral medications if prescribed early</li>
    <li>Rest, hydration, and over-the-counter symptom relief</li>
  </ul>
</div>
@endsection
