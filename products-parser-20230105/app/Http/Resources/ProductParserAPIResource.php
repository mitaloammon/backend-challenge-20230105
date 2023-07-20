<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductParserAPIResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'dateImport' => Carbon::create($this->dateImport)->format('Y-m-d'),
            'status' => $this->status,
            'memoryConsumed' => $this->memoryConsumed
        ];
    }
}
