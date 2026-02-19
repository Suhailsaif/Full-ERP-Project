<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Holiday extends BaseTenantModel
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'name',
        'date',
        'is_optional',
        'description',
    ];

    protected $casts = [
        'date'        => 'date',
        'is_optional' => 'boolean',
    ];

    /* ==============================
     | Relationships
     |==============================*/

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
