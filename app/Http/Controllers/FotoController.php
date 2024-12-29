<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FotoController extends Controller
{
    // Método para exibir as fotos aprovadas
    public function fotos_aprovadas()
    {
        $fotos = Foto::where('aprovado', true)->with('user')->get();
        return view('fotos.fotos_aprovadas', compact('fotos'));
    }

    // Método para exibir o formulário de criação de fotos
    public function create()
    {
        return view('fotos.create');
    }

    // Método para armazenar uma foto no banco de dados
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'descricao' => 'required',
            'foto' => 'required|image'
        ]);

        // Salvar a foto no diretório público
        $caminho = $request->file('foto')->store('fotos', 'public');

        // Criar o registro no banco de dados
        Foto::create([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'caminho' => $caminho,
            'user_id' => Auth::id(), // Associa a foto ao usuário autenticado
        ]);

        return redirect()->route('fotos.create')->with('success', 'Foto enviada com sucesso!');
    }

    // Método para alternar a aprovação de uma foto
    public function alternarAprovacao(Foto $foto)
    {
        $foto->update(['aprovado' => !$foto->aprovado]);
        return redirect()->route('fotos.avaliar');
    }

    // Método para exibir a página de avaliação de fotos
    public function avaliar()
    {
        $fotos = Foto::with('user')->get();
        return view('fotos.avaliar', compact('fotos'));
    }

    // Método para exibir o dashboard com as fotos aprovadas
    public function dashboard()
    {
        $fotos = Foto::where('aprovado', true)->with('user')->get();
        return view('dashboard', compact('fotos'));
    }

    // Método para excluir uma foto
    public function destroy(Foto $foto)
    {
        $foto->delete();
        return redirect()->route('fotos.avaliar');
    }
}
