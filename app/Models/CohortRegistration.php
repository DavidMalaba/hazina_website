<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CohortRegistration extends Model
{
    protected $fillable = [
        'user_id',
        'current_step',
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
