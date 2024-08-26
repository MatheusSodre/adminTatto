<?php

namespace App\Services\Admin;

use App\Repositories\Admin\FilesRepository;
use mysql_xdevapi\Collection;

class FilesService
{
    /**
     * Create a new service instance.
     *
     * @param  FilesRepository $filesRepository
     * @return void
     */
    public function __construct(private FilesRepository $filesRepository)
    {

    }

    public function store(array $data)
    {
        return $this->filesRepository->create($data);
    }

    public function all($relations = [], $columns = ['*'],$limit = 10)
    {
        return $this->filesRepository->all($relations , $columns ,$limit );
    }

    public function paginate()
    {
        return $this->filesRepository->paginate($relations = [], $columns = ['*']);
    }

    public function getById($id)
    {
        return $this->filesRepository->findOrFail($id);
    }

    public function update($request,$id):bool|null
    {
        return $this->filesRepository->update($request,$id);
    }

    public function destroy($id):bool|null
    {
        return $this->filesRepository->delete($id);
    }

    public function search($resquet)
    {
        return $this->filesRepository->search($resquet);
    }

    public function find($id)
    {
        return $this->filesRepository->find($id);
    }
}
