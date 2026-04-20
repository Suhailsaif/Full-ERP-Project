<?php

namespace App\Http\Resources\Project;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,

            'name' => $this->name,

            'budget' => $this->budget,

            'status' => $this->status,

            'start_date' => $this->start_date,

            'end_date' => $this->end_date,

            'created_at' => $this->created_at?->format('Y-m-d H:i:s'),
        ];
    }
}