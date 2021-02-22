<?php

use App\Http\Controllers\Backend\MenuController;
use App\Http\Controllers\MyAccountController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('my-account', [MyAccountController::class, 'index'])->middleware('auth')->name('my-account');

Route::group(['prefix' => 'backend', 'middleware' => ['auth', 'superadmin']], function() {
    Route::get('menu', [MenuController::class, 'index'])->name('menu');
    Route::get('menu/create', [MenuController::class, 'create'])->name('menu.create');
    Route::get('menu/{id}/edit', [MenuController::class, 'edit'])->name('menu.edit');
    Route::post('menu', [MenuController::class, 'save'])->name('menu.save');
    Route::post('menu/save-order', [MenuController::class, 'saveOrder'])->name('menu.order');
    Route::put('menu/{id}', [MenuController::class, 'refresh'])->name('menu.refresh');
    Route::delete('menu/{id}/delete', [MenuController::class, 'delete'])->name('menu.delete');
});
