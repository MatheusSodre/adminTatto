<?php

namespace App\Services\Admin;

use App\Repositories\Admin\PermissionRepository;


class PermissionService
{
    /**
     * Create a new service instance.
     *
     * @param  permissionRepository $permissionRepository
     * @return void
     */
    public function __construct(private PermissionRepository $permissionRepository)
    {
        //
    }

    public function store(array $data)
    {
        return $this->permissionRepository->create($data);
    }

    public function all()
    {
        return $this->permissionRepository->all();
    }

    public function paginate(array $relations = [],array $condition = [], array $columns = ['*'], int $limit = 10)
    {
        return $this->permissionRepository->paginate($relations , $condition,  $columns ,  $limit );
    }

    public function getById($id)
    {
        return $this->permissionRepository->findOrFail($id);
    }

    public function update($request,$id):bool|null
    {
        return $this->permissionRepository->update($request,$id);
    }

    public function destroy($id):bool|null
    {
        return $this->permissionRepository->delete($id);
    }

    public function search($resquet)
    {
        return $this->permissionRepository->search($resquet);
    }
}
