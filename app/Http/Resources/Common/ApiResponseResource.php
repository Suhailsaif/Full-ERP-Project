<?php

namespace App\Http\Resources\Common;

use Illuminate\Http\Resources\Json\JsonResource;

class ApiResponseResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'success' => true,
            'data'    => $this->resource,
        ];
    }
}