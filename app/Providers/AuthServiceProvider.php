<?php

namespace App\Providers;

use App\Lists;
use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('view-lists', function($user)
        {
            $role = $user->role();
            return $role == in_array($role,['superadmin','user1','user2']) ?
                 Response::allow(): Response::deny('Anauthorized');
        });

        Gate::define('create-lists', function($user){
            return $user->role() == in_array($user->role,['superadmin','user1','user2']) ?
                 Response::allow() : Response::deny('Anauthorized');
        });

        Gate::define('update-lists', function($user, Lists $list)
        {
            return $user->role() == in_array($user->role,['superadmin','user2']) && $user->id == $list->user_id ? 
                Response::allow() : Response::deny('Anuthorized');
        });
        
        Gate::define('delete-lists',function($user, Lists $list)
        {
            return $user->role() == 'superadmin' && $user->id = $list->user_id ?
                Response::allow() : Response::deny('Anauthorized');
        });
    }
}
