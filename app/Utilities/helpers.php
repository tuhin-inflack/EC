<?php

use Illuminate\Support\Facades\Auth;

if (! function_exists('in_designation')) {
    /**
     * Check Is Designation Matched
     *
     * @param $expression
     * @return mixed
     */
    function in_designation($expression)
    {
        $haystack = explode(",", $expression);
        $needle = Auth::user()->employee->designation->short_name;
        $result = in_array($needle, $haystack) ? 1 : 0;

        return $result;
    }
}