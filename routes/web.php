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


use App\Http\Controllers\HomeController;
// Route::get('/', [HomeController::class, 'index']);
Route::get('/', [App\Http\Controllers\HomeController::class, 'welcome']);

use App\Http\Controllers\ContactController;
//Route::get('/contact', [ContactController::class, 'index']);
Route::get('/contact', [ContactController::class, 'create']);
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

use App\Http\Controllers\RecipeController;
// Route::get('/recettes', [RecipeController::class, 'index']);
// Route::get('/recettes/{recipe}', [App\Http\Controllers\RecipeController::class, 'show'])->name('recettes.show');
Route::get('/recettes/{url}',[RecipeController::class, 'show']);
Route::get('/recettes', [App\Http\Controllers\RecipeController::class, 'welcome']);

use App\Http\Controllers\Admin\RecipesController;
Route::resource('admin/recipes', RecipesController::class);


use App\Http\Controllers\DashboardController;
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

use App\Http\Controllers\ProfileController;
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

require __DIR__.'/auth.php';


use App\Http\Controllers\Admin\UserController;
Route::resource('admin/user', UserController::class);

use App\Http\Controllers\Admin\RoleController;
Route::resource('admin/roles', RoleController::class);

