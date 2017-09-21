<?php

/**
 * Created by PhpStorm.
 * User: spatel
 * Date: 19/09/17
 * Time: 12:00 PM
 */

 if (!function_exists('is_module_enabled') )
 {
     function has_module_permission($module, $permission)
     {
         if( $module && !config('modules.enabled.' .$module) ) {
             return false;
         }

         if (auth()->user()->can('allowed', $permission)) {
             return true;
         }

         return false;
     }
 }

 if (!function_exists('has_permission') )
 {
     function has_permission($permission)
     {
         if( !auth()->user()->can('allowed', $permission) )
         {
             abort(403, 'You are not allowed to access this area.');
         }
     }
 }

