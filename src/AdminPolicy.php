<?php

/**
 * Created by PhpStorm.
 * User: spatel
 * Date: 19/09/17
 * Time: 12:00 PM
 */
 namespace PCB\Laravel;

 use Illuminate\Auth\Access\HandlesAuthorization;

 class AdminPolicy
 {
     use HandlesAuthorization;

     public function allowed($user, $permission=null, $plugin=null)
     {
         // if user has no access to module
         $permission = $permission ?: request()->route()->getName();
         if( $plugin && !config('modules.enabled.' .$plugin) ) {
             return false;
         }

         return $user->isSuperAdmin() ?: $user->checkPermission($permission);
     }
 }
