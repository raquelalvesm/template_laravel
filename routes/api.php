<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\v1\UserController;
use Illuminate\Support\Facades\Auth;
use App\Ldap\User;
use App\Http\Controllers\LoginController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/v1')->group(function() {
    Route::get('/',function(){
    return response()->json(['status' => true]);
    });

    // Route::get('/',[UserController::class, 'index']);
    Route::resources ([
        '/users'=> UserController::class,
    ]);
});

//http://localhost:8282/api/ldap?username=pi100348

//conexao LDAP
Route::get('/ldap', function (Request $request) {
    try {
        $credentials = $request->only('username');
        $username = $credentials['username'];
        $ldapuser = User::where(env('LDAP_USER_ATTRIBUTE'), '=', $username . "")->first();
        return response()->json($ldapuser);
    } catch (\Exception $e) {
        return response()->json(["message" => $e->getMessage()], 200);
    }
});

//conexão para A10
Route::get('/heartbeat', function () {
    return random_int(1, 999);
});


// Route::get('/login', function () {
//     try{
//         return view('welcome');
    
//     }catch (\Exception $e) {
        
//         return response()->json(['status' => false]);
//     }
   
// });
Route::group(['middleware' => ['guest']], function() {
    Route::get('/login', 'LoginController@show')->name('login.show');
    // Route::post('/login', 'LoginController@login')->name('login.perform');
});
