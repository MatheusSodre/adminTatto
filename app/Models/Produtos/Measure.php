<?php

namespace App\Models\Produtos;

use App\Models\Status\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Measure extends Model
{
    use HasFactory;

    protected $fillable = ['name','status_id'];

    protected $attributes = [
        'status_id' => 1,
    ];

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }
    public function product(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
