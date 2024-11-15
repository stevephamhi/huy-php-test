<?php

namespace App\Controllers\Frontend;

class ProductController extends BaseController
{
    public function detail()
    {
        return $this->view('products.detail');
    }
}