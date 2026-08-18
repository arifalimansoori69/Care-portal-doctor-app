<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::all();
        return view('admin.adddoctor', compact('doctors'));
    }

    public function create()
    {
        return view('admin.adddoctor');
    }

    public function showdoc()
    {
        $doctors = Doctor::all();
        return view('admin.showdoc', compact('doctors'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:doctors|unique:users,email',
            'phone' => 'required|string|max:20',
            'specialization' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/doctors'), $imageName);
            $validatedData['image'] = $imageName;
        }

        $validatedData['status'] = $request->status ?? 'active';

        // Create the doctor record
        $doctor = Doctor::create($validatedData);

        // Create a corresponding user account
        $user = new \App\Models\User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = bcrypt($validatedData['password']);
        $user->user_role = '2'; // 2 is for doctor role
        $user->save();

        return redirect()->back()->with('success', 'Doctor and user account created successfully!');
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

    // ✅ Edit form show karega
    public function edit($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('admin.editdoctor', compact('doctor'));
    }

    // ✅ Update doctor info
    public function update(Request $request, $id)
    {
        $doctor = Doctor::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'specialization' => 'required|string|max:255',
            'status' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($doctor->image && file_exists(public_path('uploads/doctors/' . $doctor->image))) {
                unlink(public_path('uploads/doctors/' . $doctor->image));
            }
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/doctors'), $imageName);
            $validatedData['image'] = $imageName;
        }

        $doctor->update($validatedData);

        return redirect()->route('showdoc')->with('success', 'Doctor updated successfully!');
    }
}
