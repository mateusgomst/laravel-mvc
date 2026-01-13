@extends('layouts.default')

@section('content')

<h1>Form Usuário</h1>

<form action={{ $user->id ? route('users.update', parameters: $user->id) : route('users.store') }} method="POST">
    @csrf

    @if ($user->id)
        @method("PUT")
    @endif



    <div>
        <label>Nome:</label>
        <input type="text" name="name" value="{{ $user->name }}">
    </div>

    <div>
        <label>Email:</label>
        <input type="email" name="email" value="{{ $user->email }}">
    </div>

    <div>
        <label>Senha:</label>
        <input type="password" name="password">
    </div>

    <button type="submit">Salvar</button>
    <a href="{{ route('users.index') }}">Voltar</a>
</form>
@endsection

<x-footer></x-footer>
