@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-warning text-dark">
                <h4 class="mb-0">✏️ Editar Filme: {{ $fita->titulo }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('fitas.update', $fita->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Título do Filme</label>
                            <input type="text" name="titulo" class="form-control" value="{{ $fita->titulo }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Gênero</label>
                            <input type="text" name="genero" class="form-control" value="{{ $fita->genero }}" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Quantidade em Estoque</label>
                            <input type="number" name="quantidade_disponivel" class="form-control" value="{{ $fita->quantidade_disponivel }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Preço da Locação (R$)</label>
                            <input type="number" step="0.01" name="preco_locacao" class="form-control" value="{{ $fita->preco_locacao }}" required>
                        </div>
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">Atualizar Filme</button>
                        <a href="/fitas" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
