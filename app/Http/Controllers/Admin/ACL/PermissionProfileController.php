<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Services\Admin\PermissionService;
use App\Services\Admin\ProfileService;
use Illuminate\Http\Request;

class PermissionProfileController extends Controller
{
    private $permissionService, $profileServise;
    public function __construct(PermissionService $permissionService,ProfileService $profileService)
    {
        $this->permissionService = $permissionService;
        $this->profileServise = $profileService;
    }

    public function permissions($idProfile)
    {
        $profile = $this->profileServise->find($idProfile);
        if (!$profile){
            return redirect()->back();
        }
        $permissions = $profile->permissions()->paginate();
        return view('admin.pages.profiles.permissions.permissions', compact('profile', 'permissions'));
    }

    public function profiles(Request $request,$idPermission)
    {
        if (!$permission = $this->permissionService->getById($idPermission)) {
         return redirect()->back();
        }
        $profiles = $permission->profiles()->paginate();
        return view("admin.pages.permissions.profiles.profiles", compact('profiles','permission'));

    }

    public function permissionsAvailable(Request $request, $idProfile)
    {
        if (!$profile = $this->profileServise->find($idProfile)) {
            return redirect()->back();
        }
        $filters = $request->except('_token');
        $permissions = $profile->pemissionAvailable($request->filter);
        return view('admin.pages.profiles.permissions.available', compact('profile','permissions','filters'));
    }

    public function attachPermissionProfile(Request $request, $idProfile)
    {
        if (!$profile = $this->profileServise->find($idProfile)) {
            return redirect()->back();
        }
        if (!$request->permissions || count($request->permissions)== 0){
            return redirect()->back()->with("info", "Precisa escolher uma permissão");
        }
        $profile->permissions()->attach($request->permissions);

        return redirect()->route('profiles.permissions',$profile->id);
    }

    public function detachPermissionProfile($idProfile, $idPermission)
    {
        $profile = $this->profileServise->getById($idProfile);
        $permission = $this->permissionService->getById($idPermission);
        if (!$profile || !$permission) {
            return redirect()->back();
        }
        $profile->permissions()->detach($permission);

        return redirect()->route('profiles.permissions',$profile->id);
    }
}
