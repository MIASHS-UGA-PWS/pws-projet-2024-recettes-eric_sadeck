<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

use App\Http\Controllers\ContactController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\Admin\RecipesController;
use App\Http\Controllers\RatingsController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', [App\Http\Controllers\HomeController::class, 'welcome']);
Route::get('/contact', [ContactController::class, 'create']);
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/recettes/{url}',[RecipeController::class, 'show']);
Route::get('/recettes', [App\Http\Controllers\RecipeController::class, 'welcome']);
Route::resource('admin/recipes', RecipesController::class);
Route::post('/recipe/{recipe}/rate', [RatingsController::class, 'store'])->name('recipe.rate');
Route::post('/ratings/{recipe}', [RatingsController::class, 'store'])->name('ratings.store');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


