<?php

use App\Http\Controllers\MainController;
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

Route::middleware('auth')->group(function () {

    Route::get('dashboard', [MainController::class, 'dashboard'])->name('dashboard');
    Route::get('company/by/date', [MainController::class, 'companyByDate'])->name('company.by.date');
    Route::get('company/by/status', [MainController::class, 'companyByStatus'])->name('company.by.status');
    Route::get('company/by/cro', [MainController::class, 'companyByCro'])->name('company.by.cro');
});
Route::get('/', function () {
    return view('welcome');
});
Route::get('login', [MainController::class, 'LoginForm'])->name('login');
Route::post('/register', [MainController::class, 'Register'])->name('register');
Route::post('/login', [MainController::class, 'Login'])->name('login');
Route::get('verify/{code}', [MainController::class, 'verify'])->name('verify');
Route::get('signout', [MainController::class, 'signOut'])->name('signout');
