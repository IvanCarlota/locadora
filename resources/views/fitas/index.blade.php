@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>🎬 Cadastro de Novas Fitas</h2>

        <form action="{{ route('fitas.store') }}" method="POST" class="card card-body shadow-sm mb-5">
            @csrf
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label>Título</label>
                    <input type="text" name="titulo" class="form-control" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label>Gênero</label>
                    <input type="text" name="genero" class="form-control" required>
                </div>
                <div class="col-md-2 mb-3">
                    <label>Qtd</label>
                    <input type="number" name="quantidade_disponivel" class="form-control" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label>Preço Locação</label>
                    <input type="number" step="0.01" name="preco_locacao" class="form-control" required>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Salvar Fita</button>
        </form>

        <h3>📋 Todas as Fitas</h3>
        <table class="table table-striped bg-white shadow-sm">
            <thead class="table-dark">
            <tr>
                <th>ID</th><th>Título</th><th>Gênero</th><th>Qtd</th><th>Preço</th>
            </tr>
            </thead>
            <tbody>
            @foreach($fitas as $fita)
                <tr>
                    <td>{{ $fita->id }}</td>
                    <td>{{ $fita->titulo }}</td>
                    <td>{{ $fita->genero }}</td>
                    <td>{{ $fita->quantidade_disponivel }}</td>
                    <td>R$ {{ number_format($fita->preco_locacao, 2, ',', '.') }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
