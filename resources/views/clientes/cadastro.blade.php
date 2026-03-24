@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <h2>👤 Cadastro de Cliente</h2>
        <form action="{{ route('clientes.store') }}" method="POST" class="card card-body shadow-sm">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Nome Completo</label>
                    <input type="text" name="nome" class="form-control" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label>CPF</label>
                    <input type="text" name="cpf" class="form-control"
                           placeholder="000.000.000-00"
                           pattern="\d{3}\.\d{3}\.\d{3}-\d{2}"
                           title="Formato esperado: 000.000.000-00"
                           required>
                </div>

                <div class="col-md-3 mb-3">
                    <label>Telefone</label>
                    <input type="text" name="telefone" class="form-control"
                           placeholder="(00) 00000-0000"
                           pattern="\(\d{2}\) \d{4,5}-\d{4}"
                           title="Formato esperado: (00) 00000-0000"
                           required>
                </div>
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-success">Salvar Cadastro</button>
                <a href="/clientes" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
