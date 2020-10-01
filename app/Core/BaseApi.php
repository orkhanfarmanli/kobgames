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
     * @param $data
     */
    public function response($code, $data)
    {
        http_response_code($code);
        echo json_encode($data);

        exit();
    }
}