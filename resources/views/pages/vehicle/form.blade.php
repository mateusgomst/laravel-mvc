@extends('layouts.default')

@section('content')
    <h1>Form Veiculo</h1>

    <form action={{ $vehicle->id ? route('vehicles.update', parameters: $vehicle->id) : route('vehicles.store') }}
        method="POST">
        @csrf

        @if ($vehicle->id)
            @method('PUT')
        @endif

        <div>
            <label>Modelo:</label>
            <select name="model_id">
                <option value="">Selecione um modelo</option>
                @foreach ($models as $model)
                    <option value="{{ $model->id }}" {{ $model->brand_name }} - {{ $model->name }}>
                        {{ $model->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label>Modelo no ano</label>
            <input type="integer" name="model_year" value="{{ $vehicle->model_year }}">
        </div>

        <div>
            <label>Ano de fabricação</label>
            <input type="integer" name="year" value="{{ $vehicle->year }}">
        </div>

        <div>
            <label>Cor:</label>
            <select name="color_id">
                <option value="">Selecione uma cor</option>
                @foreach ($colors as $color)
                    <option value="{{ $color->id }}" {{ $vehicle->color_id == $color->id ? 'selected' : '' }}>
                        {{ $color->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label>Placa</label>
            <input type="string" name="plate" value="{{ $vehicle->plate }}">
        </div>

        <div>
            <label>Opcionais:</label>
            <select name="optional_id" multiple>
                @foreach ($optionals as $optional)
                    <option value="{{ $optional->id }}"
                        {{ $vehicle->optionals->contains($optional->id) ? 'selected' : '' }}>
                        {{ $optional->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit">Salvar</button>
        <a href="{{ route('vehicles.index') }}">Voltar</a>
    </form>
@endsection

<x-footer></x-footer>
