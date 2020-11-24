<?php

use App\Http\Controllers\CreateController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/toilason', function () {
    return view('toilason');
});
Route::get('create', [ CreateController::class, 'create' ])->name('file.upload');
Route::post('create', [ CreateController::class, 'createPost' ])->name('file.upload.post');

Auth::routes();

Route::get('/list', [App\Http\Controllers\ListController::class, 'index'])->name('list');
