<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IssuesController;
Route::get('/', [IssuesController::class, 'index'])->name('index');
Route::get('/issues', [IssuesController::class, 'index'])->name('issues.index');
Route::post('/issues', [IssuesController::class, 'store'])->name('issues.store');
Route::get('/issues/create', [IssuesController::class, 'create'])->name('issues.create');
Route::get('/issues/{issue}', [IssuesController::class, 'show'])->name('issues.show');
Route::get('/issues/{issue}/edit', [IssuesController::class, 'edit'])->name('issues.edit');
Route::put('/issues/{id}', [IssuesController::class, 'update'])->name('issues.update');
Route::delete('/issues/{id}', [IssuesController::class, 'destroy'])->name('issues.destroy');
