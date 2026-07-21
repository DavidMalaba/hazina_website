<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name',
        'type',
        'partner_category',
        'logo',
        'show_on_website',
        'email',
        'website',
        'description',
        'industry_sector',
        'business_age_range',
        'employee_count',
        'revenue_range',
        'client_count_range',
        'address',
        'province_id',
        'city_id',
    ];

    protected $casts = [
        'show_on_website' => 'boolean',
    ];

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('role_in_company')->withTimestamps();
    }

    public function documents()
    {
        return $this->hasMany(CompanyDocument::class);
    }

    public function cohortRegistrations()
    {
        return $this->hasMany(CohortRegistration::class);
    }
}
