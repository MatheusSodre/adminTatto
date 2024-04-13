<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PriceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'preco' => $this->price,
            'preco_ultima_compra' => $this->price_last_buy,
            'custo_ultima_compra' => $this->cost_last_buy,
            'custo_medio' => $this->cost_avg,
            'margem' => $this->margin
        ];
    }
}
