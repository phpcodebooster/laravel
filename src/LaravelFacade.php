<?php

/**
 * User: spatel
 * Date: 19/09/17
 * Time: 11:59 AM
 */
 namespace PCB\Laravel;

 use Illuminate\Support\Facades\Facade;

 class LaravelFacade extends Facade
 {
     protected static function getFacadeAccessor()
     {
         return 'PCB\Laravel\LaravelSetup';
     }
 }