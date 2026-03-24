@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">👤 Editar Cliente: {{ $cliente->nome }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nome Completo</label>
                            <input type="text" name="nome" class="form-control" value="{{ $cliente->nome }}" required>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">CPF</label>
                            <input type="text" name="cpf" class="form-control" value="{{ $cliente->cpf }}" required>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Telefone</label>
                            <input type="text" name="telefone" class="form-control" value="{{ $cliente->telefone }}" required>
                        </div>
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn btn-success">Salvar Alterações</button>
                        <a href="/clientes" class="btn btn-secondary">Voltar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
