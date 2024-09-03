<?php

namespace App\Services\Admin;



use App\Repositories\Admin\UserRepository;



class UserService
{


    /**
     * Create a new service instance.
     *
     * @param  UserRepository  $userRepository
     * @return void
     */
    public function __construct(private UserRepository  $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    public function store(array $data)
    {
        $data['password'] = bcrypt($data['password']);
        return $this->userRepository->create($data);
    }

    public function all($relations = [], $columns = ['*'],$limit = 10)
    {
        return $this->userRepository->all($relations , $columns ,$limit );
    }

    public function paginate()
    {
        return $this->userRepository->paginate($relations = [], $columns = ['*']);
    }

    public function getById($id)
    {
        return $this->userRepository->findOrFail($id);
    }

    public function update($request,$id):bool|null
    {

        $data = $request->only(['name','email','cnpj']);
        if(isset($request->password)){
            $data['password'] = bcrypt($request->password);
        }
        return $this->userRepository->update($data,$id);
    }

    public function destroy($id):bool|null
    {
        return $this->userRepository->delete($id);
    }

    public function search($resquet)
    {
        return $this->userRepository->search($resquet);
    }

    public function find($id)
    {
        return $this->userRepository->find($id);
    }
    public function findOrFail($id)
    {
        return $this->userRepository->findOrFail($id);
    }

}
