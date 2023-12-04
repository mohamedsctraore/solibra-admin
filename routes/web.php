<?php

use Illuminate\Support\Facades\Auth;
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


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'root']);

//Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index']);
//Language Translation

Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);

Route::post('/formsubmit', [App\Http\Controllers\HomeController::class, 'FormSubmit'])->name('FormSubmit');

/*
************** UTILISATEUR *****************************
*/
Route::get('/utilisateur', [App\Http\Controllers\UtilisateurController::class, 'create'])->name('utilisateurs.create');
Route::post('/utilisateur', [App\Http\Controllers\UtilisateurController::class, 'store'])->name('utilisateurs.store');
Route::get('/utilisateurs', [App\Http\Controllers\UtilisateurController::class, 'index'])->name('utilisateurs.index');
Route::get('/utilisateurs/{id}', [App\Http\Controllers\UtilisateurController::class, 'edit'])->name('utilisateurs.edit');
Route::post('/utilisateurs/{id}', [App\Http\Controllers\UtilisateurController::class, 'edit'])->name('utilisateurs.destroy');

/*
************** CLIENT *****************************
*/
Route::get('/client', [App\Http\Controllers\ClientController::class, 'create'])->name('clients.create');
Route::post('/client', [App\Http\Controllers\ClientController::class, 'store'])->name('clients.store');
Route::get('/clients', [App\Http\Controllers\ClientController::class, 'index'])->name('clients.index');
Route::get('/clients/{id}', [App\Http\Controllers\ClientController::class, 'edit'])->name('clients.edit');
Route::post('/clients/{id}', [App\Http\Controllers\ClientController::class, 'edit'])->name('clients.destroy');

/*
************** CATEGORIE *****************************
*/
Route::get('/categorie', [App\Http\Controllers\CategoryController::class, 'create'])->name('categories.create');
Route::post('/categorie', [App\Http\Controllers\CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{id}', [App\Http\Controllers\CategoryController::class, 'edit'])->name('categories.edit');
Route::post('/categories/{id}', [App\Http\Controllers\CategoryController::class, 'edit'])->name('categories.destroy');

/*
************** STATS *****************************
*/
Route::get('/stats', [App\Http\Controllers\ClientController::class, 'create'])->name('stats.create');
Route::post('/stats', [App\Http\Controllers\ClientController::class, 'store'])->name('stats.store');
Route::get('/stats', [App\Http\Controllers\ClientController::class, 'index'])->name('stats.index');
Route::get('/stats/{id}', [App\Http\Controllers\ClientController::class, 'edit'])->name('stats.edit');
Route::post('/stats/{id}', [App\Http\Controllers\ClientController::class, 'edit'])->name('stats.destroy');

/*
************** CAMPAGNES *****************************
*/
Route::get('/campagne', [App\Http\Controllers\CampagneController::class, 'create'])->name('campagnes.create');
Route::post('/campagne', [App\Http\Controllers\CampagneController::class, 'store'])->name('campagnes.store');
Route::get('/campagnes', [App\Http\Controllers\CampagneController::class, 'index'])->name('campagnes.index');
Route::get('/campagnes/{id}', [App\Http\Controllers\CampagneController::class, 'edit'])->name('campagnes.edit');
Route::post('/campagnes/{id}', [App\Http\Controllers\CampagneController::class, 'edit'])->name('campagnes.destroy');
Route::post('/send', [App\Http\Controllers\CampagneController::class, 'send'])->name('campagnes.send');



