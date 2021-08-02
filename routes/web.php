<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\MonthlyController;
// use App\Http\Controllers\TableController;
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
    return view('home');
})->name('home');

Route::get('/documentation', function () {
    return view('documentation');
})->name('documentation');

Auth::routes();


Route::get('table\{date}','App\Http\Controllers\TableController@table')->name('table')->middleware('auth');
Route::get('dashboard','App\Http\Controllers\DashboardController@index')->name('dashboard')->middleware('auth');

Route::resource('/employess', EmployeesController::class)->middleware('auth');
Route::resource('/monthly', MonthlyController::class)->middleware('auth');

