<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CohortRegistration extends Model
{
    protected $fillable = [
        'cohort_id',
        'company_id',
        'motivation',
        'problem_solved',
        'solution_description',
        'project_description',
        'target_market',
        'desired_partners',
        'status',
    ];

    public function cohort()
    {
        return $this->belongsTo(Cohort::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
