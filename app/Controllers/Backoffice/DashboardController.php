<?php

namespace App\Controllers\Backoffice;

class DashboardController extends BaseController
{
    public function index()
    {
        return $this->view('dashboard.index');
    }
}