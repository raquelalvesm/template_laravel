@extends('layouts.app')

@section('content')
    <h1>
        Listagem de frequencia
        <a href="{{route('users.create')}}">+</a>

    </h1>

    <form action="{{route('users.index')}}" method="get">
        <input type="text" name="search" placeholder="Pesquisar">
        <button >Pesquisar</button>
    </form>
    <u1>
        @foreach ($users as $user)
        <li>
            {{$user-> name}}-
            {{$user->email}}
            <a href="{{route ('users.edit', $user->id)}}">Editar</a>
            <a href="{{route ('users.show', $user->id)}}">Detalhes</a>
        </li>
            
        @endforeach
    </u1>
@endsection





{{-- <h1>Listagem de frequencia</h1> --}}