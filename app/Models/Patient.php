<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes; 

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'medrec_number', 
        'name', 
        'gender', 
        'email', 
        'address', 
        'phone', 
        'photo'
    ];

    public function registrations()
    {
        return $this->hasMany(Registration::class, 'medrec_number', 'medrec_number');
    }

    public function getGenderLabelAttribute()
    {
        return $this->attributes['gender'] === 'M' ? 'Laki-laki' : 'Perempuan';
    }
}