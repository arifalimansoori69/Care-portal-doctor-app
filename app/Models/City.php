<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'state', 'country'];

    public function doctors()
    {
        return $this->hasMany(User::class, 'city_id')->where('role', 'doctor');
    }
}
