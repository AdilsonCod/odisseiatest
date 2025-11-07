<div class="bg-white shadow-2xl rounded-2xl overflow-hidden">
    <!-- Header -->
    <div class="bg-gradient-to-r from-blue-600 to-indigo-600 px-6 sm:px-8 py-6 text-center">
        <h1 class="text-2xl sm:text-3xl font-bold text-white mb-2">Odisseia</h1>
        <p class="text-sm sm:text-base text-blue-100">Sistema Administrativo</p>
    </div>

    <!-- Form -->
    <div class="px-6 sm:px-8 py-6 sm:py-8">
        <form wire:submit="login" class="space-y-6">
            <!-- Mensagem de Erro -->
            @if (session()->has('error'))
                <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg text-sm">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                    E-mail
                </label>
                <input 
                    type="email" 
                    id="email" 
                    wire:model="email"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                    placeholder="admin@odisseia.com"
                    required
                >
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Senha -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                    Senha
                </label>
                <input 
                    type="password" 
                    id="password" 
                    wire:model="password"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                    placeholder="••••••••"
                    required
                >
                @error('password')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Lembrar-me -->
            <div class="flex items-center">
                <input 
                    type="checkbox" 
                    id="remember" 
                    wire:model="remember"
                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                >
                <label for="remember" class="ml-2 text-sm text-gray-700">
                    Lembrar-me
                </label>
            </div>

            <!-- Botão -->
            <button 
                type="submit"
                class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold py-3 px-4 rounded-lg hover:from-blue-700 hover:to-indigo-700 transition duration-200 shadow-lg hover:shadow-xl"
            >
                Entrar
            </button>
        </form>

        <!-- Credenciais de Teste -->
        <div class="mt-6 pt-6 border-t border-gray-200">
            <p class="text-xs text-gray-500 text-center mb-2">Credenciais de teste:</p>
            <div class="bg-gray-50 rounded-lg p-3 text-xs text-gray-600 space-y-1">
                <p><strong>Admin:</strong> admin@odisseia.com / admin123</p>
            </div>
        </div>
    </div>
</div>
