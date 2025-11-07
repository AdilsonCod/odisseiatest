# 📝 Comandos Úteis - Odisseia

## 🚀 Iniciar o Projeto

### Servidor de Desenvolvimento
```bash
# Iniciar servidor Laravel
php artisan serve

# Iniciar Vite (hot reload) - em outro terminal
npm run dev
```

### XAMPP
1. Abrir XAMPP Control Panel
2. Iniciar Apache
3. Iniciar MySQL
4. Acessar: `http://localhost/odisseia/public`

## 🎨 Livewire

### Criar Componentes
```bash
# Componente básico
php artisan make:livewire NomeDoComponente

# Componente em subpasta
php artisan make:livewire Pasta/NomeDoComponente

# Componente inline (sem view separada)
php artisan make:livewire NomeDoComponente --inline

# Componente com teste
php artisan make:livewire NomeDoComponente --test
```

### Listar Componentes
```bash
php artisan livewire:list
```

### Publicar Assets
```bash
# Publicar configuração
php artisan livewire:publish --config

# Publicar assets
php artisan livewire:publish --assets
```

## 🗄️ Banco de Dados

### Migrations
```bash
# Criar migration
php artisan make:migration create_nome_table

# Executar migrations
php artisan migrate

# Executar migrations em produção
php artisan migrate --force

# Reverter última migration
php artisan migrate:rollback

# Reverter todas migrations
php artisan migrate:reset

# Recriar banco (apaga tudo e recria)
php artisan migrate:fresh

# Recriar banco com seeders
php artisan migrate:fresh --seed
```

### Seeders
```bash
# Criar seeder
php artisan make:seeder NomeSeeder

# Executar seeders
php artisan db:seed

# Executar seeder específico
php artisan db:seed --class=NomeSeeder
```

### Models
```bash
# Criar model
php artisan make:model NomeDoModel

# Criar model com migration
php artisan make:model NomeDoModel -m

# Criar model com migration, factory e seeder
php artisan make:model NomeDoModel -mfs

# Criar model com tudo
php artisan make:model NomeDoModel -a
```

## 🎯 Controllers

```bash
# Controller básico
php artisan make:controller NomeController

# Resource controller (CRUD completo)
php artisan make:controller NomeController --resource

# API controller
php artisan make:controller NomeController --api

# Controller com model
php artisan make:controller NomeController --model=NomeDoModel
```

## 🔐 Autenticação

```bash
# Instalar Laravel Breeze (recomendado para Livewire)
composer require laravel/breeze --dev
php artisan breeze:install livewire
npm install && npm run build
php artisan migrate

# Instalar Laravel Jetstream (alternativa com mais recursos)
composer require laravel/jetstream
php artisan jetstream:install livewire
npm install && npm run build
php artisan migrate
```

## 🧹 Cache

### Limpar Cache
```bash
# Limpar cache de aplicação
php artisan cache:clear

# Limpar cache de configuração
php artisan config:clear

# Limpar cache de rotas
php artisan route:clear

# Limpar cache de views
php artisan view:clear

# Limpar todos os caches
php artisan optimize:clear
```

### Criar Cache (Produção)
```bash
# Cache de configuração
php artisan config:cache

# Cache de rotas
php artisan route:cache

# Cache de views
php artisan view:cache

# Cache de eventos
php artisan event:cache

# Otimizar tudo
php artisan optimize
```

## 📦 Assets (Vite)

```bash
# Desenvolvimento (hot reload)
npm run dev

# Build para produção
npm run build

# Preview do build
npm run preview
```

## 🔍 Informações do Sistema

```bash
# Listar rotas
php artisan route:list

# Listar rotas de um componente específico
php artisan route:list --name=nome

# Informações sobre o ambiente
php artisan about

# Versão do Laravel
php artisan --version

# Listar comandos disponíveis
php artisan list

# Ajuda sobre um comando
php artisan help nome-do-comando
```

## 🧪 Testes

```bash
# Criar teste
php artisan make:test NomeDoTest

# Criar teste unitário
php artisan make:test NomeDoTest --unit

# Executar testes
php artisan test

# Executar testes com cobertura
php artisan test --coverage
```

## 🔧 Manutenção

### Modo de Manutenção
```bash
# Ativar modo de manutenção
php artisan down

# Ativar com mensagem personalizada
php artisan down --message="Em manutenção, voltamos em breve!"

# Ativar com secret (permite acesso via URL)
php artisan down --secret="token-secreto"

# Desativar modo de manutenção
php artisan up
```

### Storage
```bash
# Criar link simbólico para storage/app/public
php artisan storage:link

# Limpar arquivos antigos de storage
php artisan storage:clean
```

## 📊 Queue (Filas)

```bash
# Criar job
php artisan make:job NomeDoJob

# Processar filas
php artisan queue:work

# Processar uma fila específica
php artisan queue:work --queue=nome-da-fila

# Processar apenas um job
php artisan queue:work --once

# Limpar jobs falhados
php artisan queue:flush

# Reiniciar workers
php artisan queue:restart
```

## 🛠️ Composer

```bash
# Instalar dependências
composer install

# Instalar dependências de produção
composer install --no-dev --optimize-autoloader

# Atualizar dependências
composer update

# Adicionar pacote
composer require vendor/package

# Remover pacote
composer remove vendor/package

# Recarregar autoload
composer dump-autoload
```

## 📦 NPM

```bash
# Instalar dependências
npm install

# Instalar dependência
npm install package-name

# Instalar dependência de desenvolvimento
npm install package-name --save-dev

# Remover dependência
npm uninstall package-name

# Atualizar dependências
npm update

# Limpar cache
npm cache clean --force
```

## 🐛 Debug

```bash
# Tinker (console interativo)
php artisan tinker

# Ver logs em tempo real
php artisan pail

# Limpar logs
# (manualmente em storage/logs/)
```

## 🔐 Segurança

```bash
# Gerar nova chave de aplicação
php artisan key:generate

# Gerar secret para API
php artisan passport:keys
```

## 📝 Outros Comandos Úteis

```bash
# Criar middleware
php artisan make:middleware NomeDoMiddleware

# Criar request (validação)
php artisan make:request NomeDoRequest

# Criar factory
php artisan make:factory NomeFactory

# Criar policy
php artisan make:policy NomePolicy

# Criar event
php artisan make:event NomeDoEvent

# Criar listener
php artisan make:listener NomeDoListener

# Criar mail
php artisan make:mail NomeDaMail

# Criar notification
php artisan make:notification NomeDaNotification

# Criar command
php artisan make:command NomeDoCommand
```

## 🌐 Servidor de Produção

```bash
# Otimizar para produção
composer install --optimize-autoloader --no-dev
php artisan config:cache
php artisan route:cache
php artisan view:cache
npm run build

# Permissões (Linux/Mac)
chmod -R 755 storage
chmod -R 755 bootstrap/cache

# Permissões (Windows/XAMPP)
# Configurar via File Manager ou propriedades da pasta
```

## 📚 Links Úteis

- **Laravel Docs**: https://laravel.com/docs
- **Livewire Docs**: https://livewire.laravel.com/docs
- **TailwindCSS**: https://tailwindcss.com/docs
- **Laravel News**: https://laravel-news.com
- **Laracasts**: https://laracasts.com
