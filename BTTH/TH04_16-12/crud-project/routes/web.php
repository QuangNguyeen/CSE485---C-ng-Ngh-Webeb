<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IssuesController;
Route::get('/', [IssuesController::class, 'index'])->name('index');
