<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mensagem;
use App\Models\Professor;

class MensagemController extends Controller
{
    public function index($id = null)
    {
        $mensagens = null;

        if ($id) {
            $mensagens = Mensagem::where('id', $id);
        }

        return view('mensage', ['mensagem' => $mensagens]);
    }

    public function create()
    {
        $professores = Professor::all();
        return view('create', ['professores' => $professores]);
    }

    public function dashboard()
    {
        $user = Auth::user();
        $mensagens = $user->mensagens;

        return view('dashboard', compact('mensagens'));
    }

    public function status($id = 0)
    {
        if ($id > 0) {
            Mensagem::where('id', $id)
                ->update([
                    'status' => 'respondida'
                ]);
            return view('dashboard');
        }
        return response()->json(['error' => 'Mensagem inválida']);
    }

    public function responder($id)
    {
        $mensagem = Mensagem::findOrFail($id);
        return view('responder', ['mensagem' => $mensagem]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'professor_id' => 'required',
            'nome_aluno' => 'required',
            'nascimento' => 'required|date',
            'whatsapp' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
            'mensagem' => 'required',
        ]);

        $novaMensagem = Mensagem::create([
            'professor_id' => $request->input('professor_id'),
            'nome_aluno' => $request->input('nome_aluno'),
            'nascimento' => $request->input('nascimento'),
            'whatsapp' => $request->input('whatsapp'),
            'cidade' => $request->input('cidade'),
            'estado' => $request->input('estado'),
            'mensagem' => $request->input('mensagem'),
        ]);

        if ($novaMensagem) {
            return response()->json(['success' => 'Mensagem criada com sucesso!']);
        }
        return response()->json(['error' => 'Erro ao criar mensagem. Por favor, tente novamente.']);
    }

    public function show($id)
    {
        $mensagem = Mensagem::findOrFail($id);
        return view('mensage', ['mensagem' => $mensagem]);
    }

    public function edit($id)
    {
        $mensagem = Mensagem::findOrFail($id);
        return view('mensagens.edit', ['mensagem' => $mensagem]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'professor_id' => 'required',
            'nome_aluno' => 'required',
            'data_envio' => 'required|date',
            'status' => 'required',
            'mensagem' => 'required',
        ]);

        $mensagem = Mensagem::findOrFail($id);
        $mensagem->update($validatedData);

        return redirect()->route('mensagens.index')->with('success', 'Mensagem atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $mensagem = Mensagem::findOrFail($id);
        $mensagem->delete();

        return redirect()->route('mensagens.index')->with('success', 'Mensagem excluída com sucesso!');
    }
}
