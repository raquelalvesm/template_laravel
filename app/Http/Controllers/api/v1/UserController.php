<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateorUpdateUser;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $users = User::all();
            return response()->json(['status'=>true, 'users'=> $users], 200);
        }catch (\Exception $e){
            return response()->json(['status'=>false, 'message'=> $e->getMessage()], 500);
            
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateorUpdateUser $request
     * @return JsonResponse
     */
    public function store(CreateorUpdateUser $request)
    {
        try{
            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password'=>bcrypt($request->input('password')),
            ]);
            return response()->json(['status'=>true, 'user'=> $user], 200);
        }catch (\Exception $e){
            return response()->json(['status'=>false, 'message'=> $e->getMessage()], 500);
            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $user = User::find($id);
            
            return response()->json(['status'=>true, 'user'=> $user], 200);
        }catch (\Exception $e){
            return response()->json(['status'=>false, 'message'=> $e->getMessage()], 500);
        }   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CreateorUpdateUser  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateorUpdateUser $request, $id)
    {
        try{
            $data = $request->all();
            $user = User::find($id);
            $user->update($data);

            return response()->json(['status'=>true, 'user'=> $user], 200);
        }catch (\Exception $e){
            return response()->json(['status'=>false, 'message'=> $e->getMessage()], 500);
        }
            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
           
            $user = User::find($id);
            $user->delete();

            return response()->json(['status'=>true], 200);
        }catch (\Exception $e){
            return response()->json(['status'=>false, 'message'=> $e->getMessage()], 500);
        }
    }
}
