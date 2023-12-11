<?php

namespace App\Models\Status;

use App\Models\Price\Price;
use App\Models\Produtos\{Product,Supplier,Mark,Measure,ProductCategorie,Stock};
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Status extends Model
{
    use HasFactory;
    protected $table = "status";
    protected $fillable = ['name'] ;

    public function product(): HasMany
    {
        return $this->hasMany(Product::class);
    }
    public function supplier(): HasMany
    {
        return $this->hasMany(Supplier::class);
    }
    public function mark(): HasMany
    {
        return $this->hasMany(Mark::class);
    }
    public function measure(): HasMany
    {
        return $this->hasMany(Measure::class);
    }
    public function productCategory(): HasMany
    {
        return $this->hasMany(ProductCategorie::class);
    }
    public function stock(): HasMany
    {
        return $this->hasMany(Stock::class);
    }
    public function price(): HasMany
    {
        return $this->hasMany(Price::class);
    }
}
