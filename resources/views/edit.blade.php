@extends('layouts.app')

@section('title', "Editar  Usuário {$user->name}")
@section('content')



<h1>Editar  Usuário {{$user->name}}</h1>
@if ($errors->any())
    <ul class="errors">
        @foreach ($errors->all() as $error)
            <li class="error">{{$error}}</li>
        @endforeach
    </ul>

@endif
    <form action="{{route('users.update', $user->id)}}" method="post">
        {{-- <input type="hidden" name="_method" value="PUT"> --}}
        @method('PUT')
        @include('users._partials.form')
    </form>
@endsection