<?php

use :uc:vendor\:uc:package\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix(':lc:package')->middleware(['auth', 'web'])->group(function () {
		Route::get('/', function () {
		
		})->name(':lc:package.home');
		
});