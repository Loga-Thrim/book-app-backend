<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BookController;


Route::get('book', [BookController::class, 'get']);

Route::get('book/{number}', [BookController::class, 'getByPage']);

Route::post('book', [BookController::class, 'create']);

Route::patch('book', [BookController::class, 'update']);

Route::delete('book/{number}', [BookController::class, 'delete']);
