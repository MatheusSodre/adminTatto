<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            // 'id'   => $this->id,
            'nome' => $this->name,
            'sku'  => $this->sku,
            'barCode' => $this->bar_code
        ];
    }
}
