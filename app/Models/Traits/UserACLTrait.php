<?php
namespace App\Models\Traits;

trait UserACLTrait
{
    public function permissions()
    {
        $profiles = $this->profiles()->first();
        $permission = [];
        foreach ($profiles->permissions as $profile) {
            array_push($permission,$profile->name);
        }
        return $permission;
    }

    public function hasPermissions(string $permissionName): bool
    {
        return in_array($permissionName,$this->permissions());
    }

    public function isAdmin(): bool
    {
        return in_array($this->email, config('acl.admins'));
    }
}
