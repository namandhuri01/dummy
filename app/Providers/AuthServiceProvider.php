<?php

namespace App\Providers;

use App\Models\User;
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
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::before(
            function ($user, $ability) {
                if ($user->role_id === 1) {
                    return true;
                }
            }
        );

        foreach (self::$permissions as $action => $roles) {
            Gate::define(
                $action,
                function (User $user) use ($roles) {
                    if (in_array($user->role_id, $roles)) {
                        return true;
                    }
                }
            );
        }
    }

    public static $permissions = [
        'index'     => [2,3],
        'show'      => [3],
        'create'    => [2,3],
        'store'     => [2,3],
        'edit'      => [2,3],
        'update'    => [2,3],
        'destroy'   => [1],
    ];
}
