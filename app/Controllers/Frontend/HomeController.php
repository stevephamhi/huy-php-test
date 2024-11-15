<?php

namespace App\Controllers\Frontend;

class HomeController extends BaseController
{
    public function index()
    {
        return $this->view('home.index');
    }
}