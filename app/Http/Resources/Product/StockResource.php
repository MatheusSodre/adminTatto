<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StockResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'quantidade' => $this->quantity,
            'quantidade_min' => $this->quantity_min,
            'quantidade_max' => $this->quantity_max
        ];
    }
}
