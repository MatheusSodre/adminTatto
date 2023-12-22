<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product\ProductResource;
use App\Services\Product\ProductService;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(private ProductService $productService)
    {
        $this->productService = $productService;
    }
    public function index()
    {
        // $produto =  ProductResource::collection($this->productService->getAll());

        $produtos =  $this->productService->paginate();
        return view("admin.pages.product.index",compact('produtos'));

    }
}
