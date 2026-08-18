<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Show the form for creating a new appointment.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.appointments');
    }

    /**
     * Store a newly created appointment in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->add_data($request);
    }

    /**
     * Handle the appointment form submission.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add_data(Request $request){
        $request->validate([
            'name' => 'required',
            'doctor' => 'required',
            'date' => 'required',
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);
        $imagename = null;
        if($request->hasFile('image')){
 $imagename = time() . '.' . $request->image->extension();
 $request->image->move(public_path('uploads'),$imagename);
        };
        $appointment = new Appointment();
        $appointment->name=$request->name;
        $appointment->doctor = $request->doctor;
         $appointment->date = $request->date;
         $appointment->description=$request->description;
        $appointment->image =$imagename;
        $appointment->save();
     return redirect()->back()->with('success', 'Appointment added successfully!');
    
}
}
