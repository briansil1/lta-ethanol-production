<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
// Front-end Routes(Home, User login, sing-in, dynamic tools, and downloadable files routes english versión
Route::group(['prefix' => 'en', 'middleware' => 'translate'], function() {
    Route::get('/static-home', '\App\Http\Controllers\MainController@home')->name('home');
    Route::get('/static-home/reset-pass/{token}', '\App\Http\Controllers\MainController@home')->name('reset-pass');
    Route::get('/dynamic-tools/{tab?}/{country?}/{compareCountry?}', '\App\Http\Controllers\MainController@tools')->name('dynamic-tools');
    Route::get('/get-components-options/{country?}', '\App\Http\Controllers\ComponentController@getComponentsList')->middleware(['auth', 'verified'])->name('get-components-list');
    Route::get('/download-profile-report', '\App\Http\Controllers\MainController@downloadProfile')->name('profile-pdf-en');
    Route::get('/download-emission-report', '\App\Http\Controllers\MainController@downloadEmission')->name('emission-file-en');
    Route::get('/download-components-report', '\App\Http\Controllers\MainController@downloadComponents')->name('components-file-en');
});

// Front-end Routes(Home, User login, sing-in, dynamic tools, and downloadable files routes spanish versión
Route::group(['prefix' => 'es', 'middleware' => 'translate'], function() {
    Route::get('/static-hogar', '\App\Http\Controllers\MainController@home')->name('hogar');
    Route::get('/static-hogar/cambiar-contrasena/{token}', '\App\Http\Controllers\MainController@home')->name('cambiar-contra');
    Route::get('/herramientas-dinamicas/{tab?}/{country?}/{compareCountry?}', '\App\Http\Controllers\MainController@tools')->name('herramientas-dinamicas');
    Route::get('/obtener-lista-components/{country?}', '\App\Http\Controllers\ComponentController@getComponentsList')->middleware(['auth', 'verified'])->name('obtener-lista-componentes');
    Route::get('/descargar-perfil-reporte', '\App\Http\Controllers\MainController@downloadProfile')->name('profile-pdf-es');
    Route::get('/descargar-emision-reporte', '\App\Http\Controllers\MainController@downloadEmission')->name('emission-file-es');
    Route::get('/descargar-componentes-reporte', '\App\Http\Controllers\MainController@downloadComponents')->name('components-file-es');
});

// Routes for emissions Tab
Route::get('/storage/get/{report?}', '\App\Http\Controllers\MainController@getPDFs')->middleware(['auth', 'verified'])->name('get-PDF');
Route::get('emissions/c/{country?}/{emission?}', '\App\Http\Controllers\EmissionController@getEmissionByCountry')->middleware(['auth', 'verified'])->name('get-emissions-by-country');
Route::get('emissions/c/{country}/{emission}/c/{compare?}', '\App\Http\Controllers\EmissionController@getEmissionByCountry')->middleware(['auth', 'verified'])->name('get-emissions-by-country-compare');
Route::get('emissions/c/{country}/{emission}/r/{compare?}', '\App\Http\Controllers\EmissionController@getEmissionByCountry')->middleware(['auth', 'verified'])->name('get-emissions-by-country-compare-region');
Route::get('emissions/r/{region?}/{emission?}', '\App\Http\Controllers\EmissionController@getEmissionByRegion')->middleware(['auth', 'verified'])->name('get-emissions-by-region');
Route::get('emissions/r/{region}/{emission}/c/{compare?}', '\App\Http\Controllers\EmissionController@getEmissionByRegion')->middleware(['auth', 'verified'])->name('get-emissions-by-region-compare-country');
Route::get('emissions/r/{region}/{emission}/r/{compare?}', '\App\Http\Controllers\EmissionController@getEmissionByRegion')->middleware(['auth', 'verified'])->name('get-emissions-by-region-compare');

// Routes for Components Tab
Route::get('component/c/{country?}/{gasoline?}/{grade?}', '\App\Http\Controllers\ComponentController@getComponentsByCountry')->middleware(['auth', 'verified'])->name('get-components-by-country');
Route::get('component/c/{country}/{gasoline}/{grade}/c/{compare?}', '\App\Http\Controllers\ComponentController@getComponentsByCountry')->middleware(['auth', 'verified']);

// Admin Section
Route::get('admin/c4js2', '\App\Http\Controllers\AdminController@home')->name('admin-home');
Route::post('admin/get-users', '\App\Http\Controllers\AdminController@getUsersReport')->name('admin-get-users');
/*
|--------------------------------------------------------------------------
| Routes without translation, consider to pass to an traslate code
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
