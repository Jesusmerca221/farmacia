<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('auth.login');
});


Route::resource('productos','App\Http\Controllers\ProductoController' );
Route::resource('ventas','App\Http\Controllers\VentaController' );

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('dashboard/productos', function () {
        return view('dashboard/producto');
    })->name('productos');
    Route::get('dashboard/ventas', function () {
        return view('dashboard/venta');
    })->name('ventas');
   
    
});
