<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payroll extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'user_id',
        'month',
        'year',
        'gross_salary',
        'total_deductions',
        'net_salary',
        'status',        // draft, approved, paid
        'generated_at',
    ];

    protected $casts = [
        'generated_at' => 'datetime',
        'gross_salary' => 'decimal:2',
        'total_deductions' => 'decimal:2',
        'net_salary' => 'decimal:2',
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

    public function items()
    {
        return $this->hasMany(PayrollItem::class);
    }
}
