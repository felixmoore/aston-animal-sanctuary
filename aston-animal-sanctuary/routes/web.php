<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\RequestController;
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
    return view('new');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/new', function () {
    return view('new');
});


Route::get('/dashboard', function () {
    $animals = DB::table('animals')->get();
  
    return view('dashboard', ['animals' => $animals]);
})->middleware(['auth'])->name('dashboard');


Route::resource('animals', AnimalController::class);
Route::resource('requests', RequestController::class);

Route::get('requests/approve/{id}', 'App\Http\Controllers\RequestController@approve')->name('requests.approve');
Route::get('requests/deny/{id}', 'App\Http\Controllers\RequestController@deny')->name('requests.deny');
Route::get('requests/adopt/{id}', 'App\Http\Controllers\RequestController@adopt')->name('requests.adopt');
require __DIR__.'/auth.php';
