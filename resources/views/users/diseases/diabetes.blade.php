@extends('users.master')


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
     
    .page-bg {
        position: relative;
        min-height: 100vh;
        padding: 3rem 0;
        color: #2c3e50;
    }
    .diabetes-hero {
        text-align: center;
        margin-bottom: 3rem;
        color: #2c3e50;
    }
    .diabetes-image {
        width: 500px;
        height: auto;
        margin: 0 auto 2rem;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        color: #2c3e50;
    }
    .content-card {
        background: white;
        border-radius: 10px;
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        color: #2c3e50;
    }
    .section-title {
        color: #2c3e50;
        margin-bottom: 1.5rem;
        padding-bottom: 0.5rem;
        border-bottom: 2px solid #3498db;
        display: inline-block;
        font-size: 1.5rem;
        font-weight: 600;
    }
    .symptom-list {
        list-style-type: none;
        padding-left: 0;
        color: #2c3e50;
    }
    .symptom-list li {
        padding: 0.5rem 0;
        padding-left: 2rem;
        position: relative;
        color: #495057;
        font-size: 1.05rem;
        line-height: 1.6;
    }
    .symptom-list li:before {
        content: "•";
        color: #3498db;
        font-weight: bold;
        position: absolute;
        left: 0;
        font-size: 1.5rem;
        line-height: 1;
    }
</style>
@section('content')
<div class="page-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="diabetes-hero">
                    <img src="{{ asset('assets/images/dibates.png') }}" alt="Diabetes" class="diabetes-image">
                    <h1 class="mb-3" style="color: #2c3e50; font-size: 2.2rem; font-weight: 600;">Understanding Diabetes</h1>
                    <p class="lead" style="color: #6c757d;">Learn about symptoms, types, and management of diabetes</p>
                </div>
                
                <div class="content-card">
                    <div class="row">
                        <div class="col-md-6">
                            <h2 class="section-title">What is Diabetes?</h2>
                            <p>Diabetes is a chronic health condition that affects how your body turns food into energy. There are several types of diabetes, including:</p>
                            <ul class="symptom-list">
                                <li>Type 1 Diabetes</li>
                                <li>Type 2 Diabetes</li>
                                <li>Gestational Diabetes</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h2 class="section-title">Common Symptoms</h2>
                            <ul class="symptom-list">
                                <li>Increased thirst and frequent urination</li>
                                <li>Extreme hunger</li>
                                <li>Unexplained weight loss</li>
                                <li>Fatigue</li>
                                <li>Blurred vision</li>
                                <li>Slow-healing sores</li>
                            </ul>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-12">
                            <h2 class="section-title">Management & Treatment</h2>
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Lifestyle Changes</h4>
                                    <ul class="symptom-list">
                                        <li>Healthy eating habits</li>
                                        <li>Regular physical activity</li>
                                        <li>Weight management</li>
                                        <li>Stress reduction</li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <h4>Medical Management</h4>
                                    <ul class="symptom-list">
                                        <li>Blood sugar monitoring</li>
                                        <li>Medications (if prescribed)</li>
                                        <li>Regular check-ups</li>
                                        <li>Foot and eye care</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="alert alert-info mt-4">
                        <i class="fas fa-info-circle me-2"></i>
                        <strong>Important:</strong> If you're experiencing any of these symptoms, please consult with a healthcare professional for proper diagnosis and treatment.
                    </div>

                    <div class="text-center mt-5">
                        <a href="{{ route('appointments.index') }}" class="btn btn-primary btn-lg px-5">
                            <i class="fas fa-calendar-check me-2"></i>Book an Appointment
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endpush

@endsection
