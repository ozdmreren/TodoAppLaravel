<?php

use App\Http\Controllers\ToDoController;
use Illuminate\Support\Facades\Route;

Route::get('/',[ToDoController::class,'home']);
Route::post('/add',[ToDoController::class,'store']);
Route::put('/edit',[ToDoController::class,'edit']);
Route::put("/edit-lined",[ToDoController::class,"taskline"]);
Route::delete('/delete',[ToDoController::class,'delete']);
Route::delete('/delete-all',[ToDoController::class,'deleteAll']);