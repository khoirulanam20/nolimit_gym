<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\MembershipAdminController;

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

Route::get('/', [BerandaController::class, 'index'])->name('beranda');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/membership', [MembershipController::class, 'index'])->name('membership');

//auth
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register'])->name('register.post');
//auth

// ADMIN routes
Route::group(['middleware' => ['role:admin']], function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::delete('/dashboard/{user}', [DashboardController::class, 'destroy'])->name('dashboard.destroy');
    Route::post('/dashboard/store', [DashboardController::class, 'store'])->name('dashboard.store');
    
    Route::get('/membership_dashboard', [MembershipAdminController::class, 'index'])->name('membership_dashboard');
    Route::post('/membership_dashboard/store', [MembershipAdminController::class, 'store'])->name('membership_dashboard.store');
    Route::get('/membership_dashboard/{membership}/edit', [MembershipAdminController::class, 'edit'])->name('membership_dashboard.edit');
    Route::put('/membership_dashboard/{membership}', [MembershipAdminController::class, 'update'])->name('membership_dashboard.update');
    Route::delete('/membership_dashboard/{membership}', [MembershipAdminController::class, 'destroy'])->name('membership_dashboard.destroy');
    
    Route::get('/kategori', [MembershipAdminController::class, 'kategoriIndex'])->name('kategori.index');
    Route::post('/kategori', [MembershipAdminController::class, 'kategoriStore'])->name('kategori.store');
    Route::delete('/kategori/{kategori}', [MembershipAdminController::class, 'kategoriDestroy'])->name('kategori.destroy');
    
});
 // ADMIN routes  

Route::post('/membership/store', [MembershipController::class, 'store'])->name('membership.store');