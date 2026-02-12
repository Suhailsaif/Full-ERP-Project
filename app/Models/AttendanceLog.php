<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AttendanceLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'attendance_id',
        'type',          // in, out, break_start, break_end
        'logged_at',
        'latitude',
        'longitude',
        'device',
        'ip_address',
    ];

    protected $casts = [
        'logged_at' => 'datetime',
        'latitude'  => 'decimal:8',
        'longitude' => 'decimal:8',
    ];

    /* ==============================
     | Relationships
     |==============================*/

    public function attendance()
    {
        return $this->belongsTo(Attendance::class);
    }
}
