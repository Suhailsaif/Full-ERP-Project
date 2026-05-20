<?php

namespace App\Http\Resources\Project;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform resource into array
     */
    public function toArray(Request $request): array
    {
        return [

            'id' => $this->id,

            'company_id' => $this->company_id,

            'client_id' => $this->client_id,

            'name' => $this->name,

            'description' => $this->description,

            'status' => $this->status,

            'budget' => $this->budget,

            'start_date' => $this->start_date,

            'end_date' => $this->end_date,

            'created_at' => $this->created_at,

            'updated_at' => $this->updated_at,

        ];
    }
}