<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    // Listagem (Consulta)
    public function index() {
        $clientes = Cliente::all();
        return view('clientes.consulta', compact('clientes'));
    }

    // Formulário (Cadastro)
    public function create() {
        return view('clientes.cadastro');
    }

    // Salvar no banco
    public function store(Request $request) {
        $request->validate([
            'nome' => 'required|min:3',
            // Regex para CPF: 000.000.000-00
            'cpf' => ['required', 'regex:/^\d{3}\.\d{3}\.\d{3}\-\d{2}$/', 'unique:clientes'],
            // Regex para Telefone: (00) 00000-0000 ou (00) 0000-0000
            'telefone' => ['required', 'regex:/^\(\d{2}\) \d{4,5}\-\d{4}$/'],
        ], [
            'cpf.regex' => 'O CPF deve estar no formato 000.000.000-00',
            'telefone.regex' => 'O Telefone deve estar no formato (00) 00000-0000',
        ]);

        \App\Models\Cliente::create($request->all());
        return redirect('/clientes')->with('success', 'Cliente cadastrado com sucesso!');
    }

    public function edit($id) {
        $cliente = \App\Models\Cliente::findOrFail($id);
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, $id) {
        $cliente = \App\Models\Cliente::findOrFail($id);
        $cliente->update($request->all());
        return redirect('/clientes')->with('success', 'Cliente atualizado!');
    }

    public function destroy($id) {
        \App\Models\Cliente::findOrFail($id)->delete();
        return redirect('/clientes')->with('success', 'Cliente removido!');
    }

    public function show($id) {
        // Carrega o cliente com suas locações e os dados da fita vinculada
        $cliente = \App\Models\Cliente::with('locacoes.fita')->findOrFail($id);
        return view('clientes.show', compact('cliente'));
    }
}
