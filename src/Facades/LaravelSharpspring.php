<?php namespace Innesm4\LaravelSharpspring\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelSharpspring extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-sharpspring';
    }

}
