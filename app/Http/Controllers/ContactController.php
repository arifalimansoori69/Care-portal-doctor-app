<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact; // 👈 yeh import line sabse zaroori
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function show()
    {
        return view('users.contact');
    }

    public function submit(Request $request)
    {
        \Log::info('✅ Controller reached:', $request->all());
    
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:2',
        ]);
    
        try {
            // Save directly to database
            $contact = \App\Models\Contact::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'subject' => $validated['subject'],
                'message' => $validated['message'],
            ]);
    
            \Log::info('✅ Contact saved successfully:', ['id' => $contact->id]);
    
            return back()->with('success', 'Message saved successfully!');
        } catch (\Exception $e) {
            // Show full error if saving fails
            dd('❌ Database error:', $e->getMessage());
        }
    }
    
}
