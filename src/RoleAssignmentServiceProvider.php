<?php

namespace Codeex\RoleAssignment;

use Codeex\RoleAssignment\Models\Resource;
use Codeex\RoleAssignment\Policies\ResourcePolicy;
use Codeex\RoleAssignment\Services\RaService;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class RoleAssignmentServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__."/routes/api.php");

        // Policies
        Gate::policy(Resource::class, ResourcePolicy::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(RaService::class, function ($app) {
            return new RaService();
        });
    }
}
