<?php

namespace App\Http\Controllers\Doctor;
use App\Models\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:2');
    }

    /**
     * Show the doctor dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('doctor.index');
    }

    /**
     * Show all appointments for the doctor.
     *
     * @return \Illuminate\View\View
     */
    public function showAppointments()
    {
        // First, get all appointments to debug
        $allAppointments = Appointment::all();
        \Log::info('All Appointments:', $allAppointments->toArray());
        
        $doctorName = Auth::user()->name;
        \Log::info('Current Doctor:', ['name' => $doctorName]);
        
        // Try to find appointments with different name formats
        $appointments = Appointment::where(function($query) use ($doctorName) {
                $query->where('doctor', 'LIKE', '%'.$doctorName.'%')
                      ->orWhere('doctor', 'LIKE', '%Dr. '.$doctorName.'%')
                      ->orWhere('doctor', 'LIKE', $doctorName.'%')
                      ->orWhere('doctor', 'LIKE', '%Dr. '.$doctorName);
            })
            ->orderBy('date', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            
        \Log::info('Filtered Appointments:', $appointments->toArray());
            
        // If still no appointments, get all appointments (for testing)
        if ($appointments->isEmpty()) {
            $appointments = Appointment::orderBy('date', 'desc')
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }
        
        return view('doctor.show-appointment', compact('appointments'));
    }
    public function profile()
{
    $doctors = Doctor::all();
    return view('doctor.profile', compact('doctors'));
}

public function update(Request $request, $id)
{
    $doctor = Doctor::findOrFail($id);
    $doctor->name = $request->name;
    $doctor->specialization = $request->specialization;
    $doctor->qualification = $request->qualification;
    $doctor->experience = $request->experience;
    $doctor->phone = $request->phone;
    $doctor->email = $request->email;
    $doctor->availability = $request->availability;
    $doctor->timing = $request->timing;
    $doctor->status = $request->status;

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/doctors'), $filename);
        $doctor->image = $filename;
    }

    $doctor->save();

    return redirect()->back()->with('success', 'Doctor profile updated successfully!');
}

public function destroy($id)
{
    $doctor = Doctor::findOrFail($id);
    if ($doctor->image && file_exists(public_path('uploads/doctors/' . $doctor->image))) {
        unlink(public_path('uploads/doctors/' . $doctor->image));
    }
    $doctor->delete();

    return redirect()->back()->with('success', 'Doctor deleted successfully!');
}

    
}    