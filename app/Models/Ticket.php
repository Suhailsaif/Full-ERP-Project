<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends BaseTenantModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'company_id',
        'created_by',
        'assigned_to',
        'subject',
        'description',
        'status',
        'priority',
        'category',
        'closed_at',
    ];

    protected $casts = [
        'closed_at' => 'datetime',
    ];

    /* ==============================
     | Relationships
     |==============================*/

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function assignee()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function messages()
    {
        return $this->hasMany(TicketMessage::class);
    }

    /* ==============================
     | Helpers
     |==============================*/

    public function isClosed(): bool
    {
        return !is_null($this->closed_at);
    }
}
