<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Shift extends BaseTenantModel
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'name',
        'start_time',
        'end_time',
        'grace_minutes',
        'is_flexible',
    ];

    protected $casts = [
        'start_time'   => 'datetime:H:i',
        'end_time'     => 'datetime:H:i',
        'is_flexible'  => 'boolean',
    ];

    /* ==============================
     | Relationships
     |==============================*/

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
