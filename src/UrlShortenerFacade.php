<?php

namespace Marjose\UrlShortener;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Marjose\UrlShortener\UrlShortener
 */
class UrlShortenerFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'UrlShortener';
    }
}
