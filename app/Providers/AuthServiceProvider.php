<?php

namespace App\Providers;

use App\Models\Employee\Employee;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

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

        Gate::define('can-access-pos', function (User $user = null) {

            $user = auth('employee')->user();

            if (auth('web')->check()) {
                return false;
            }
            if ($user->role_id == Employee::MANAGER) {
                return true;
            }
            if ($user->role_id == Employee::BILLER) {
                return true;
            }
        });

        Gate::define('can-access', function (User $user) {
            return $user->id === auth('web')->user()->id;
        });
    }
}
