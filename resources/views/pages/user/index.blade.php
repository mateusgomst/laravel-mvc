@extends('layouts.default')

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Listagem de Usuários</h1>
            <a href="{{ route('users.create') }}" class="btn btn-success">
                <i class="bi bi-plus-circle"></i> Novo
            </a>
        </div>

        <div class="card mb-4">
            <div class="card-body">
                <form method="GET" action="{{ route('users.index') }}" class="row g-3">
                    <div class="col-md-5">
                        <input type="text" name="name" class="form-control" value="{{ Request::get('name') }}"
                            placeholder="Buscar por nome...">
                    </div>
                    <div class="col-md-5">
                        <input type="text" name="email" class="form-control" value="{{ Request::get('email') }}"
                            placeholder="Buscar por email...">
                    </div>
                    <div class="col-md-2">
                        @include('components.limit')
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Buscar</button>
                        <a href="{{ route('users.index') }}" class="btn btn-secondary">Limpar</a>
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Usuários</h5>
            </div>
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($list as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td class="text-center">
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-primary">Editar</a>
                                    <form method="POST" action="{{ route('users.destroy', $user->id) }}"
                                        style="display: inline;" onsubmit="return confirm('Remover?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Remover</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted py-4">Nenhum usuário encontrado</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="card-footer bg-light d-flex justify-content-center">
                {{ $list->links('pagination::simple-bootstrap-5') }}
            </div>
        </div>
    </div>
@endsection
