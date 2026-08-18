<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'specialization',
        'image',
        'status'
    ];

    public static $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:doctors,email',
        'phone' => 'required|string|max:20',
        'specialization' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'status' => 'required|in:active,inactive'
    ];
}
