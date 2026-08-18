<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;


/*
|--------------------------------------------------------------------------
| Default Root Route
|--------------------------------------------------------------------------
| Jab koi user '/' pe aaye — agar login hai to role ke hisab se bhej do.
| Agar guest hai to index page dikhao.
*/
Route::get('/', function () {
    if (Auth::check()) {
        $user = Auth::user();

        if ($user->user_role == 1) {
            return redirect()->route('admin.dashboard');
        } elseif ($user->user_role == 2) {
            return redirect()->route('doctor.dashboard');
        } else {
            return redirect()->route('index');
        }
    }

    // Guest (not logged in)
    return redirect()->route('index');
})->name('index');

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/index', function () {
    return view('users.index');
})->name('index');

Route::get('/about', function () {
    return view('users.about');
})->name('about');

Route::get('/services', function () {
    return view('users.services');
})->name('services');

Route::get('/doctor', [\App\Http\Controllers\Frontend\DoctorController::class, 'index'])->name('doctor');

// Contact
Route::get('/contact', [ContactController::class, 'show'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

// News
Route::get('/news', [NewsController::class, 'index'])->name('news');
Route::get('/news/search', [NewsController::class, 'search'])->name('news.search');
Route::get('/article/{id}', [NewsController::class, 'show'])->name('article.show');

// Diseases
Route::prefix('diseases')->name('diseases.')->group(function () {
    Route::get('/', function () {
        return view('users.diseases.index');
    })->name('index');

    Route::get('/diabetes', function () {
        return view('users.diseases.diabetes');
    })->name('diabetes');

    Route::get('/hypertension', function () {
        return view('users.diseases.hypertension');
    })->name('hypertension');

    Route::get('/influenza', function () {
        return view('users.diseases.influenza');
    })->name('influenza');
});

// Appointment
Route::prefix('appointments')->name('appointments.')->group(function () {
    Route::get('/', [AppointmentController::class, 'create'])->name('index');
    Route::post('/', [AppointmentController::class, 'store'])->name('store');
    Route::get('/doctors', [AppointmentController::class, 'getDoctors'])->name('doctors');
    Route::get('/slots', [AppointmentController::class, 'getAvailableSlots'])->name('slots');
   

});


    // Doctor Management
    Route::resource('adddoctor', DoctorController::class);
    
    // // Additional routes for doctors
    // Route::get('/adddoctor', [DoctorController::class, 'index'])->name('adddoctor.index');
    // Route::get('/adddoctor/create', [DoctorController::class, 'create'])->name('adddoctor.create');
    // Route::post('/adddoctor', [DoctorController::class, 'store'])->name('adddoctor.store');
    Route::get('/showdoc', [DoctorController::class, 'showdoc'])->name('showdoc');

    Route::get('/doctor/{id}/edit', [DoctorController::class, 'edit'])->name('doctor.edit');
    Route::put('/doctor/{id}', [DoctorController::class, 'update'])->name('doctor.update');
    Route::delete('/doctor/{id}', [DoctorController::class, 'destroy'])->name('doctor.destroy');
  
    
    
/*
|--------------------------------------------------------------------------
| Authentication Routes (Manual)
|--------------------------------------------------------------------------
*/
// Login Routes
Route::match(['get', 'post'], '/login', [LoginController::class, 'login'])->name('login');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:1'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');
    
    // Add other admin routes here
});

/*
{{ ... }}
| Doctor Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:2'])->prefix('doctor')->group(function () {
    Route::get('/dashboard', function () {
        return view('doctor.dashboard');
    })->name('doctor.dashboard');
    
    // Doctor Appointments
    Route::get('/appointments', [\App\Http\Controllers\Doctor\DoctorController::class, 'showAppointments'])->name('doctor.appointments');

// for profile
    Route::get('/profile', [\App\Http\Controllers\Doctor\DoctorController::class, 'profile'])->name('doctor.profile');
Route::put('/{id}', [DoctorController::class, 'update'])->name('doctor.update');
Route::get('/delete/{id}', [DoctorController::class, 'destroy'])->name('doctor.destroy');

    // Add other doctor routes here
});

/*
|--------------------------------------------------------------------------
| Default Authenticated Dashboard Redirect
*/
// Route::get('/dashboard', function () {
//     $user = Auth::user();
//     if ($user->user_role == 1) {
//         return redirect()->route('admin.dashboard');
//     } elseif ($user->user_role == 2) {
//         return redirect()->route('doctor.dashboard');
//     }
//     return redirect()->route('index');
// })->middleware(['auth'])->name('dashboard');
