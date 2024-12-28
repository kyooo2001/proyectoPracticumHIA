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

/*Route::get('/', function () {
    return view('welcome');
});*/

/* Set login view as primary by Felipe */
Route::redirect('/', 'login');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*Set view routes by Felipe*/
Route::get('/calendario', function () {
    return view('calendario', ['name' => 'calendario']);
});
Route::get('/historialMedico', function () {
    return view('historialMedico', ['name' => 'Historial Médico']);
});