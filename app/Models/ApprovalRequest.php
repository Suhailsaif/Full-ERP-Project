<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ApprovalRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'requested_by',
        'type',
        'reference_id',
        'status',
        'payload',
        'approved_at',
        'rejected_at',
    ];

    protected $casts = [
        'payload'     => 'array',
        'approved_at' => 'datetime',
        'rejected_at' => 'datetime',
    ];

    /* ==============================
     | Relationships
     |==============================*/

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function requester()
    {
        return $this->belongsTo(User::class, 'requested_by');
    }

    public function steps()
    {
        return $this->hasMany(ApprovalStep::class);
    }

    /* ==============================
     | Helpers
     |==============================*/

    public function isPending(): bool
    {
        return $this->status === 'pending';
    }
}
