<?php

namespace App\Services\Admin;

use App\Repositories\Admin\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


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
        $data['cnpj'] = $this->removeMask($data['cnpj']);
        Log::channel('mysql')->info('Usuário Criado',['user_id' => Auth::id(),'user_name' => Auth::user()->name,'destino' => $data['name']]);
        return $this->userRepository->create($data);
    }

    public function all()
    {
        return $this->userRepository->all();
    }

    public function paginate(array $relations = [],array $condition = [], array $columns = ['*'], int $limit = 10)
    {
        return $this->userRepository->paginate($relations , $condition,  $columns ,  $limit);
    }

    public function getById($id)
    {
        return $this->userRepository->findOrFail($id);
    }

    public function update($request,$id):bool|null
    {
        $data = $request->only(['name','email','cnpj']);
        if (isset($request->password)){
            $data['password'] = bcrypt($request->password);
        }
        Log::channel('mysql')->info('Usuário Editado',['user_id' => Auth::id(),'user_name' => Auth::user()->name,'destino' => $data['name']]);
        return $this->userRepository->update($data,$id);
    }

    public function destroy($id):bool|null
    {
        if (!$user = $this->userRepository->find($id)) {
            return redirect()->back();
        }
        Log::channel('mysql')->info('Usuário Deletado',['user_id' => Auth::id(),'user_name' => Auth::user()->name,'destino' => $user->name]);
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
    private function removeMask(string $cnpj): string
    {
        return str_replace(array('.','-','/'), "", $cnpj);
    }
}
