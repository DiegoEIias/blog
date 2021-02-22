<?php

use Illuminate\Support\Facades\Session;

if (!function_exists('isSuperAdmin')) {
    function isSuperAdmin()
    {
        return Session::get('rank_slug') == 'super-admin';
    }
}
