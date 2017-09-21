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
         if (auth()->user()->can('allowed', $permission, $module))
         {
             return true;
         }

         return false;
     }
 }