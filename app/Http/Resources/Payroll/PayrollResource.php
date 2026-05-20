<?php

namespace App\Http\Resources\Payroll;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PayrollResource extends JsonResource
{
    /**
     * Transform resource into array
     */
    public function toArray(Request $request): array
    {
        return [

            'id' => $this->id,

            'company_id' => $this->company_id,

            'user_id' => $this->user_id,

            'month' => $this->month,

            'year' => $this->year,

            'gross_salary' => $this->gross_salary,

            'deductions' => $this->deductions,

            'bonus' => $this->bonus,

            'net_salary' => $this->net_salary,

            'status' => $this->status,

            'paid_at' => $this->paid_at,

            'created_at' => $this->created_at,

        ];
    }
}