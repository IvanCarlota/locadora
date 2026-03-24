@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2>🎬 Cadastro de Nova Fita</h2>
        <form action="{{ route('fitas.store') }}" method="POST" class="card card-body shadow-sm">
            @csrf
            <div class="row">
                <div class="col-md-5 mb-3">
                    <label>Título do Filme</label>
                    <input type="text" name="titulo" class="form-control" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label>Gênero</label>
                    <input type="text" name="genero" class="form-control" required>
                </div>
                <div class="col-md-2 mb-3">
                    <label>Quantidade</label>
                    <input type="number" name="quantidade_disponivel" class="form-control" required>
                </div>
                <div class="col-md-2 mb-3">
                    <label>Preço (R$)</label>
                    <input type="number" step="0.01" name="preco_locacao" class="form-control" required>
                </div>
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-success">Cadastrar Filme</button>
                <a href="/fitas" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
