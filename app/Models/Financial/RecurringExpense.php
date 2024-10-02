<?php

namespace App\Models\Financial;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecurringExpense extends Model
{
    use HasFactory;

    protected $fillable = ['transaction_id', 'frequency', 'next_occurrence'];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}
