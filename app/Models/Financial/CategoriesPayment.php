<?php

namespace App\Models\Financial;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriesPayment extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'type'];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
