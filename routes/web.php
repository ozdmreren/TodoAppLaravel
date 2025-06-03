<?php

use App\Http\Controllers\ToDoController;
use Illuminate\Support\Facades\Route;

Route::get('/',[ToDoController::class,'home']);
Route::post('/add',[ToDoController::class,'store']);
Route::put('/edit',[ToDoController::class,'edit']);
Route::delete('/delete',[ToDoController::class,'delete']);
