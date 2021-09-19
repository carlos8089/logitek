<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaticController;

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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
/*
Frameork routes
*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*
Wroten routes
*/
Route::resource('solutions', SolutionController::class);
Route::get('/','StaticController@accueil');
Route::get('/sol/{sol}', [StaticController::class,'solution'])->name('staticsolution');
Route::get('/search', [StaticController::class, 'search'])->name('staticsearch');
Route::get('/logn', function(){
    return view('logn');
});
Route::get('/registr', function(){
    return view('registr');
});
/*
Route::get('/search', function(){
    return view('result');
});*/
Route::get('/projects', function(){
    return view('projects');
});
