<?php

namespace App\Providers;

use App\Models\ideals;
use App\Models\User;
use App\Policies\IdeaPolicy;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        ideals::class => IdeaPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('admin',function(User $user): bool {
            return (bool) $user->is_admin;
        });

        Gate::define('ideal.delete',function(User $user,ideals $idea ): bool {
            return ((bool) $user->is_admin || $user->id === $idea->user_id);
        });

        Gate::define('ideal.edit',function(User $user,ideals $idea ): bool {
            return ((bool) $user->is_admin || $user->id === $idea->user_id);
        });
    }
}
