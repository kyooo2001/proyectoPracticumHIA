<?php
use App\Http\Controllers\SpecialtyController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AsignarController;
use App\Http\Controllers\ConsultorioController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HistorialController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SecretariaController;
use App\Models\Consultorio;
use App\Models\Specialty;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::get('/', function () {
    return view('auth.login');
});
/* Set login view as primary by Felipe 
Route::redirect('/', 'login');*/
Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Routes Specialities//

//Route::get('/especialidades', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/especialidades/create', [App\Http\Controllers\HomeController::class, 'create']);
//Route::get('/especialidades/{specialty/edit}', [App\Http\Controllers\HomeController::class, 'edit']);
//Route::post('/especialidades', [App\Http\Controllers\HomeController::class, 'senData']);
//Routes Users//
//Route::get('/user', [App\Http\Controllers\HomeController::class, 'index'])->name('user.index') ->Middleware('auth');

//*View all method of crud by Felipe*//

/*Route for Panel Principal*/

Route::resource('home',AdminController::class)->names('home');


//Route for Especialidades
Route::resource('specialties',SpecialtyController::class)->names('specialties');

//Route for Users
Route::resource('user',UsuarioController::class)->names('user');
//Route::middleware(['role:Administrator'])->group(function () {
//   Route::resource('user', UsuarioController::class)->names('user');
//});

//Route for Secretarias//
Route::resource('secretarias',SecretariaController::class)->names('secretarias');

//Route for Pacientes//
Route::resource('pacientes',PacienteController::class)->names('pacientes');

//Route for Consultorios//
Route::resource('consultorios',ConsultorioController::class)->names('consultorios');

//Route for Doctores//
Route::resource('doctores',DoctorController::class)->names('doctores');

//Route for Horarios//
Route::resource('horarios',HorarioController::class)->names('horarios');

//Route for Horarios//
Route::resource('roles',RoleController::class)->names('roles');

//Route for Permisos//
Route::resource('permisos',PermisoController::class)->names('permisos');

//Route for Asignar roles//
Route::resource('asignar',AsignarController::class)->names('asignar');

//Route especifica solo for Asignar citas//

Route::post('/home', [EventController::class, 'store'])->name('home.store');
Route::delete('/home/destroy/{id}', [EventController::class, 'destroy'])->name('home.destroy');

//Route especifica solo for lista Reservas//

Route::get('/reservas/listaReserva/{id}', [AdminController::class, 'listaReserva'])->name('listaReserva');

//Route for Historial medico//
Route::resource('historiales',HistorialController::class)->names('historiales');

//Route for print Historial medico//
Route::get('/historiales/reporteh/{id}', [HistorialController::class, 'reporteh'])->name('historiales.reporteh');

//Route::get('/specialties.index', function () {
 //   return view('specialties.index', ['name' => 'Especialidades Médicas']);
//});

/*Set view routes by Felipe*/
Route::get('/profile.index', function () {
    return view('profile.index', ['name' => 'profile']);
});

//Route::get('/calendar.index', function () {
//    return view('calendar.index', ['name' => 'calendario']);
//});

//Route::get('/historialMedico.index', function () {
//    return view('historialMedico.index', ['name' => 'Historial Médico']);
//});

//Route::get('/doctores.index', function () {
//    return view('doctores.index', ['name' => 'Doctores']);
//});

//Route::get('/patient.index', function () {
//    return view('patient.index', ['name' => 'Pacientes']);
//});


//Route::get('/role.index', function () {
//    return view('role.index', ['name' => 'Roles']);
//});