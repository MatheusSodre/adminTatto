<?php

namespace App\Models\Admin;

use App\Models\Financial\Transaction;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone'];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}