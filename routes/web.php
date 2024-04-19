<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Property\AddLotController;
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
    Route::get('/properties/archive', [PropertyController::class, 'archive'])->name('properties.archive');
    Route::get('/add-property', [PropertyController::class, 'create'])->name('properties.add');
    Route::get('/edit-property', [PropertyController::class, 'update'])->name('properties.edit');
    Route::get('/property/add-lot', [AddLotController::class, 'index'])->name('property.add-lot');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/permissions/{id}', [UserController::class, 'permissions'])->middleware('can:view-users')->name('users.permissions');

    Route::get('/codes', [CodesController::class, 'index'])->name('codes.index');
    Route::get('/codes/archive', [CodesController::class, 'archive'])->name('codes.archive');

    Route::get('/company', [CompanyController::class, 'index'])->name('companies.index');
    Route::get('/company/archive', [CompanyController::class, 'archive'])->name('companies.archive');

    Route::get('/test', [TestController::class, 'index'])->name('users.test');
    

});



require __DIR__ . '/auth.php';
