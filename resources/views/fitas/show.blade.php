@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="mb-0">🎬 Detalhes do Filme</h2>
                <p class="text-muted">Análise de locações e rentabilidade</p>
            </div>
            <a href="/fitas" class="btn btn-secondary shadow-sm">
                <i class="bi bi-arrow-left"></i> Voltar
            </a>
        </div>

        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-dark text-white">
                <h5 class="mb-0">{{ $fita->titulo }}</h5>
            </div>
            <div class="card-body bg-white">
                <div class="row text-center">
                    <div class="col-md-3 border-end">
                        <small class="text-muted d-block">Gênero</small>
                        <strong>{{ $fita->genero }}</strong>
                    </div>
                    <div class="col-md-3 border-end">
                        <small class="text-muted d-block">Preço Unitário</small>
                        <strong class="text-success">R$ {{ number_format($fita->preco_locacao, 2, ',', '.') }}</strong>
                    </div>
                    <div class="col-md-3 border-end">
                        <small class="text-muted d-block">Estoque Disponível</small>
                        <strong>{{ $fita->quantidade_disponivel }} un</strong>
                    </div>
                    <div class="col-md-3">
                        <small class="text-muted d-block">Total de Locações</small>
                        <strong>{{ $fita->locacoes->count() }}</strong>
                    </div>
                </div>
            </div>
        </div>

        <h4>👥 Histórico de Clientes que Alugaram</h4>
        <div class="card shadow-sm border-0">
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead class="table-primary">
                    <tr>
                        <th>Nome do Cliente</th>
                        <th class="text-center">Data da Locação</th>
                        <th class="text-center">Status</th>
                        <th class="text-end">Valor na Época</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $totalArrecadado = 0; @endphp
                    @forelse($fita->locacoes as $locacao)
                        @php $totalArrecadado += $fita->preco_locacao; @endphp
                        <tr>
                            <td class="align-middle">
                                <strong>{{ $locacao->cliente->nome }}</strong>
                            </td>
                            <td class="align-middle text-center">
                                {{ \Carbon\Carbon::parse($locacao->data_locacao)->format('d/m/Y') }}
                            </td>
                            <td class="align-middle text-center">
                                <span class="badge {{ $locacao->status == 'ativo' ? 'bg-warning text-dark' : 'bg-success' }}">
                                    {{ $locacao->status == 'ativo' ? 'Em posse do cliente' : 'Devolvido' }}
                                </span>
                            </td>
                            <td class="align-middle text-end">
                                R$ {{ number_format($fita->preco_locacao, 2, ',', '.') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-4 text-muted">
                                Este filme ainda não possui registros de locação.
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                    @if(!$fita->locacoes->isEmpty())
                        <tfoot class="table-light">
                        <tr>
                            <td colspan="3" class="text-end"><strong>Receita Total Acumulada deste Filme:</strong></td>
                            <td class="text-end text-success">
                                <strong>R$ {{ number_format($totalArrecadado, 2, ',', '.') }}</strong>
                            </td>
                        </tr>
                        </tfoot>
                    @endif
                </table>
            </div>
        </div>
    </div>
@endsection
