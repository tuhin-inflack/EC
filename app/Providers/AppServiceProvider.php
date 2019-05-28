<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;
use Modules\PMS\Entities\Project;
use Modules\PMS\Entities\ProjectDetailProposal;
use Modules\RMS\Entities\Research;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Relation::morphMap([
            'project' => Project::class,
            'project_detail_proposal' => ProjectDetailProposal::class,
            'research' => Research::class
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
