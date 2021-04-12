<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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

Route::get('list', 'App\Http\Controllers\UserController@list');
Route::get('show/{id}', 'App\Http\Controllers\UserController@show');
// Route::get('animals/index-paging', 'App\Http\Controllers\AnimalController@indexPaging');
Route::get('animals', 'AnimalController@index');
require __DIR__.'/auth.php';
