<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'cnpj', 'name', 'url', 'email', 'logo', 'active'
    ];

    public function users()
    {
      return $this->hasMany(User::class);
    }
}
