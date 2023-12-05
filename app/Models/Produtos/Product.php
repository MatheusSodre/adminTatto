<?php

namespace App\Models\Produtos;

use App\Models\Status\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['uuid','cod','sku','bar_code','name','price_id','category_id','mark_id','supplier_id','measure_id','status_id','image'];
    protected $attributes = [
        'status_id' => 1,
    ];

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }
}
