<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserRole extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'user_roles';

    protected $fillable = [
        'company_user_id',
        'role_id',
        'assigned_by',
        'assigned_at',
        'status',
    ];

    protected $casts = [
        'assigned_at' => 'datetime',
        'status'      => 'boolean',
    ];

    /* ==============================
     | Relationships
     |==============================*/

    public function companyUser()
    {
        return $this->belongsTo(CompanyUser::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function assignedBy()
    {
        return $this->belongsTo(User::class, 'assigned_by');
    }

    /* ==============================
     | Helpers
     |==============================*/

    public function isActive(): bool
    {
        return $this->status === true;
    }
}
