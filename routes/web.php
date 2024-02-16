<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Psy\Readline\Userland;

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

// Route::get('/', function () {
//     return view('properties');
// })->middleware(['auth'])->name('properties');

// Route::get('/dashboard', function () {
//     return view('properties');
// })->middleware(['auth'])->name('properties');

Route::group(['middleware' => ['auth']], function () {
    // Route::get('/', function () {
    //     return view('properties.index');
    // })->name('properties.index');
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/properties', [PropertyController::class, 'index'])->name('properties.index');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/permissions/{id}', [UserController::class, 'permissions'])->name('users.permissions');

    Route::get('/test', [TestController::class, 'index'])->name('users.test');
    

});



require __DIR__ . '/auth.php';
