<?php

use Carbon\Carbon;

function is_route($route, $if, $else = false, $query = false, $queryKey = false)
{
    if ($query) return request()->routeIs($route) && request()->query($query) == $queryKey ? $if : ($else ?? '');

    return request()->routeIs($route) ? $if : ($else ?? '');
}

function carbon()
{
    return new Carbon();
}


if (!function_exists('is_admin')) {
    function is_admin()
    {
        return auth()->user()->role == 'ADMIN';
    }
}

if (!function_exists('is_admin_or_author')) {
    function is_admin_or_author()
    {
        return auth()->user()->role == 'ADMIN' || auth()->user()->role == 'AUTHOR';
    }
}


if (!function_exists('is_alumni')) {
    function is_alumni()
    {
        return auth()->user()->role == 'ALUMNI';
    }
}
