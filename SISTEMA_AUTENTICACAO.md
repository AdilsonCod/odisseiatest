# 🔐 Sistema de Autenticação e Dashboard Administrativo

## 📋 Visão Geral

Sistema completo de autenticação com dashboard administrativo desenvolvido com Laravel 11 + Livewire 3.

### Funcionalidades Implementadas

✅ **Autenticação**
- Login com e-mail e senha
- Validação de credenciais
- Proteção contra acesso não autorizado
- Apenas administradores podem acessar o sistema

✅ **Dashboard Administrativo**
- Página inicial com estatísticas
- Gerenciamento de perfil do usuário
- Listagem de todos os usuários
- Busca e paginação de usuários

✅ **Segurança**
- Middleware de verificação de admin
- Proteção de rotas
- Sessões seguras
- Logout seguro

---

## 🔑 Credenciais de Acesso

### Usuário Administrador
- **E-mail**: admin@odisseia.com
- **Senha**: admin123

### Usuários de Teste
- **E-mail**: joao@example.com | **Senha**: senha123
- **E-mail**: maria@example.com | **Senha**: senha123

> ⚠️ **Nota**: Usuários não-admin não podem acessar o dashboard.

---

## 🗺️ Estrutura de Rotas

### Rotas Públicas
```
GET  /              - Página inicial (Welcome)
GET  /login         - Tela de login
POST /logout        - Logout do sistema
```

### Rotas Protegidas (Admin)
```
GET  /dashboard           - Dashboard principal
GET  /dashboard/profile   - Perfil do usuário
GET  /dashboard/users     - Lista de usuários
```

---

## 📁 Estrutura de Arquivos

### Componentes Livewire

#### Autenticação
```
app/Livewire/Auth/
└── Login.php                          # Componente de login

resources/views/livewire/auth/
└── login.blade.php                    # View do login
```

#### Dashboard
```
app/Livewire/Dashboard/
├── Index.php                          # Dashboard principal
├── Profile.php                        # Perfil do usuário
└── Users.php                          # Lista de usuários

resources/views/livewire/dashboard/
├── index.blade.php                    # View do dashboard
├── profile.blade.php                  # View do perfil
└── users.blade.php                    # View de usuários
```

### Layouts
```
resources/views/components/layouts/
├── app.blade.php                      # Layout público
├── guest.blade.php                    # Layout de autenticação
└── dashboard.blade.php                # Layout do dashboard
```

### Middleware
```
app/Http/Middleware/
└── EnsureUserIsAdmin.php              # Verifica se usuário é admin
```

### Banco de Dados
```
database/migrations/
└── 2025_11_07_205558_add_is_admin_to_users_table.php

database/seeders/
└── AdminUserSeeder.php                # Cria usuários de teste
```

---

## 🎨 Páginas do Sistema

### 1. Login (`/login`)
- Formulário de login com e-mail e senha
- Checkbox "Lembrar-me"
- Validação em tempo real
- Mensagens de erro
- Design moderno com gradiente

### 2. Dashboard (`/dashboard`)
- Cards com estatísticas:
  - Total de usuários
  - Total de administradores
  - Usuários regulares
- Tabela com 5 usuários mais recentes
- Informações: Nome, E-mail, Tipo, Data de cadastro

### 3. Perfil (`/dashboard/profile`)
- **Atualizar Informações**:
  - Nome completo
  - E-mail
- **Alterar Senha**:
  - Senha atual
  - Nova senha
  - Confirmação de senha
- Mensagens de sucesso/erro

### 4. Usuários (`/dashboard/users`)
- Barra de busca (nome ou e-mail)
- Tabela com todos os usuários
- Informações: Avatar, Nome, E-mail, Tipo, Data
- Paginação (10 por página)
- Indicador "Você" no usuário logado

---

## 🔧 Funcionalidades Detalhadas

### Login
```php
// Validações
- E-mail obrigatório e válido
- Senha obrigatória (mínimo 6 caracteres)

// Processo
1. Valida credenciais
2. Verifica se é admin
3. Se admin: redireciona para /dashboard
4. Se não-admin: faz logout e exibe erro
```

### Dashboard
```php
// Estatísticas exibidas
- Total de usuários cadastrados
- Total de administradores
- Total de usuários regulares
- 5 usuários mais recentes
```

### Perfil
```php
// Atualizar Perfil
- Nome (mínimo 3 caracteres)
- E-mail (único no sistema)

// Alterar Senha
- Verifica senha atual
- Nova senha (mínimo 6 caracteres)
- Confirmação obrigatória
```

### Usuários
```php
// Funcionalidades
- Busca por nome ou e-mail (debounce 300ms)
- Paginação automática (10 por página)
- Ordenação por data de cadastro (mais recentes primeiro)
- Badge diferenciado para admin/usuário
```

---

## 🛡️ Segurança

### Middleware `EnsureUserIsAdmin`
```php
// Verificações
1. Usuário está autenticado?
   - Não: redireciona para /login
   
2. Usuário é admin?
   - Não: faz logout e redireciona para /login
   - Sim: permite acesso
```

