<?php

namespace App\Core;

abstract class Controller
{
    /**
     * Load view file
     * @param $view
     * @param array $data
     */
    public function view($view, $data = [])
    {
        extract($data);

        require "app/Views/$view.view.php";
    }
}