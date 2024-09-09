<?php
namespace App\Models\Traits;

trait UserACLTrait
{
    private $permissions = null;

    public function permissions()
    {
        if ($this->permissions === null) {
            $profiles = $this->profiles()->with('permissions')->first();
            $this->permissions = $profiles->permissions->pluck('name')->all();
        }

        return $this->permissions;
    }

    public function hasPermissions(string $permissionName): bool
    {
        return in_array($permissionName, $this->permissions());
    }

    public function isAdmin(): bool
    {
        return in_array($this->email, config('acl.admins'));
    }
}
