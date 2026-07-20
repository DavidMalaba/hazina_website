<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyDocument extends Model
{
    protected $fillable = [
        'company_id',
        'type',
        'document_number',
        'file_path',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
