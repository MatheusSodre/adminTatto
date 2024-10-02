<?php

namespace App\Models\Financial;

use App\Models\Admin\Client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'type', 'amount', 'description', 'transaction_date', 'due_date',
        'status', 'category_id', 'client_id', 'payment_condition_id'
    ];

    public function category()
    {
        return $this->belongsTo(CategoriesPayment::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function paymentCondition()
    {
        return $this->belongsTo(PaymentCondition::class);
    }

    public function transactionPayments()
    {
        return $this->hasMany(TransactionPayment::class);
    }

    public function recurringTransaction()
    {
        return $this->hasOne(RecurringExpense::class);
    }
}
