<?php

namespace App\Models\Price;

use App\Models\Produtos\Product;
use App\Models\Status\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Price extends Model
{
    use HasFactory;
    protected $fillable = ['product_id', 'price_last_buy','cost_last_buy','cost_avg','margin','price','status_id'];

    protected $attributes = [
        'status_id' => 1,
    ];

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

    public function product():BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
