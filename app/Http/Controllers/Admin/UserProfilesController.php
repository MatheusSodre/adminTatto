<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\ProfileService;
use App\Services\Admin\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
class UserProfilesController extends Controller
{
    private $userService, $profileServise;
    public function __construct(UserService $userService,ProfileService $profileService)
    {
        $this->userService = $userService;
        $this->profileServise = $profileService;
    }

    public function userProfiles($idUser)
    {
        $user = $this->userService->find($idUser);
        $profiles = $this->profileServise->paginate();
        if (!$profiles || !$user){
            return redirect()->back();
        }
        return view('admin.pages.users.profiles.available', compact('profiles','user'));
    }

    public function attachUserProfiles(Request $request, $idUser)
    {
        if (!$user = $this->userService->find($idUser))
        {
            return redirect()->back();
        }
        if (!$request->profiles || count($request->profiles)== 0){
            return redirect()->back()->with("info", "Precisa escolher uma permissão");
        }
        $user->profiles()->attach($request->profiles);
        Log::channel('mysql')->info('Usuario Adicionado ao Perfil',['user_id' => Auth::id(),'user_name' => Auth::user()->name,'destino' => $user->name]);
        return redirect()->route('users.index');
    }
}
