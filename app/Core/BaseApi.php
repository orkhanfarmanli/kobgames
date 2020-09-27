<?php


namespace App\Core;


abstract class BaseApi
{
    /**
     * Request payload
     */
    public function request()
    {
        $json = file_get_contents('php://input');

        return json_decode($json, true);
    }

    /**
     * Response
     * @param $code
     * @param $message
     */
    public function response($code, $message)
    {
        http_response_code($code);
        echo $message;

        exit();
    }
}