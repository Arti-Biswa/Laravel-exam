<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', [StudentController::class, 'index'])->name('home');
Route::get('/home/add', [StudentController::class, 'add'])->name('home.add');
Route::post('store', [StudentController::class, 'store'])->name('home.store');
Route::delete('destroy/{id}',[StudentController::class,'destroy'])->name('home.destroy');
Route::get('edit/{id}',[StudentController::class,'edit'])->name('home.edit');
Route::put('edit/{id}',[StudentController::class,'update'])->name('home.update');