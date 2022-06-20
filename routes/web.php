<?php

use App\Http\Controllers\DadosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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
    return view('layouts.welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


// Route::get('/login', function () {
//     try{
//         return view('welcome');
    
//     }catch (\Exception $e) {
        
//         return response()->json(['status' => false]);
//     }
   
// });

// Route::group(['namespace' => 'App\Http\Controllers'], function()
// {   
//     /**
//      * Home Routes
//      */
//     Route::get('/', 'HomeController@index')->name('home.index');

//     Route::group(['middleware' => ['guest']], function() {
//         /**
//          * Register Routes
//          */
//         Route::get('/register', 'RegisterController@show')->name('register.show');
//         Route::post('/register', 'RegisterController@register')->name('register.perform');

//         /**
//          * Login Routes
//          */
//         Route::get('/login', 'LoginController@show')->name('login.show');
//         Route::post('/login', 'LoginController@login')->name('login.perform');

//     });

//     Route::group(['middleware' => ['auth']], function() {
//         /**
//          * Logout Routes
//          */
//         Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
//     });
// });

Route::get('dashboard', [LoginController::class, 'dashboard']); 
Route::get('login', [LoginController::class, 'index'])->name('login');
// Route::post('custom-login', [LoginController::class, 'customLogin'])->name('login.custom'); 
// Route::get('registration', [LoginController::class, 'registration'])->name('register-user');
// Route::post('custom-registration', [LoginController::class, 'customRegistration'])->name('register.custom'); 
// Route::get('signout', [LoginController::class, 'signOut'])->name('signout');
Route::delete('/users/{id}',[DadosController::class, 'delete'])->name('users.delete');
Route::put('/users/{id}',[DadosController::class, 'update'])->name('users.update');
Route::get('/users/{id}/edit',[DadosController::class, 'edit'])->name('users.edit');
Route::get('/users',[DadosController::class, 'index'])->name('users.index');
Route::get('/users/create',[DadosController::class, 'create'])->name('users.create');
Route::post('/users',[DadosController::class, 'store'])->name('users.store');
Route::get('/users/{id}',[DadosController::class, 'show'])->name('users.show');

