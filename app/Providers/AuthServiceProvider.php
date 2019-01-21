<?php

namespace App\Providers;

use App\Entities\Role;
use Modules\TMS\Entities\Training;
use Modules\TMS\Entities\Trainee;
use Modules\TMS\Policies\TraineePolicy;
use Modules\TMS\Policies\TrainingPolicy;
use App\Policies\RolePolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
         Role::class => RolePolicy::class,
         Training::class => TrainingPolicy::class,
         Trainee::class => TrainingPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin-access', function ($user) {
            return $user->hasRole('ROLE_DIRECTOR_ADMIN');
        });

        Gate::define('accounts-access', function ($user) {
            return $user->hasRole(['ROLE_DIRECTOR_ADMIN']);
        });

        Gate::define('cafeteria-access', function ($user) {
            return $user->hasRole(['ROLE_DIRECTOR_ADMIN']);
        });

        Gate::define('hm-access', function ($user) {
            return $user->hasAnyRole(['ROLE_DIRECTOR_GENERAL', 'ROLE_DIRECTOR_ADMIN', 'ROLE_HOSTEL_MANAGER', 'ROLE_DIRECTOR_TRAINING']);
        });

        Gate::define('hrm-access', function ($user) {
            return $user->hasAnyRole(['ROLE_DIRECTOR_GENERAL', 'ROLE_DIRECTOR_ADMIN']);
        });

        Gate::define('pms-access', function ($user) {
            return $user->hasRole(['ROLE_DIRECTOR_ADMIN']);
        });

        Gate::define('rms-access', function ($user) {
            return $user->hasRole(['ROLE_DIRECTOR_ADMIN']);
        });

        Gate::define('tms-access', function ($user) {
            return $user->hasAnyRole(['ROLE_DIRECTOR_ADMIN', 'ROLE_DIRECTOR_TRAINING']);
        });
    }
}
