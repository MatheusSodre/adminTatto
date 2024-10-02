<?php

namespace App\Models\Financial;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentCondition extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'installments', 'down_payment'];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
