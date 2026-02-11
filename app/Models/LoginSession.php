<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LoginSession extends Model
{
    use HasFactory;

    protected $table = 'login_sessions';

    protected $fillable = [
        'user_id',
        'company_id',
        'ip_address',
        'user_agent',
        'device',
        'platform',
        'login_at',
        'logout_at',
        'is_active',
    ];

    protected $casts = [
        'login_at'  => 'datetime',
        'logout_at' => 'datetime',
        'is_active' => 'boolean',
    ];

    /* ==============================
     | Relationships
     |==============================*/

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /* ==============================
     | Helpers
     |==============================*/

    public function isActive(): bool
    {
        return $this->is_active === true;
    }
}
