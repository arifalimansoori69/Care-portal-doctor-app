<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = \App\Models\Doctor::where('status', 'active')->get();
        return view('users.doctor', compact('doctors'));
    }
}
