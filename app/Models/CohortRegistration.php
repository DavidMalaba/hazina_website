<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CohortRegistration extends Model
{
    protected $fillable = ['cohort_id', 'name', 'email', 'phone', 'project_description'];

    public function cohort()
    {
        return $this->belongsTo(Cohort::class);
    }
    //
}
