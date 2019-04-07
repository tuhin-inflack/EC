<?php

use Illuminate\Support\Facades\Auth;

if (! function_exists('in_designation')) {
    /**
     * Check Is Designation Matched
     *
     * @param expecting the short codes of Designation in a comma separated manner
     * @return mixed
     *
     * @uses in_designation('DG', 'DA', 'PD')
     */
    function in_designation()
    {
        $haystack = func_get_args();
        $needle = Auth::user()->employee->designation->short_name;
        $result = in_array($needle, $haystack) ? 1 : 0;

        return $result;
    }
}