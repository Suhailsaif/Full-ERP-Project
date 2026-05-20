<?php

namespace App\Http\Resources\Attendance;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AttendanceResource extends JsonResource
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

            'attendance_date' => $this->attendance_date,

            'check_in' => $this->check_in,

            'check_out' => $this->check_out,

            'status' => $this->status,

            'working_hours' => $this->working_hours,

            'latitude' => $this->latitude,

            'longitude' => $this->longitude,

            'location' => $this->location,

            'created_at' => $this->created_at,

        ];
    }
}