<?php

use App\Http\Controllers\SolutionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaticController;
use App\Http\Controllers\AdminController;
//use App\Http\Controllers\OsController;
use App\Http\Controllers\UserController;

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

Route::get('/home', 'HomeController@index')->name('backoffhome');

/*
Wroten routes
*/
//Admin routesRoute::resource('users', UserController::class);
Route::resource('users', UserController::class);
Route::resource('categories', CategorieController::class);
Route::resource('subcategories', SubcategorieController::class);
Route::resource('platforms', PlatformController::class);
Route::resource('os', OsController::class);
Route::resource('messages', MessageController::class);
Route::resource('countries', CountryController::class);

Route::get('/admin', [AdminController::class, 'index'])->name('Admin');
Route::get('/admin/solutions', [AdminController::class, 'solutions'])->name('admin.solutions');
Route::get('/admin/users', 'UserController@index');
Route::get('/admin/categories', 'CategorieController@index');
Route::get('/admin/subcategories', 'SubcategorieController@index');
Route::get('/admin/platforms', 'PlatformController@index');
Route::get('/admin/os', 'OsController@index');
Route::get('/admin/messages', 'MessageController@index');
Route::get('/admin/countries', 'CountryController@index');
//test route for admin pages
Route::get('/testadmin/countries', function(){
    return view('admin.countries');
});

//Main app routes
Route::resource('solutions', 'SolutionController');
Route::resource('comments', CommentController::class);
Route::get('/','StaticController@accueil')->name('home');
Route::get('/directory', [StaticController::class, 'marketplaceIndex'])->name('marketplace');
Route::get('/directory/filter',[StaticController::class, 'filter'])->name('filter');
Route::get($request->fullUrl()+'/adfilter',[StaticController::class, 'advancedfilter'])->name('advancedfilter');
Route::get('/directory/search', [StaticController::class, 'search'])->name('staticsearch');
Route::get('/directory/{sol}', [StaticController::class,'solution'])->name('staticsolution');
Route::get('/directory/publisher/{user}', [StaticController::class, 'user'])->name('showpublisher');
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

Route::get('directory/categories/{name}', [StaticController::class, 'interceptCatName'])->name('fcat');
Route::get('directory/categories/subcategories/{name}', [StaticController::class, 'interceptSubcatName'])->name('fsubcat');
Route::get('diretcory/platforms/{name}', [StaticController::class, 'interceptPlatName'])->name('fplatform');
Route::post('/store', [StaticController::class, 'storeFiles'])->name('uploads');
Route::view('/test', 'test');

