<?php

namespace Marjose\UrlShortener\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Marjose\UrlShortener\UrlShortener
 */
class UrlShortener extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'urlshortener';
    }
}
