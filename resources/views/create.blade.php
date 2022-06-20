@extends('layouts.app')

@section('title', 'NovoUsuário')
@section('content')



<h1>Novo Usuário</h1>
@if ($errors->any())
    <ul class="errors">
        @foreach ($errors->all() as $error)
            <li class="error">{{$error}}</li>
        @endforeach
    </ul>

@endif
    <form action="{{route('users.store')}}" method="post">
        
        @include('users._partials.form')
    </form>
@endsection