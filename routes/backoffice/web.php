<?php

use App\Controllers\Backoffice\DashboardController;
use App\Controllers\Backoffice\ProductController;
use App\Controllers\Backoffice\UserController;
use App\Controllers\Backoffice\CategoriesController;
use App\Controllers\Backoffice\CategoriesGroupController;
use App\Controllers\Backoffice\AttributeController;
use App\Controllers\Backoffice\AttributeValuesController;
use App\Controllers\Backoffice\InventoriesController;
use App\Controllers\Backoffice\CollectionController;



use Core\Route;

Route::get('/backoffice', [DashboardController::class, 'index']);
