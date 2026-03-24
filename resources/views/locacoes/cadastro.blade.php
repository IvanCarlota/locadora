@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2>🆕 Registrar Nova Locação</h2>
        <form action="{{ route('locacoes.store') }}" method="POST" class="card card-body shadow-sm">
            @csrf
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label>Selecionar Cliente</label>
                    <select name="cliente_id" class="form-select" required>
                        <option value="">Selecione um cliente...</option>
                        @foreach($clientes as $cliente)
                            <option value="{{ $cliente->id }}">{{ $cliente->nome }} (CPF: {{ $cliente->cpf }})</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <label>Selecionar Filme (Em Estoque)</label>
                    <select name="fita_id" class="form-select" required>
                        <option value="">Selecione um filme...</option>
                        @foreach($fitas as $fita)
                            <option value="{{ $fita->id }}">{{ $fita->titulo }} - R$ {{ number_format($fita->preco_locacao, 2, ',', '.') }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <label>Data para Devolução</label>
                    <input type="date" name="data_devolucao_prevista" class="form-control" value="{{ date('Y-m-d', strtotime('+3 days')) }}" required>
                </div>
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary btn-lg">Finalizar Locação</button>
                <a href="/locacoes" class="btn btn-secondary btn-lg">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
