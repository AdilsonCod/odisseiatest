# 📁 Estrutura do Projeto Odisseia

## 🗂️ Diretórios Principais

### `/app` - Código da Aplicação
```
app/
├── Console/              # Comandos Artisan personalizados
├── Exceptions/           # Handlers de exceções
├── Http/
│   ├── Controllers/      # Controllers tradicionais
│   ├── Middleware/       # Middlewares HTTP
│   └── Requests/         # Form Requests (validação)
├── Livewire/            # ⭐ Componentes Livewire
├── Models/              # Models Eloquent
├── Policies/            # Políticas de autorização
└── Providers/           # Service Providers
```

**Principais arquivos:**
- `app/Livewire/Welcome.php` - Componente Livewire de exemplo

---

### `/bootstrap` - Inicialização
```
bootstrap/
├── app.php              # Bootstrap da aplicação
├── cache/               # Cache de framework (requer permissão de escrita)
└── providers.php        # Registro de providers
```

---

### `/config` - Configurações
```
config/
├── app.php              # Configurações gerais da aplicação
├── auth.php             # Configurações de autenticação
├── cache.php            # Configurações de cache
├── database.php         # Configurações de banco de dados
├── livewire.php         # ⭐ Configurações do Livewire
├── mail.php             # Configurações de email
├── queue.php            # Configurações de filas
└── ...                  # Outros arquivos de configuração
```

**Arquivos importantes:**
- `config/livewire.php` - Configurações do Livewire 3

---

### `/database` - Banco de Dados
```
database/
├── factories/           # Factories para testes
├── migrations/          # Migrations do banco de dados
│   ├── 0001_01_01_000000_create_users_table.php
│   ├── 0001_01_01_000001_create_cache_table.php
│   └── 0001_01_01_000002_create_jobs_table.php
└── seeders/            # Seeders para popular o banco
    └── DatabaseSeeder.php
```

---

### `/public` - Arquivos Públicos
```
public/
├── build/              # ⭐ Assets compilados pelo Vite (gerado)
│   ├── assets/
│   │   ├── app-*.css
│   │   └── app-*.js
│   └── manifest.json
├── .htaccess           # Configurações do Apache
├── favicon.ico         # Ícone do site
├── index.php           # Ponto de entrada da aplicação
└── robots.txt          # Instruções para crawlers
```

**Importante:** Este é o único diretório acessível publicamente via web.

---

### `/resources` - Recursos Frontend
```
resources/
├── css/
│   └── app.css         # ⭐ TailwindCSS principal
├── js/
│   └── app.js          # JavaScript principal
└── views/
    ├── components/
    │   └── layouts/
    │       └── app.blade.php  # ⭐ Layout principal
    └── livewire/       # ⭐ Views dos componentes Livewire
        └── welcome.blade.php
```

**Arquivos importantes:**
- `resources/css/app.css` - Configuração do TailwindCSS 4.0
- `resources/views/components/layouts/app.blade.php` - Layout principal
- `resources/views/livewire/` - Views dos componentes Livewire

---

### `/routes` - Rotas
```
routes/
├── console.php         # Rotas de comandos Artisan
└── web.php            # ⭐ Rotas web da aplicação
```

**Arquivo principal:**
- `routes/web.php` - Define todas as rotas web

---

### `/storage` - Armazenamento
```
storage/
├── app/
│   ├── private/        # Arquivos privados
│   └── public/         # Arquivos públicos (acessíveis via storage:link)
├── framework/
│   ├── cache/          # Cache do framework
│   ├── sessions/       # Sessões
│   ├── testing/        # Arquivos de teste
│   └── views/          # Views compiladas
└── logs/              # ⭐ Logs da aplicação
    └── laravel.log
```

**Importante:** Requer permissões de escrita (755 ou 775).

---

### `/tests` - Testes
```
tests/
├── Feature/           # Testes de funcionalidades
└── Unit/             # Testes unitários
```

---

### `/vendor` - Dependências
```
vendor/               # Dependências do Composer (não versionar)
```

---

## 📄 Arquivos na Raiz

### Configuração
- `.env` - Variáveis de ambiente (não versionar)
- `.env.example` - Exemplo de configuração
- `.gitignore` - Arquivos ignorados pelo Git
- `.htaccess` - Redirecionamento para `/public`
- `composer.json` - Dependências PHP
- `composer.lock` - Lock de dependências PHP
- `package.json` - Dependências Node.js
- `package-lock.json` - Lock de dependências Node.js
- `phpunit.xml` - Configuração do PHPUnit
- `vite.config.js` - Configuração do Vite

