<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Get total patients (users with role 0)
        $totalPatients = User::where('user_role', 0)->count();
        
        // Get total active doctors
        $totalDoctors = Doctor::where('status', 'active')->count();
        
        // Get total appointments (you may need to adjust this based on your Appointment model)
        $totalAppointments = 0; // Replace with actual logic
        
        // Calculate total revenue (you may need to adjust this based on your payment system)
        $totalRevenue = 0; // Replace with actual logic
        
        // Get recent activities (you may need to create an Activity model)
        $recentActivities = []; // Replace with actual query
        
        return view('admin.dashboard', [
            'totalPatients' => $totalPatients,
            'totalDoctors' => $totalDoctors,
            'totalAppointments' => $totalAppointments,
            'totalRevenue' => $totalRevenue,
            'recentActivities' => $recentActivities
        ]);
    }
}
