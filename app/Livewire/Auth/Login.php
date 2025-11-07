<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Auth;

#[Layout('components.layouts.guest')]
#[Title('Login - Odisseia')]
class Login extends Component
{
    public string $email = '';
    public string $password = '';
    public bool $remember = false;

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ], [
            'email.required' => 'O e-mail é obrigatório.',
            'email.email' => 'Digite um e-mail válido.',
            'password.required' => 'A senha é obrigatória.',
            'password.min' => 'A senha deve ter no mínimo 6 caracteres.',
        ]);

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            session()->regenerate();
            
            // Verificar se é admin
            if (Auth::user()->isAdmin()) {
                return redirect()->intended('/dashboard');
            }
            
            // Usuários não-admin não podem acessar
            Auth::logout();
            session()->flash('error', 'Você não tem permissão para acessar o sistema.');
            return;
        }

        session()->flash('error', 'Credenciais inválidas.');
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
