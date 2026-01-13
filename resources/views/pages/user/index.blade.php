@extends('layouts.default')

@section('content')
    <div class="page page-user page-index">
        <h1>Listagem de Usuários</h1>

        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Ações</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($list as $user)
                        <tr>
                            <td>
                                <a href="{{ route('users.show', $user->id) }}">{{ $user->id }}</a>
                            </td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a href="{{ route('users.edit', $user->id) }}">
                                    <button>Editar</button>
                                </a>
                                <form method="POST" action="{{ route('users.destroy', $user->id) }}" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Deseja realmente remover?')">Remover</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <a href="{{ route('users.create') }}">
            <button>Criar Novo Usuário</button>
        </a>
    </div>
@endsection
