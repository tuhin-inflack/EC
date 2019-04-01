<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap Blade Directive services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('designation', function ($expression) {
            $haystack = explode(",", $expression);
            $needle = Auth::user()->employee->designation->short_name;
            $result = in_array($needle, $haystack) ? 1 : 0;

            return "<?php if('{$result}') { ?>";
        });

        Blade::directive('elseif_designation', function ($expression) {
            $haystack = explode(",", $expression);
            $needle = Auth::user()->employee->designation->short_name;
            $result = in_array($needle, $haystack) ? 1 : 0;

            return "<?php } elseif('{$result}') { ?>";
        });

        Blade::directive('else_designation', function () {
            return "<?php } else { ?>";
        });

        Blade::directive('end_designation', function () {
            return "<?php } ?>";
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }
}
