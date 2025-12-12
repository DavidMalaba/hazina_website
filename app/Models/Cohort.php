<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cohort extends Model
{
    protected $fillable = ['name', 'slug', 'description', 'start_date', 'end_date', 'status', 'image'];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function registrations()
    {
        return $this->hasMany(CohortRegistration::class);
    }
}
