<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlagasController;

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

//Route::get('/plagas/create',[PlagasController::class, 'create']);

Route::resource('plagas' ,PlagasController::class);
Auth::routes();
//Auth::routes(['register'=>false,'reset'=>false]);

//Route::resource('plagas', PlagasController::class)->middleware('auth');
//Route::get('/home', [PlagasController::class, 'index'])->name('home');
//Route::group(['middleware' => 'auth'], function(){
//    Route::get('/', [PlagasController::class, 'index'])->name('home');
//});