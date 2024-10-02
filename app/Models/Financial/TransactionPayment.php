<?php

namespace App\Models\Financial;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionPayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id', 'payment_method_id', 'amount', 'payment_date',
        'installment_number', 'status'
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }
}
