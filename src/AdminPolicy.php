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

     public function allowed($user, $permission=null)
     {
         $permission = $permission ?: request()->route()->getName();
         return $user->isSuperAdmin() ?: $user->checkPermission($permission);
     }
 }
