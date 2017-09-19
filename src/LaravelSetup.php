<?php

/**
 * Created by PhpStorm.
 * User: spatel
 * Date: 19/09/17
 * Time: 12:00 PM
 */
 namespace PCB\Laravel;

 use App;

 class LaravelSetup
 {
    public static function setLocale()
    {
        $request = request();

        // get requested language for url
        $requested_lang = (strlen($request->segment(1)) === 2) ? $request->segment(1) : '';
        $requested_country = (strlen($request->segment(2)) === 2) ? $request->segment(2) : '';

        // set the local for application
        // very important to support multi-languages
        App::setLocale($requested_lang ?: config('app.fallback_locale'));

        // set url prefix for routing purpose
        config(['url_prefix' => trim("{$requested_lang}/{$requested_country}", DIRECTORY_SEPARATOR)]);
    }

    public static function setPrefix($prefix=null)
    {
        return trim(config('url_prefix'). ($prefix ? '/' .$prefix : ''), '/');
    }
 }