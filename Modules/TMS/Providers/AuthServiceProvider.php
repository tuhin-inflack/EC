<?php

namespace Modules\TMS\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Modules\TMS\Policies\TrainingPolicy;
use Modules\TMS\Entities\Training;
use App\Entities\User;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    //protected $defer = false;
    protected $policies = [
        Training::class => TrainingPolicy::class,
        ];

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
    /**
     * Get the services provided by the provider.
     *
     * @return array
     */

    public function boot()
    {
        $this->registerPolicies();
    }


    public function provides()
    {
        return [];
    }
}
