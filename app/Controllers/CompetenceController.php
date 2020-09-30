<?php


namespace App\Controllers;


use App\Core\Controller;

class CompetenceController extends Controller
{
    /**
     * First task
     */
    public function firstTask()
    {
        return $this->view('competence/first-task');
    }
}