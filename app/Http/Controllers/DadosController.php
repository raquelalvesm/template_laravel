<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateUserFormRequest;
use App\Models\User;
use Illuminate\Http\Request;

class DadosController extends Controller
{
    public function index(Request $request)
    {
        // dd($request->search);
        // $users = User::get();
        $search = $request->search;
        $users = User::where(function ($query) use ($search){
            if($search){
                $query->where('email', $search);
                $query->orWhere('name', 'LIKE', "%{$search}%");
            }
        })->get();
        // dd($users);
        return view('users.index', compact('users'));
    }

    public function show($id)
    {
        // dd('users.show', $id);
       // $user = User::where('id',$id)->get()->first();
       if (!$user = User::find($id))
            return redirect()->route('users.index');
        // dd($user);

        // dd('users.show', $id);
        return view('users.show',compact('user'));
    }

    public function create()
    {
        return view('users.create');
    }
    public function store(StoreUpdateUserFormRequest $request){
        // dd('cadastrando o usuário');
        // dd($request->all());
        // dd($request->only([
        //     'name', 'password', 'email'
        // ]));

        $data = $request->all();
        $data['password']= bcrypt($request->password);

        $user = User::create($data);
        return redirect()->route('users.index');
      

        // $user = new User;
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->password = $request->password;
        // $user->save();
    }

    public function edit($id)
    {
        if (!$user = User::find($id))

             return redirect()->route('users.index');
        return view('users.edit', compact('user'));
    }

    
    public function update(Request $request, $id)
    {
        if (!$user = User::find($id))

             return redirect()->route('users.index');
        
            //  $user->name = $request->get('name');
            //  $user->save();
            $data = $request->only('name', 'email');
            if ($request->password)
                $data['password']=bcrypt($request->password);
            $user->update($data);
            return redirect()->route('users.index');
        // return view('users.edit', compact('user'));
        // dd($request->all());
    }

    public function delete(Request $request, $id)
    {
        if (!$user = User::find($id))

             return redirect()->route('users.index');
                    
        $user->delete();
        return redirect()->route('users.index');
      
    }
}
