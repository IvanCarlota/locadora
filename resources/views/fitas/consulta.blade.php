@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="d-flex justify-content-between mb-3 align-items-center">
            <h2>🎬 Consulta de Filmes/Fitas</h2>
            <a href="/fitas/novo" class="btn btn-success shadow-sm">Nova Fita</a>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body p-0">
                <table class="table table-hover bg-white mb-0">
                    <thead class="table-dark">
                    <tr>
                        <th style="width: 80px;">ID</th>
                        <th>Título</th>
                        <th>Gênero</th>
                        <th class="text-center">Qtd</th>
                        <th>Preço</th>
                        <th class="text-center" style="width: 300px;">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($fitas as $fita)
                        <tr>
                            <td class="align-middle">{{ $fita->id }}</td>
                            <td class="align-middle"><strong>{{ $fita->titulo }}</strong></td>
                            <td class="align-middle">{{ $fita->genero }}</td>
                            <td class="align-middle text-center">{{ $fita->quantidade_disponivel }}</td>
                            <td class="align-middle">R$ {{ number_format($fita->preco_locacao, 2, ',', '.') }}</td>
                            <td class="align-middle text-center">

                                <a href="{{ route('fitas.show', $fita->id) }}" class="btn btn-sm btn-info text-white shadow-sm me-2">
                                    Show
                                </a>

                                <a href="/fitas/{{ $fita->id }}/edit" class="btn btn-sm btn-warning shadow-sm me-2">
                                    Editar
                                </a>

                                <form action="{{ route('fitas.destroy', $fita->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger shadow-sm" onclick="return confirm('Deseja realmente excluir o filme {{ $fita->titulo }}?')">
                                        Excluir
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        @if($fitas->isEmpty())
            <div class="alert alert-light text-center mt-3 border">
                Nenhum filme cadastrado no catálogo.
            </div>
        @endif
    </div>
@endsection
