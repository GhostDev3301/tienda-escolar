<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PadreDashboardController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\ProductController;


// Página inicial -> si está logueado va al catálogo, si no al login
Route::get('/', function () {
    if (\Illuminate\Support\Facades\Auth::check()) {
        return redirect()->route('home');
    }
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Recuperar contraseña
Route::get('/forgot-password', [PasswordResetController::class, 'showForgot'])->name('password.request');
Route::post('/forgot-password', [PasswordResetController::class, 'sendResetLink'])->name('password.email');

Route::get('/reset-password/{token}', [PasswordResetController::class, 'showReset'])->name('password.reset');
Route::post('/reset-password', [PasswordResetController::class, 'reset'])->name('password.update');
// Home opcional (por si quieres mantenerlo, pero no será la principal)
Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');


Route::get('/padre/dashboard', [HomeController::class, 'dashboardPadre'])
    ->name('dashboard.padre')
    ->middleware('auth');



// Páginas públicas (principal es el catálogo)

Route::get('/catalog', [ProductController::class, 'index'])->name('catalog');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');



Route::get('/menu-semanal', [MenuController::class, 'index'])->name('menu');
Route::get('/nosotros', [HomeController::class, 'about'])->name('about');
Route::get('/contacto', [HomeController::class, 'contact'])->name('contact');

// Carrito
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');

