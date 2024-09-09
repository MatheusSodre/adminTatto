<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Admin\Permission;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        /**
         * Validar se usurio  tem as permissoes
         */
        $permissions = Permission::all();
        foreach ($permissions as $permission) {
            Gate::define($permission->name, function (User $user) use ($permission) {
                return $user->hasPermissions($permission->name);
            });
        }
        /**
         * Usar para validar se usuario é dono daquele produto/Item precisa validar para editar excluir etc...
         */
        Gate::define('owner',function(User $user,$object){
            return $user->id === $object->user_id;
        });
        /**
         * Validar se usuario é admin assim tem acesso a todo sistema
         */
        Gate::before(function (User $user) {
            if ($user->isAdmin()) {
                return true;
            }
        });
    }
}
