<?php

namespace App\Services\Admin;
use App\Repositories\Admin\ProfileRepository;
use mysql_xdevapi\Collection;

class ProfileService
{
    /**
     * Create a new service instance.
     *
     * @param  ProfileRepository $profileRepository
     * @return void
     */
    public function __construct(private ProfileRepository $profileRepository)
    {
        //
    }

    public function store(array $data)
    {
        return $this->profileRepository->create($data);
    }

    public function all()
    {
        return $this->profileRepository->all();
    }

    public function paginate()
    {
        return $this->profileRepository->paginate($relations = [], $columns = ['*']);
    }

    public function getById($id)
    {
        return $this->profileRepository->findOrFail($id);
    }

    public function update($request,$id):bool|null
    {
        return $this->profileRepository->update($request,$id);
    }

    public function destroy($id):bool|null
    {
        return $this->profileRepository->delete($id);
    }

    public function search($resquet)
    {
        return $this->profileRepository->search($resquet);
    }
}
