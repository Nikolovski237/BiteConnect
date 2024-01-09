<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        // Other policies...
        \App\Models\Menu::class => \App\Policies\MenuPolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();
    }
}
