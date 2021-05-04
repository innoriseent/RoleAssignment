<?php

namespace Codeex\RoleAssignment;

use Codeex\RoleAssignment\Models\Resource;
use Codeex\RoleAssignment\Policies\ResourcePolicy;
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
    }
}
