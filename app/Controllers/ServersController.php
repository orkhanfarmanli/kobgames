<?php


namespace App\Controllers;


use App\Core\Controller;

class ServersController extends Controller
{
    /**
     * First task
     */
    public function firstTask()
    {
        return $this->view('servers/first-and-second-task');
    }
}