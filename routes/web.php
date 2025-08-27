<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;



Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/catalogo', [HomeController::class, 'catalog'])->name('catalog');
Route::get('/menu-semanal', [MenuController::class, 'index'])->name('menu');
Route::get('/nosotros', [HomeController::class, 'about'])->name('about');
Route::get('/contacto', [HomeController::class, 'contact'])->name('contact');