### Documentação
- `README.md` - Documentação principal do projeto
- `DEPLOY_HOSTGATOR.md` - Guia de deploy na HostGator
- `COMANDOS_UTEIS.md` - Comandos úteis para desenvolvimento
- `ESTRUTURA_PROJETO.md` - Este arquivo

### Scripts
- `artisan` - CLI do Laravel

---

## 🎨 Fluxo de Trabalho Livewire

### 1. Criar um Componente
```bash
php artisan make:livewire MeuComponente
```

Isso cria:
- **Classe**: `app/Livewire/MeuComponente.php`
- **View**: `resources/views/livewire/meu-componente.blade.php`

### 2. Estrutura do Componente

**app/Livewire/MeuComponente.php:**
```php
<?php

namespace App\Livewire;

use Livewire\Component;

class MeuComponente extends Component
{
    // Propriedades públicas (reativas)
    public $nome = '';
    
    // Métodos (actions)
    public function salvar()
    {
        // Lógica aqui
    }
    
    // Render
    public function render()
    {
        return view('livewire.meu-componente')
            ->layout('components.layouts.app');
    }
}
```

**resources/views/livewire/meu-componente.blade.php:**
```blade
<div>
    <input type="text" wire:model="nome">
    <button wire:click="salvar">Salvar</button>
</div>
```

### 3. Usar em Rotas

**routes/web.php:**
```php
use App\Livewire\MeuComponente;

Route::get('/meu-componente', MeuComponente::class);
```

### 4. Ou Incluir em Views

```blade
<livewire:meu-componente />
```

---

## 🗄️ Fluxo de Trabalho com Banco de Dados

### 1. Criar Model com Migration
```bash
php artisan make:model Post -m
```

### 2. Editar Migration
**database/migrations/xxxx_create_posts_table.php:**
```php
Schema::create('posts', function (Blueprint $table) {
    $table->id();
    $table->string('title');
    $table->text('content');
    $table->timestamps();
});
```

### 3. Executar Migration
```bash
php artisan migrate
```

### 4. Usar no Livewire
**app/Livewire/PostList.php:**
```php
use App\Models\Post;

class PostList extends Component
{
    public function render()
    {
        return view('livewire.post-list', [
            'posts' => Post::all()
        ]);
    }
}
```

---

## 🎯 Boas Práticas

### Organização de Componentes Livewire
```
app/Livewire/
├── Auth/              # Componentes de autenticação
├── Admin/             # Componentes administrativos
├── Posts/             # Componentes relacionados a posts
│   ├── Create.php
│   ├── Edit.php
│   └── List.php
└── Welcome.php        # Componente principal
```

### Organização de Views
```
resources/views/
├── components/
│   ├── layouts/
│   │   ├── app.blade.php      # Layout principal
│   │   └── guest.blade.php    # Layout para visitantes
│   └── ui/                    # Componentes UI reutilizáveis
│       ├── button.blade.php
│       └── card.blade.php
└── livewire/
    ├── auth/
    ├── admin/
    └── posts/
```

### Organização de Models
```
app/Models/
├── User.php
├── Post.php
├── Comment.php
└── Traits/            # Traits compartilhadas
    └── HasSlug.php
```

---

## 🔧 Arquivos de Configuração Importantes

### `.env` (Desenvolvimento)
```env
APP_NAME=Odisseia
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=odisseia
DB_USERNAME=root
DB_PASSWORD=
```

### `.env` (Produção - HostGator)
```env
APP_NAME=Odisseia
APP_ENV=production
APP_DEBUG=false
APP_URL=https://seudominio.com

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=seu_banco
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```

---

## 📚 Recursos Adicionais

### Documentação Oficial
- **Laravel**: https://laravel.com/docs/11.x
- **Livewire**: https://livewire.laravel.com/docs
- **TailwindCSS**: https://tailwindcss.com/docs

### Comunidade
- **Laravel Brasil**: https://github.com/laravelbrasil
- **Discord Laravel**: https://discord.gg/laravel
- **Fórum Laravel**: https://laracasts.com/discuss

### Ferramentas Úteis
- **Laravel Debugbar**: `composer require barryvdh/laravel-debugbar --dev`
- **Laravel IDE Helper**: `composer require barryvdh/laravel-ide-helper --dev`
- **Laravel Telescope**: `composer require laravel/telescope --dev`
