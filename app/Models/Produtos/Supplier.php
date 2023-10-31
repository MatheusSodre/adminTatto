<?php

namespace App\Models\Produtos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    
    protected $fillable = ['uuid','name','status_id'];

    protected $attributes = [
        'status_id' => 1,
    ];
}
