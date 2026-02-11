<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyUser extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'company_user';

    protected $fillable = [
        'company_id',
        'user_id',
        'role',
        'status',
        'joined_at',
    ];

    protected $casts = [
        'status'    => 'boolean',
        'joined_at' => 'datetime',
    ];

    /* ==============================
     | Relationships
     |==============================*/

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /* ==============================
     | Helpers
     |==============================*/

    public function isActive(): bool
    {
        return $this->status === true;
    }
}
