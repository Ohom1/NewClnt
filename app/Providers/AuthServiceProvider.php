<?php

namespace App\Providers;

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
        // Define your model policies here
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // Define gates for admin users
        Gate::define('manage-users', function ($user) {
            return $user->role === 'admin';
        });

        // Define gates for viewing and managing leads
        Gate::define('view-leads', function ($user) {
            return in_array($user->role, ['admin', 'sales', 'support']);
        });

        Gate::define('manage-leads', function ($user) {
            return in_array($user->role, ['admin', 'sales']);
        });
    }
}
