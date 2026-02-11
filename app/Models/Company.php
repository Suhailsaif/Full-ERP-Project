<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'companies';

    protected $fillable = [
        'name',
        'code',
        'email',
        'phone',
        'status',
        'timezone',
        'currency',
        'locale',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    /* ==============================
     | Relationships
     |==============================*/

    public function users()
    {
        return $this->belongsToMany(User::class, 'company_users')
            ->withPivot(['role', 'status'])
            ->withTimestamps();
    }

    public function companyUsers()
    {
        return $this->hasMany(CompanyUser::class);
    }

    /* ==============================
     | Helpers
     |==============================*/

    public function isActive(): bool
    {
        return $this->status === true;
    }
}
