<?php

namespace App\Core;

class Request
{
    /**
     * Parse request uri
     */
    public static function uri()
    {
        return trim(strtolower(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)), '/');
    }

    /**
     * Request method
     */
    public static function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}
