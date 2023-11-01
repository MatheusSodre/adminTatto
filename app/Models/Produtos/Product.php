<?php

namespace App\Models\Produtos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['uuid','cod','sku','bar_code','name','price_id','category_id','mark_id','supplier_id','measure_id','status_id','image'];
    protected $attributes = [
        'status_id' => 1,
    ];
}
