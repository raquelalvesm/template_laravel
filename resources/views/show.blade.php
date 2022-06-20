@extends('layouts.app')

@section('title', 'listagem do Usuário')
@section('content')

<h1>Listagem de frequencia   {{$user->name}}</h1>
    <u1>
        <li>
           
            {{$user->name}}-
            {{$user->email}}
        
        </li>
            
   
    </u1>
    <form action="{{route('users.delete', $user->id)}}" method="POST">
        
        @method('DELETE')
        @csrf
        <button type="submit">Deletar</button>
    </form>


@endsection