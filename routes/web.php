<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SupportFormController;
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

Route::get('/', [HomeController::class, "index"])->name("home");

Route::get('/about', [HomeController::class, "about"])->name("about");

Route::get('/contact', [ContactController::class, "showForm"])->name("contact");
Route::post('/contact', [ContactController::class, "contact"]);
Route::post('/user/{id}/{name}', [ContactController::class, "user"])
    ->name('user')
    ->where(['id' => '[0:9]+', 'name' => '[a:z]+']);

Route::match(['get', 'post'], '/support-form', [SupportFormController::class, "support"])
    ->name("support-form.support");
