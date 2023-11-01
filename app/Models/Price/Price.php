<?php

namespace App\Models\Price;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;
    protected $fillable = ['price_last_buy','cost_last_buy','cost_avg','margin','price','status_id'];

    protected $attributes = [
        'status_id' => 1,
    ];
}
