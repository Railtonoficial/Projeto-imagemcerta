<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FotoController extends Controller
{

    public function fotos_aprovadas()
    {
        $fotos = Foto::where('aprovado', true)->with('user')->get();
        return view('fotos.fotos_aprovadas', compact('fotos'));
    }


    public function create()
    {
        return view('fotos.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'descricao' => 'required',
            'foto' => 'required|image|mimes:jpeg,png' ]);


        $caminho = $request->file('foto')->store('fotos', 'public');


        Foto::create([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'caminho' => $caminho,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('fotos.create')->with('success', 'Foto enviada com sucesso!');
    }


    public function alternarAprovacao(Foto $foto)
    {
        $foto->update(['aprovado' => !$foto->aprovado]);
        return redirect()->route('fotos.avaliar');
    }   


    public function avaliar()
    {
        $fotos = Foto::with('user')->get();
        return view('fotos.avaliar', compact('fotos'));
    }


    public function dashboard()
    {
        $fotos = Foto::where('aprovado', true)->with('user')->get();
        return view('dashboard', compact('fotos'));
    }


    public function destroy(Foto $foto)
    {
        $foto->delete();
        return redirect()->route('fotos.avaliar');
    }
}
