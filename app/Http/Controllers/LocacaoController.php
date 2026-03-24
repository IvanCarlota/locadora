<?php

namespace App\Http\Controllers;

use App\Models\Locacao;
use App\Models\Fita;
use App\Models\Cliente;
use Illuminate\Http\Request;

class LocacaoController extends Controller
{
    public function index() {
        // Carrega locações ativas com dados do cliente e da fita (onde está o preço)
        $locacoes = Locacao::with(['cliente', 'fita'])->where('status', 'ativo')->get();
        return view('locacoes.index', compact('locacoes'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        $fitas = Fita::where('quantidade_disponivel', '>', 0)->get();
        return view('locacoes.cadastro', compact('clientes', 'fitas'));
    }

    public function store(Request $request)
    {
        Locacao::create([
            'cliente_id' => $request->cliente_id,
            'fita_id' => $request->fita_id,
            'data_locacao' => now(),
            'data_devolucao_prevista' => $request->data_devolucao_prevista,
            'status' => 'ativo'
        ]);

        $fita = Fita::find($request->fita_id);
        if ($fita) {
            $fita->decrement('quantidade_disponivel');
        }

        return redirect('/locacoes')->with('success', 'Locação realizada com sucesso!');
    }

    // Abre o formulário de edição
    public function edit($id) {
        $locacao = Locacao::findOrFail($id);
        $clientes = Cliente::all();
        $fitas = Fita::all(); // Aqui mostramos todas para permitir a troca

        return view('locacoes.edit', compact('locacao', 'clientes', 'fitas'));
    }

// Salva a alteração
    public function update(Request $request, $id) {
        $locacao = Locacao::findOrFail($id);

        $locacao->update([
            'cliente_id' => $request->cliente_id,
            'fita_id' => $request->fita_id,
            'data_devolucao_prevista' => $request->data_devolucao_prevista,
            // O status geralmente não muda na edição, a menos que você queira
        ]);

        return redirect('/locacoes')->with('success', 'Locação atualizada com sucesso!');
    }

    // Devolução: muda o status e devolve ao estoque
    public function destroy($id)
    {
        $locacao = Locacao::findOrFail($id);

        $fita = Fita::find($locacao->fita_id);
        if($fita) {
            $fita->increment('quantidade_disponivel');
        }

        $locacao->update(['status' => 'concluido']);

        return redirect('/locacoes')->with('success', 'Filme devolvido e estoque atualizado!');
    }
}
