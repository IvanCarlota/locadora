@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2>📝 Editar Locação #{{ $locacao->id }}</h2>

        <div class="card shadow-sm border-0">
            <div class="card-body">
                <form action="{{ route('locacoes.update', $locacao->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Cliente</label>
                        <select name="cliente_id" class="form-select">
                            @foreach($clientes as $cliente)
                                <option value="{{ $cliente->id }}" {{ $locacao->cliente_id == $cliente->id ? 'selected' : '' }}>
                                    {{ $cliente->nome }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Filme/Fita</label>
                        <select name="fita_id" class="form-select">
                            @foreach($fitas as $fita)
                                <option value="{{ $fita->id }}" {{ $locacao->fita_id == $fita->id ? 'selected' : '' }}>
                                    {{ $fita->titulo }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Data de Devolução Prevista</label>
                        <input type="date" name="data_devolucao_prevista" class="form-control" value="{{ $locacao->data_devolucao_prevista }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                    <a href="/locacoes" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
@endsection
