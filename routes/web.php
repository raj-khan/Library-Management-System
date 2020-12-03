<?php

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

Route::group(['middleware'=>'guest'],function(){
    Route::get('/', function(){
        return redirect()->to('login');
    });
    Route::get('login','UserController@index');
    Route::post('login', 'Auth\LoginController@login');
    Route::get('registration', 'Auth\RegisterController@showRegistrationForm');
    Route::post('registration', 'Auth\RegisterController@register');
});




//Route::group(['middleware'=>'auth'],function(){
//
//    Route::get('/dashboard', function () {
//        return view('dashboard');
//    })->middleware(['auth'])->name('dashboard');
//
//    Route::get('users','UserController@index');
//
//});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//Route::get('/users', 'UserController@index')->middleware(['auth'])->name('users');

Route::group(['middleware'=>'auth'],function(){
    Route::get('users','UserController@index');
});


require __DIR__.'/auth.php';
