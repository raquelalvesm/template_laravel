<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;





class LoginController extends Controller
{

    // public function index()
    // {
    //     return view('layouts.login');
    // }  
       
 

    // // use AuthenticatesUsers;
    // public function login(LoginRequest $request)
    // {
    //     $credentials = $request->getCredentials();

    //     if(!Auth::validate($credentials)):
    //         return redirect()->to('login')
    //             ->withErrors(trans('layouts.failed'));
    //     endif;

    //     $user = Auth::getProvider()->retrieveByCredentials($credentials);

    //     Auth::login($user);

    //     return $this->layoutsenticated($request, $user);
    // }

    // public function show()
    // {
    //     return view('layouts.login');
    // }

    // protected function credentials(Request $request)
    // {
        
    //     $request->validate([
    //         'username' => 'required',
    //         'password' => 'required',
    //     ]);
    
    //     $credentials = $request->only('username', 'password');
    //     if (Auth::attempt($credentials)) {
    //         return redirect()->intended('dashboard')
    //                     ->withSuccess('Signed in');
    //     }
   
    //     return redirect("login")->withSuccess('Login details are not valid');
       
    // }
    // public function username(){
    //     return 'username';
    // }
    // public function customLogin(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required',
    //         'password' => 'required',
    //     ]);
    
    //     $credentials = $request->only('email', 'password');
    //     if (Auth::attempt($credentials)) {
    //         return redirect()->intended('dashboard')
    //                     ->withSuccess('Signed in');
    //     }
   
    //     return redirect("login")->withSuccess('Login details are not valid');
    // }
 
 
 
    // public function registration()
    // {
    //     return view('layouts.registration');
    // }
       
 
    // public function customRegistration(Request $request)
    // {  
    //     $request->validate([
    //         'name' => 'required',
    //         'email' => 'required|email|unique:users',
    //         'password' => 'required|min:6',
    //     ]);
            
    //     $data = $request->all();
    //     $check = $this->create($data);
          
    //     return redirect("dashboard")->withSuccess('have signed-in');
    // }
 
 
    // public function create(array $data)
    // {
    //   return User::create([
    //     'name' => $data['name'],
    //     'email' => $data['email'],
    //     // 'password' => Hash::make($data['password'])
    //   ]);
    // }    
     
 
    // public function dashboard()
    // {
    //     if(Auth::check()){
    //         return view('dashboard');
    //     }
   
    //     return redirect("login")->withSuccess('are not allowed to access');
    // }
}

?>