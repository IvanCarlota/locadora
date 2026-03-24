@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>👤 Cadastro de Clientes</h2>
    <form action="{{ route('clientes.store') }}" method="POST" class="card card-body shadow-sm mb-5">
        @csrf
        <div class="row">
            <div class="col-md-5 mb-3">
                <label>Nome Completo</label>
                <input type="text" name="nome" class="form-control" required>
            </div>
            <div class="col-md-3 mb-3">
                <label>CPF</label>
                <input type="text" name="cpf" class="form-control" required placeholder="000.000.000-00">
            </div>
            <div class="col-md-4 mb-3">
                <label>Telefone</label>
                <input type="text" name="telefone" class="form-control" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar Cliente</button>
    </form>

    <h3>📋 Lista de Clientes</h3>
    <table class="table table-hover bg-white shadow-sm">
        <thead class="table-primary">
        <tr>
            <th>ID</th><th>Nome</th><th>CPF</th><th>Telefone</th>
        </tr>
        </thead>
        <tbody>
        @foreach($clientes as $cliente)
            <tr>
                <td>{{ $cliente->id }}</td>
                <td>{{ $cliente->nome }}</td>
                <td>{{ $cliente->cpf }}</td>
                <td>{{ $cliente->telefone }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
