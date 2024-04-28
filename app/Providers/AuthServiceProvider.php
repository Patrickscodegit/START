<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

// Use statements for policies
use App\Policies\ListingPolicy;
use App\Policies\UserPolicy;
use App\Models\User;
use App\Models\Listing;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        \App\Models\Listing::class => \App\Policies\ListingPolicy::class,
        User::class => UserPolicy::class,
        Listing::class => ListingPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // Optionally define Gates here if specific custom logic is needed
        // Gate::define('edit-settings', function (User $user) {
        //     return $user->isAdmin();
        // });
    }
}
