<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform resource into array
     */
    public function toArray(Request $request): array
    {
        return [

            'id' => $this->id,

            'company_id' => $this->company_id,

            'department_id' => $this->department_id,

            'role_id' => $this->role_id,

            'employee_code' => $this->employee_code,

            'first_name' => $this->first_name,

            'last_name' => $this->last_name,

            'full_name' => $this->full_name,

            'email' => $this->email,

            'phone' => $this->phone,

            'designation' => $this->designation,

            'status' => $this->status,

            'created_at' => $this->created_at,

        ];
    }
}