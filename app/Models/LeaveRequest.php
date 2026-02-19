<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LeaveRequest extends BaseTenantModel
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'user_id',
        'type',          // casual, sick, paid, wfh
        'from_date',
        'to_date',
        'reason',
        'status',        // pending, approved, rejected
        'approved_by',
        'approved_at',
    ];

    protected $casts = [
        'from_date'  => 'date',
        'to_date'    => 'date',
        'approved_at'=> 'datetime',
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

    public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
}
