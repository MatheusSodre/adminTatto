<?php

namespace App\Models\Produtos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    use HasFactory;
    
    protected $fillable = ['name','status_id'];

    protected $attributes = [
        'status_id' => 1,
    ];
}