### Proteção de Rotas
```php
// Todas as rotas do dashboard usam:
Route::middleware(['auth', EnsureUserIsAdmin::class])
```

### Logout Seguro
```php
// Processo de logout
1. Remove autenticação
2. Invalida sessão atual
3. Regenera token CSRF
4. Redireciona para login
```

---

## 💾 Banco de Dados

### Tabela `users`
```sql
- id (bigint, primary key)
- name (string)
- email (string, unique)
- password (string, hashed)
- is_admin (boolean, default: false)  ← Novo campo
- email_verified_at (timestamp, nullable)
- remember_token (string, nullable)
- created_at (timestamp)
- updated_at (timestamp)
```

### Seeder
```bash
# Executar seeder para criar usuários de teste
php artisan db:seed --class=AdminUserSeeder
```

---

## 🚀 Como Usar

### 1. Acessar o Sistema
```
1. Abra o navegador em: http://localhost:8000
2. Clique em "Login" ou acesse: http://localhost:8000/login
3. Use as credenciais do admin
```

### 2. Navegar no Dashboard
```
- Dashboard: Visualize estatísticas gerais
- Meu Perfil: Atualize seus dados
- Usuários: Veja todos os usuários cadastrados
```

### 3. Atualizar Perfil
```
1. Acesse "Meu Perfil"
2. Altere nome ou e-mail
3. Clique em "Atualizar Perfil"
```

### 4. Alterar Senha
```
1. Acesse "Meu Perfil"
2. Role até "Alterar Senha"
3. Digite senha atual e nova senha
4. Clique em "Alterar Senha"
```

### 5. Buscar Usuários
```
1. Acesse "Usuários"
2. Digite nome ou e-mail na barra de busca
3. Resultados aparecem automaticamente
```

### 6. Fazer Logout
```
1. Clique no botão "Sair" na sidebar
2. Você será redirecionado para o login
```

---

## 🎨 Design e UI

### Cores Principais
- **Azul**: `#2563eb` (blue-600)
- **Índigo**: `#4f46e5` (indigo-600)
- **Verde**: `#10b981` (green-500)
- **Vermelho**: `#ef4444` (red-500)
- **Cinza**: `#6b7280` (gray-500)

### Componentes
- **Cards**: Bordas arredondadas, sombras suaves
- **Botões**: Gradientes, hover effects
- **Inputs**: Focus rings, transições suaves
- **Tabelas**: Hover rows, badges coloridas
- **Sidebar**: Gradiente vertical, ícones SVG

---

## 🔄 Fluxo de Autenticação

```
┌─────────────┐
│   Página    │
│   Inicial   │
└──────┬──────┘
       │
       ▼
┌─────────────┐
│    Login    │◄─── Não autenticado
└──────┬──────┘
       │
       ▼
┌─────────────┐
│  Verifica   │
│  is_admin   │
└──────┬──────┘
       │
       ├─── Sim ──────► Dashboard
       │
       └─── Não ──────► Logout + Erro
```

---

## 📝 Comandos Úteis

### Criar Novo Admin
```bash
php artisan tinker

# No tinker:
$user = User::find(ID_DO_USUARIO);
$user->is_admin = true;
$user->save();
```

### Resetar Senha de Usuário
```bash
php artisan tinker

# No tinker:
$user = User::where('email', 'email@example.com')->first();
$user->password = Hash::make('nova_senha');
$user->save();
```

### Limpar Cache de Rotas
```bash
php artisan route:clear
php artisan route:cache
```

---

## 🐛 Troubleshooting

### Erro: "Você não tem permissão"
**Solução**: Verifique se o usuário tem `is_admin = true` no banco de dados.

### Erro: "Credenciais inválidas"
**Solução**: Verifique se o e-mail e senha estão corretos.

### Página em branco após login
**Solução**: 
```bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

### Assets não carregam
**Solução**:
```bash
npm run build
```

---

## 🔐 Boas Práticas de Segurança

1. **Senhas**: Sempre use senhas fortes em produção
2. **HTTPS**: Use SSL/TLS em produção
3. **Validação**: Sempre valide dados do usuário
4. **CSRF**: Tokens CSRF estão ativados automaticamente
5. **Session**: Sessões expiram após inatividade
6. **Logout**: Sempre invalide sessões no logout

---

## 📚 Próximas Melhorias Sugeridas

- [ ] Recuperação de senha por e-mail
- [ ] Autenticação de dois fatores (2FA)
- [ ] Log de atividades do usuário
- [ ] Edição de usuários pelo admin
- [ ] Exclusão de usuários
- [ ] Permissões granulares (roles)
- [ ] Upload de foto de perfil
- [ ] Notificações em tempo real
- [ ] API REST para mobile

---

## 📞 Suporte

Para dúvidas ou problemas:
1. Consulte a documentação do Laravel: https://laravel.com/docs
2. Consulte a documentação do Livewire: https://livewire.laravel.com/docs
3. Verifique os logs em `storage/logs/laravel.log`
