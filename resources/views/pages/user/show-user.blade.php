<div>
    Id: {{ $user->id }}
    Nome: {{ $user->name }}
    Email: {{ $user->email }}

    <div>
        <a href="{{ route('users.index') }}">
            <button>Voltar</button>
        </a>
    </div>
</div>
