<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cohort extends Model
{
    protected $fillable = ['name', 'slug', 'description', 'start_date', 'end_date', 'registration_start_date', 'registration_end_date', 'max_participants', 'sector', 'status', 'image', 'brochure'];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'registration_start_date' => 'date',
        'registration_end_date' => 'date',
    ];

    public function registrations()
    {
        return $this->hasMany(CohortRegistration::class);
    }
}
