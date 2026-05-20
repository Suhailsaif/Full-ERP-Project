<?php

namespace App\Http\Requests\Attendance;

use Illuminate\Foundation\Http\FormRequest;

class PunchAttendanceRequest extends FormRequest
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

            'company_id' => [
                'required',
                'integer'
            ],

            'check_in' => [
                'nullable',
                'date'
            ],

            'check_out' => [
                'nullable',
                'date'
            ],

            'latitude' => [
                'nullable',
                'numeric'
            ],

            'longitude' => [
                'nullable',
                'numeric'
            ],

            'location' => [
                'nullable',
                'string'
            ],
        ];
    }
}