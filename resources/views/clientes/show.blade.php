@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>👤 Histórico de Locações: {{ $cliente->nome }}</h2>
            <a href="/clientes" class="btn btn-secondary shadow-sm">Voltar</a>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead class="table-primary">
                    <tr>
                        <th>Filme / Fita</th>
                        <th class="text-center">Data Locação</th>
                        <th class="text-center">Status</th>
                        <th class="text-end">Valor do Filme</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $totalGeral = 0; @endphp
                    @forelse($cliente->locacoes as $locacao)
                        @php $totalGeral += $locacao->fita->preco_locacao; @endphp
                        <tr>
                            <td class="align-middle"><strong>{{ $locacao->fita->titulo }}</strong></td>
                            <td class="align-middle text-center">
                                {{ \Carbon\Carbon::parse($locacao->data_locacao)->format('d/m/Y') }}
                            </td>
                            <td class="align-middle text-center">
                                <span class="badge {{ $locacao->status == 'ativo' ? 'bg-warning text-dark' : 'bg-success' }}">
                                    {{ $locacao->status == 'ativo' ? 'Pendente' : 'Devolvido' }}
                                </span>
                            </td>
                            <td class="align-middle text-end">
                                R$ {{ number_format($locacao->fita->preco_locacao, 2, ',', '.') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-4 text-muted">Este cliente ainda não realizou locações.</td>
                        </tr>
                    @endforelse
                    </tbody>
                    <tfoot class="table-light">
                    <tr>
                        <td colspan="3" class="text-end"><strong>Total Acumulado:</strong></td>
                        <td class="text-end"><strong>R$ {{ number_format($totalGeral, 2, ',', '.') }}</strong></td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
