<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'permissions';

    protected $fillable = [
        'company_id',
        'name',
        'code',
        'module',
        'description',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    /* ==============================
     | Relationships
     |==============================*/

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function roles()
    {
        return $this->belongsToMany(
            Role::class,
            'role_permissions'
        )->withTimestamps();
    }

    /* ==============================
     | Helpers
     |==============================*/

    public function isActive(): bool
    {
        return $this->status === true;
    }
}
