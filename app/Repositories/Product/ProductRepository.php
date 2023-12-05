<?php

namespace App\Repositories\Product;

use App\Models\Produtos\Product;
use App\Repositories\BaseRepository;

class ProductRepository extends BaseRepository 
{
    public function __construct(Product $product)
    {
        $this->model = $product;
    }
}
?>
