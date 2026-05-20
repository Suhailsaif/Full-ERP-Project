<?php

namespace App\Http\Requests\Payroll;

use Illuminate\Foundation\Http\FormRequest;

class GeneratePayrollRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id' => [
                'required',
                'integer'
            ],

            'month' => [
                'required',
                'integer',
                'between:1,12'
            ],

            'year' => [
                'required',
                'integer'
            ],

            'gross_salary' => [
                'required',
                'numeric'
            ],

            'deductions' => [
                'nullable',
                'numeric'
            ],

            'bonus' => [
                'nullable',
                'numeric'
            ],
        ];
    }
}