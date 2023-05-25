<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

use function Ramsey\Uuid\v1;

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

Route::prefix("/admin")->group(function () {
    Route::resource('/users', UserController::class)
        ->only(['index', 'create', 'show', 'edit']);
    Route::resource('/products', ProductController::class)
        ->only(['index', 'create', 'show', 'edit']);
});

Route::get("/test/{id}", function ($id) {
    return User::take(5)->orderBy('created_at', 'DESC')->get();
    return User::find($id)->update(['name' => 'Pham Toan Phuc']);
});
