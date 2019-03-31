<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Modules\PMS\Entities\Project;
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
            'research' => Research::class
        ]);

        Blade::directive('designation', function ($expression) {
            $haystack = explode(",", $expression);
            $needle = Auth::user()->employee->designation->short_name;
            $result = in_array($needle, $haystack) ? 1 : 0;

            return "<?php if('{$result}') { ?>";
        });

        Blade::directive('enddesignation', function () {
            return "<?php } ?>";
        });
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
