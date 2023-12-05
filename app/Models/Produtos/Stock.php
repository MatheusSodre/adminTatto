<?php

namespace App\Models\Produtos;

use App\Models\Status\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Stock extends Model
{
    use HasFactory;

protected $fillable = ['uuid','product_id','quantity','quantity_min','quantity_max','status_id'];

    protected $attributes = [
        'status_id' => 1,
    ];

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }
}

