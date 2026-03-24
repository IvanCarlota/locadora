@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="d-flex justify-content-between mb-3 align-items-center">
            <h2>📋 Consulta de Clientes</h2>
            <a href="/clientes/novo" class="btn btn-primary shadow-sm">Novo Cliente</a>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body p-0">
                <table class="table table-hover bg-white mb-0">
                    <thead class="table-primary">
                    <tr>
                        <th style="width: 80px;">ID</th>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Telefone</th>
                        <th class="text-center" style="width: 300px;">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($clientes as $cliente)
                        <tr>
                            <td class="align-middle">{{ $cliente->id }}</td>
                            <td class="align-middle"><strong>{{ $cliente->nome }}</strong></td>
                            <td class="align-middle">{{ $cliente->cpf }}</td>
                            <td class="align-middle">{{ $cliente->telefone }}</td>
                            <td class="align-middle text-center">

                                <a href="{{ route('clientes.show', $cliente->id) }}" class="btn btn-sm btn-info text-white shadow-sm me-2">
                                    Show
                                </a>

                                <a href="/clientes/{{ $cliente->id }}/edit" class="btn btn-sm btn-warning shadow-sm me-2">
                                    Editar
                                </a>

                                <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger shadow-sm" onclick="return confirm('Excluir {{ $cliente->nome }}?')">
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
    </div>
@endsection
