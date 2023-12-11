<?php

namespace App\Services\Product;

use App\Repositories\Product\ProductRepository;



class ProductService
{
    /**
     * Create a new service instance.
     *
     * @param  ProductRepository  $productRepository
     * @return void
     */
    public function __construct(private ProductRepository $productRepository)
    {
        //
    }

    public function store(array $data)
    {
        return $this->productRepository->create($data);
    }

    public function getAll()
    {
        return $this->productRepository->all($relations = [], $columns = ['*']);
    }

    public function paginate($limit = 10,$relations = [], $columns = ['*'])
    {
        return $this->productRepository->paginate($limit ,$relations , $columns);
    }
    public function getByUUID($fild,$uuid)
    {
        return $this->productRepository->getByUUID($fild,$uuid);
    }
    public function getById($id)
    {
        return $this->productRepository->findOrFail($id);
    }

    public function update($request,$id):bool|null
    {
        return $this->productRepository->update($request,$id);
    }

    public function destroy($id):bool|null
    {
        return $this->productRepository->delete($id);
    }
}
