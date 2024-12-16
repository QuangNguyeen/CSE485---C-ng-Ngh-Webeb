<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IssuesController;
Route::get('/', [IssuesController::class, 'index'])->name('index');
Route::post('/issues', [IssuesController::class, 'store'])->name('issues.store');
Route::get('/issues/create', [IssuesController::class, 'create'])->name('issues.create');
