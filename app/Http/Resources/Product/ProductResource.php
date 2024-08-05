<?php

namespace App\Http\Resources\Product;


use App\Http\Resources\Status\StatusResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'nome' => $this->name,
            'sku'  => $this->sku,
            'barCode'   => $this->bar_code,
            'categoria' => new CategoryResource($this->productCategorie),
            'marca'     => new MarkResource($this->mark),
            'fornecedor'=> new SupplierResource($this->supplier),
            'estoque'   => new StockResource($this->stock),
            'valores'   => new PriceResource($this->price),
            'status'    => new StatusResource($this->status),
            'medida'    => new MeasureResource($this->measure)
        ];
    }
}
