<?php

namespace App\Models\Files;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeFiles extends Model
{
    use HasFactory;

    protected $fillable = ['name','description'];
}
