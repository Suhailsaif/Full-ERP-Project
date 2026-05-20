<?php

namespace App\Http\Requests\Project;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    /**
     * Authorize Request
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Validation Rules
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255'
            ],

            'company_id' => [
                'nullable',
                'integer'
            ],

            'client_id' => [
                'nullable',
                'integer'
            ],

            'description' => [
                'nullable',
                'string'
            ],

            'start_date' => [
                'nullable',
                'date'
            ],

            'end_date' => [
                'nullable',
                'date'
            ],

            'budget' => [
                'nullable',
                'numeric'
            ],

            'status' => [
                'nullable',
                'string'
            ],
        ];
    }
}