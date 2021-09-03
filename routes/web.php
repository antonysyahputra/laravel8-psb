<?php

use App\Models\Unit;
use App\Models\User;
use App\Models\Category;
use App\Models\Employee;
// use App\Models\Employer;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function() {
    return view('home', [
        "title" => "Home",
        "active" => "home"
    ]);
});

Route::get('/employees', [EmployeesController::class, 'index'])->middleware('auth');
Route::get('/employees/create', [EmployeesController::class, 'create']);

Route::get('/employee/{employee:username}', function(Employee $employee) {
    // dd($employer);
    return view('employee', [
        "title" => "Detail Pegawai",
        "active" => "pegawai",
        "employer" => $employee,
    ]);
});

Route::get('/employees/{unit:slug}', [EmployeesController::class, 'unit']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');

Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

// Route::middleware(['auth', 'second'])->group(function () {
    
// });

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');

Route::post('/register', [RegisterController::class, 'store']);

// export import exel
Route::get('importExportView', [EmployeesController::class, 'importExportView']);
Route::get('export', [EmployeesController::class, 'export'])->name('export');
Route::post('import', [EmployeesController::class, 'import'])->name('import');




