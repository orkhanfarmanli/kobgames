<?php

namespace App\Core;

use Exception;

class App
{
    protected static $registry = [];

    /**
     * Bind class to Application container
     * @param $key
     * @param $value
     */
    public static function bind($key, $value)
    {
        static::$registry[$key] = $value;
    }

    /**
     * Get class from Application container
     * @param $key
     * @return mixed
     * @throws Exception
     */
    public static function get($key)
    {
        if (!array_key_exists($key, static::$registry)) {
            throw new Exception("{$key} is not bound in the container");
        }

        return static::$registry[$key];
    }
}
