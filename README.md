# 🚀 Odisseia - Laravel 11 + Livewire 3

Projeto web moderno desenvolvido com Laravel 11, Livewire 3 e MySQL, pronto para desenvolvimento local com XAMPP e deploy na HostGator.

## 📋 Stack Tecnológica

- **PHP**: 8.2+
- **Framework**: Laravel 11
- **Frontend Dinâmico**: Livewire 3.6.4
- **Banco de Dados**: MySQL 8.0
- **Servidor Local**: XAMPP (Apache + MySQL)
- **CSS Framework**: TailwindCSS 4.0
- **Build Tool**: Vite 7.0
- **Gerenciador de Dependências**: Composer 2.8+
- **Gerenciador de Pacotes**: npm 10.9+

## ✅ Ambiente Configurado

O projeto já está totalmente configurado com:

- ✅ Laravel 11 instalado e configurado
- ✅ Livewire 3 integrado
- ✅ MySQL configurado via XAMPP
- ✅ TailwindCSS 4.0 configurado
- ✅ Componente de exemplo criado
- ✅ Layout responsivo implementado
- ✅ Estrutura preparada para HostGator

## 🚀 Instalação e Configuração

### Pré-requisitos

- XAMPP instalado com PHP 8.2+
- Composer instalado globalmente
- Node.js 18+ e npm instalados

### Configuração do Ambiente Local

1. **Clone o repositório** (se aplicável):
```bash
git clone seu-repositorio.git
cd odisseia
```

2. **Instale as dependências do PHP**:
```bash
composer install
```

3. **Instale as dependências do Node.js**:
```bash
npm install
```

4. **Configure o arquivo .env**:
```bash
cp .env.example .env
php artisan key:generate
```

Edite o `.env` com suas configurações:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=odisseia
DB_USERNAME=root
DB_PASSWORD=
```

5. **Crie o banco de dados**:
```bash
# Via MySQL do XAMPP
mysql -u root -e "CREATE DATABASE odisseia CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
```

6. **Execute as migrations**:
```bash
php artisan migrate
```

7. **Compile os assets**:
```bash
npm run dev
```

## 🖥️ Executando o Projeto

### Desenvolvimento Local

1. **Inicie o servidor Apache e MySQL** no XAMPP Control Panel

2. **Inicie o servidor de desenvolvimento do Laravel**:
```bash
php artisan serve
```

3. **Em outro terminal, inicie o Vite** (para hot reload):
```bash
npm run dev
```

4. **Acesse o projeto**:
   - URL: `http://localhost:8000`
   - Ou via XAMPP: `http://localhost/odisseia/public`

## 📦 Comandos Úteis

### Laravel

```bash
# Criar um novo componente Livewire
php artisan make:livewire NomeDoComponente

# Criar um novo model com migration
php artisan make:model NomeDoModel -m

# Criar um controller
php artisan make:controller NomeController

# Limpar cache
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Listar rotas
php artisan route:list
```

### Livewire

```bash
# Criar componente Livewire
php artisan make:livewire ComponentName

# Criar componente inline (sem arquivo de view separado)
php artisan make:livewire ComponentName --inline

# Publicar configurações do Livewire
php artisan livewire:publish --config
```

### Build

```bash
# Desenvolvimento (com hot reload)
npm run dev

# Produção (otimizado)
npm run build
```

## 🌐 Deploy na HostGator

Consulte o arquivo **[DEPLOY_HOSTGATOR.md](DEPLOY_HOSTGATOR.md)** para instruções detalhadas de como fazer o deploy do projeto na HostGator.

### Resumo Rápido:

1. Execute `npm run build` localmente
2. Faça upload de todos os arquivos via FTP/SSH
3. Configure o `.env` com credenciais de produção
4. Crie o banco de dados no cPanel
5. Execute `php artisan migrate --force`
6. Configure permissões de `storage` e `bootstrap/cache`
7. Selecione PHP 8.2+ no cPanel

## 📁 Estrutura do Projeto

```
odisseia/
├── app/
│   ├── Http/
│   ├── Livewire/          # Componentes Livewire
│   └── Models/
├── config/
│   └── livewire.php       # Configurações do Livewire
├── database/
│   ├── migrations/
│   └── seeders/
├── public/
│   ├── build/             # Assets compilados (gerado)
│   └── index.php
├── resources/
│   ├── css/
│   │   └── app.css        # TailwindCSS
│   ├── js/
│   │   └── app.js
│   └── views/
│       ├── components/
│       │   └── layouts/
│       │       └── app.blade.php  # Layout principal
│       └── livewire/      # Views dos componentes Livewire
├── routes/
│   └── web.php            # Rotas web
├── .env                   # Configurações do ambiente
├── .htaccess              # Redirecionamento para public/
├── composer.json          # Dependências PHP
├── package.json           # Dependências Node.js
└── vite.config.js         # Configuração do Vite
```

## 🎨 Componentes Livewire

### Criando um Novo Componente

```bash
php artisan make:livewire Counter
```

Isso cria:
- `app/Livewire/Counter.php` (Classe do componente)
- `resources/views/livewire/counter.blade.php` (View)

### Exemplo de Componente:

**app/Livewire/Counter.php**:
```php
<?php

namespace App\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $count = 0;

    public function increment()
    {
        $this->count++;
    }

    public function render()
    {
        return view('livewire.counter')
            ->layout('components.layouts.app');
    }
}
```

**resources/views/livewire/counter.blade.php**:
```blade
<div>
    <h1>{{ $count }}</h1>
    <button wire:click="increment">+</button>
</div>
```

### Usando em Rotas:

```php
Route::get('/counter', Counter::class);
```

## 🔧 Configurações Importantes

### TailwindCSS

O TailwindCSS 4.0 está configurado em `resources/css/app.css` com auto-discovery de classes.

### Livewire

Configurações em `config/livewire.php`:
- Layout padrão
- Diretórios de componentes
- Assets

## 🐛 Troubleshooting

### Erro: "Class 'Livewire\Component' not found"
```bash
composer dump-autoload
```

### Assets não carregam
```bash
npm run build
php artisan cache:clear
```

### Erro de permissão no storage
```bash
chmod -R 755 storage
chmod -R 755 bootstrap/cache
```

## 📚 Documentação

- [Laravel 11](https://laravel.com/docs/11.x)
- [Livewire 3](https://livewire.laravel.com/docs)
- [TailwindCSS](https://tailwindcss.com/docs)
- [Vite](https://vitejs.dev/)

## 📝 Licença

Este projeto é open-source e está disponível sob a [MIT license](https://opensource.org/licenses/MIT).

## 👨‍💻 Desenvolvimento

Desenvolvido com ❤️ usando Laravel 11 + Livewire 3
