<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Admin\Profile;
use App\Services\Admin\PermissionService;
use App\Services\Admin\ProfileService;
use Illuminate\Http\Request;

class PermissionProfileController extends Controller
{
    protected $permissions, $profile;
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

    public function permissionsAvailable(Request $request, $idProfile)
    {
        if (!$profile = $this->profileServise->find($idProfile)) {
            return redirect()->back();
        }
        $permissions = $this->permissionService->all();
        return view('admin.pages.profiles.permissions.available', compact('profile','permissions'));
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
}
