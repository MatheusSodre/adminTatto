<?php

namespace App\Models\Produtos;

use App\Models\Price\Price;
use App\Models\Status\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['uuid','cod','sku','bar_code','name','product_categorie_id','mark_id','supplier_id','measure_id','status_id','image'];
    protected $attributes = [
        'status_id' => 1,
    ];

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }
    public function productCategorie(): BelongsTo
    {
        return $this->belongsTo(ProductCategorie::class);
    }
    public function stock(): HasOne
    {
        return $this->hasOne(Stock::class);
    }
    public function price(): HasOne
    {
        return $this->hasOne(Price::class);
    }
    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }
    public function mark(): BelongsTo
    {
        return $this->belongsTo(Mark::class);
    }
    public function measure(): BelongsTo
    {
        return $this->belongsTo(Measure::class);
    }
} 
