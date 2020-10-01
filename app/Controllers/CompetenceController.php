<?php


namespace App\Controllers;


use App\Core\Controller;

class CompetenceController extends Controller
{
    /**
     * First task
     */
    public function firstAndSecondTask()
    {
        return $this->view('competence/first-and-second-task');
    }
}