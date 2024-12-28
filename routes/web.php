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
Route::get('/profile.index', function () {
    return view('profile.index', ['name' => 'calendario']);
});

Route::get('/calendar.index', function () {
    return view('calendar.index', ['name' => 'calendario']);
});

Route::get('/historialMedico.index', function () {
    return view('historialMedico.index', ['name' => 'Historial Médico']);
});

Route::get('/doctor.index', function () {
    return view('doctor.index', ['name' => 'Doctores']);
});

Route::get('/patient.index', function () {
    return view('patient.index', ['name' => 'Pacientes']);
});

Route::get('/user.index', function () {
    return view('user.index', ['name' => 'Usuarios']);
});

Route::get('/role.index', function () {
    return view('role.index', ['name' => 'Roles']);
});