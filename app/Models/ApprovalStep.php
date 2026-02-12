<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ApprovalStep extends Model
{
    use HasFactory;

    protected $fillable = [
        'approval_request_id',
        'approver_id',
        'level',
        'status',
        'remarks',
        'action_at',
    ];

    protected $casts = [
        'action_at' => 'datetime',
    ];

    /* ==============================
     | Relationships
     |==============================*/

    public function approvalRequest()
    {
        return $this->belongsTo(ApprovalRequest::class);
    }

    public function approver()
    {
        return $this->belongsTo(User::class, 'approver_id');
    }
}
