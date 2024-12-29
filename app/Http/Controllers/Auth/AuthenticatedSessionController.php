<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use App\Models\User;

class AuthenticatedSessionController extends Controller
{
    public function create(): View
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request): RedirectResponse
    {
        // Validação direta com mensagens personalizadas
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.email' => 'O campo e-mail deve ser um endereço de e-mail válido.',
            'password.required' => 'O campo senha é obrigatório.',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            // Erro de usuário não encontrado, mensagem personalizada
            throw ValidationException::withMessages([
                'email' => 'Não existe cadastro com este E-mail.',
            ]);
        }

        if (!Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
            // Erro de autenticação, senha ou e-mail incorretos
            throw ValidationException::withMessages([
                'password' => 'A senha ou E-mail está incorreto.',
            ]);
        }

        // Regeneração da sessão
        $request->session()->regenerate();

        return redirect()->route('dashboard');
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
