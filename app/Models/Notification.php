<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notification extends Model
{
    use HasFactory;

    protected $table = 'notifications';

    protected $fillable = [
        'company_id',
        'user_id',
        'channel',
        'title',
        'message',
        'data',
        'sent_at',
        'read_at',
        'status',
    ];

    protected $casts = [
        'data'    => 'array',
        'sent_at'=> 'datetime',
        'read_at'=> 'datetime',
        'status' => 'boolean',
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

    public function isRead(): bool
    {
        return !is_null($this->read_at);
    }
}
