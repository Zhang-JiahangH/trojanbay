<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
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

        Gate::before(function($user) {
            if ($user->isAdmin()) {
                return true;
            }
        });

        Gate::define('view-buyer', function(User $user) {
            if($user->isUser()) {
                return true;
            }
            else {
                return false;
            }
        });

        Gate::define('view-seller', function(User $user) {
            if($user->isMerchant()) {
                return true;
            }
            else {
                return false;
            }
        });

        Gate::define('view-permit', function(User $user, $id) {
            if($user->id === $id) {
                return true;
            }
            else {
                return false;
            }
        });
    }
}
