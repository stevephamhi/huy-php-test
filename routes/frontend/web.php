<?php

use App\Controllers\Frontend\HomeController;
use App\Controllers\Frontend\ProductController;
use Core\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/san-pham/10', [ProductController::class, 'detail']);