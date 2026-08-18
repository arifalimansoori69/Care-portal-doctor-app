
 <!DOCTYPE html>
 <html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="assets/style.css">
 </head>
 <body>
 <?php include('db.php'); require_once __DIR__.'/includes/header.php'; ?>
 <section class="servicepage">
  <h1>Medical Services</h1>
  <p class="para">Consultations, diagnostics, surgeries, and telemedicine across cities.</p>
</section>
<div class="servicecard" style="margin-top:16px;">
  
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

  <h2 style="margin-top:22px">Insurance & Pricing</h2>
  <p class="muted">We support major insurance providers and offer transparent pricing. For uninsured patients, discounted care bundles are available.</p>

  <div style="margin-top:16px"><a class="button" href="/care_portal/appointments.php">Book an Appointment</a></div>
</div>

<?php require_once __DIR__.'/includes/footer.php'; ?>
 </body>
 </html>
