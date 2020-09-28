<?php


namespace App\Controllers;


use App\Core\Controller;

class HomeController extends Controller
{
    /**
     * Home page
     */
    public function index()
    {
        return $this->view('index');
    }
}