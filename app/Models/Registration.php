<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $fillable = [
        'registration_date', 
        'registration_number', 
        'medrec_number'
    ];

    protected $casts = [
        'registration_date' => 'date',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'medrec_number', 'medrec_number');
    }
}