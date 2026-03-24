<?php

namespace App\Http\Controllers;

use App\Models\Fita;
use App\Models\Locacao; // Importante para checar antes de deletar
use Illuminate\Http\Request;

class FitaController extends Controller
{
    public function index() {
        $fitas = Fita::all();
        return view('fitas.consulta', compact('fitas'));
    }

    public function create() {
        return view('fitas.cadastro');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'titulo' => 'required|min:2',
            'genero' => 'required',
            'quantidade_disponivel' => 'required|integer|min:0',
            'preco_locacao' => 'required|numeric|min:0',
        ]);

        Fita::create($data);
        return redirect('/fitas')->with('success', 'Fita cadastrada com sucesso!');
    }

    public function edit($id) {
        $fita = Fita::findOrFail($id);
        return view('fitas.edit', compact('fita'));
    }

    public function update(Request $request, $id) {
        $fita = Fita::findOrFail($id);

        // Validando também no update para manter a integridade
        $data = $request->validate([
            'titulo' => 'required',
            'genero' => 'required',
            'quantidade_disponivel' => 'required|integer|min:0',
            'preco_locacao' => 'required|numeric|min:0',
        ]);

        $fita->update($data);
        return redirect('/fitas')->with('success', 'Filme atualizado!');
    }

    public function show($id) {
        // Busca a fita e traz junto as locações e os clientes que a alugaram
        $fita = Fita::with(['locacoes.cliente'])->findOrFail($id);

        return view('fitas.show', compact('fita'));
    }

    public function destroy($id) {
        $fita = Fita::findOrFail($id);

        // VERIFICAÇÃO DE SEGURANÇA:
        // Checa se existe alguma locação ATIVA para este filme antes de apagar
        $temLocacaoAtiva = \App\Models\Locacao::where('fita_id', $id)
            ->where('status', 'ativo')
            ->exists();

        if ($temLocacaoAtiva) {
            return redirect('/fitas')->with('error', 'Não é possível remover: este filme está alugado no momento!');
        }

        $fita->delete();
        return redirect('/fitas')->with('success', 'Filme removido!');
    }
}
