@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="d-flex justify-content-between mb-3 align-items-center">
            <h2>📋 Filmes Locados (Em Andamento)</h2>
            <a href="/locacoes/novo" class="btn btn-primary shadow-sm">Nova Locação</a>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body p-0">
                <table class="table table-hover bg-white mb-0">
                    <thead class="table-dark">
                    <tr>
                        <th>Cliente</th>
                        <th>Filme</th>
                        <th class="text-center">Data Locação</th>
                        <th class="text-end">Valor (R$)</th>
                        <th class="text-center" style="width: 320px;">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($locacoes as $locacao)
                        <tr>
                            <td class="align-middle"><strong>{{ $locacao->cliente->nome }}</strong></td>
                            <td class="align-middle">{{ $locacao->fita->titulo }}</td>
                            <td class="align-middle text-center">
                                {{ \Carbon\Carbon::parse($locacao->data_locacao)->format('d/m/Y') }}
                            </td>
                            <td class="align-middle text-end">
                                R$ {{ number_format($locacao->fita->preco_locacao, 2, ',', '.') }}
                            </td>
                            <td class="align-middle text-center">
                                <div class="d-flex justify-content-center">

                                    <a href="{{ route('fitas.show', $locacao->fita_id) }}" class="btn btn-sm btn-info text-white shadow-sm me-2">
                                        Show
                                    </a>

                                    <a href="{{ route('locacoes.edit', $locacao->id) }}" class="btn btn-sm btn-warning shadow-sm me-2">
                                        Editar
                                    </a>

                                    <form action="{{ route('locacoes.destroy', $locacao->id) }}" method="POST" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-success shadow-sm" onclick="return confirm('Confirmar devolução: {{ $locacao->fita->titulo }}?')">
                                            Devolver
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                @if($locacoes->isEmpty())
                    <div class="p-4 text-center text-muted">
                        Nenhuma locação ativa no momento.
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
