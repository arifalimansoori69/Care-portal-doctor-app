@extends('users.master')



    <title>Appointments</title>
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
   

    .appointmentcontainer {
      max-width: 600px;
      margin: 50px auto;
      background: #2196f3;
      border-radius: 20px;
      padding: 40px 30px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      transition: 0.3s ease-in-out;
    }

    .appointment-container:hover {
      transform: translateY(-3px);
    }

    h1 {
      text-align: center;
      font-weight: 700;
      color: #0d47a1;
      margin-bottom: 25px;
    }

    label {
      font-weight: 600;
      color: #333;
      margin-top: 10px;
    }

    input[type="text"],
    input[type="date"],
    select,
    textarea {
      width: 100%;
      padding: 10px 12px;
      border: 1px solid #ccc;
      border-radius: 10px;
      margin-top: 5px;
      transition: 0.2s;
      background-color: #f8f9fa;
    }

    input:focus,
    select:focus,
    textarea:focus {
      border-color: #0d47a1;
      box-shadow: 0 0 6px rgba(13, 71, 161, 0.3);
      outline: none;
      background-color: #fff;
    }

    /* button {
      width: 100%;
      background: linear-gradient(135deg, #2196f3, #0d47a1);
      border: none;
      padding: 12px;
      color: white;
      font-size: 16px;
      font-weight: 600;
      border-radius: 12px;
      cursor: pointer;
      transition: 0.3s;
      margin-top: 20px;
    } */

    button:hover {
      background: linear-gradient(135deg, #1565c0, #0d47a1);
      transform: translateY(-2px);
    }

    .hint {
      font-size: 13px;
      color: #666;
      margin-top: 4px;
    }

    .preview img {
      margin-top: 10px;
      max-width: 100%;
      border-radius: 10px;
      box-shadow: 0 3px 10px rgba(0, 0, 0, 0.15);
    }

    .success-message {
      text-align: center;
      color: green;
      margin-top: 15px;
      font-weight: 600;
    }
  </style>
  @section('content')
</head>
<body>
    <h1 style="text-align: center;">Book a Doctor Appointment</h1>
    <div class="appoinmentcontainer">
        <form id="simpleForm" method="POST" action="{{ route('appointments.store') }}" enctype="multipart/form-data">
            @csrf

            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Enter name" required>


            <label for="doctor">Select Doctor</label>
        <select id="doctor" name="doctor" class="form-control mb-3" required>
            <option value="">-- Select Doctor --</option>
            <option value="Dr. Sarah Ahmed">Dr. Sarah Ahmed</option>
            <option value="Dr. Usman Ali">Dr. Usman Ali</option>
            <option value="Dr. Ayesha Khan">Dr. Ayesha Khan</option>
            <option value="Dr. shoib atif">Dr. shoib atif</option>
            <option value="Dr. mustufa qureshi">Dr. mustufa qureshi</option>
        </select>

        <label for="date">Appointment Date</label>
        <input type="date" id="date" name="date" required class="form-control mb-3">


            <label for="description">Description</label>
            <textarea id="description" name="description" rows="4" placeholder="Enter a short description" required></textarea>

            <label for="image">Image</label>
            <input type="file" id="image" name="image" accept="image/*">
            <div class="hint">Optional — choose an image. A preview will appear below.</div>

            <div class="preview" id="preview"></div>

            <button type="submit">Submit</button>
        </form>

        @if(session('success'))
            <p style="color: green; text-align:center;">{{ session('success') }}</p>
        @endif
    </div>

@endsection
