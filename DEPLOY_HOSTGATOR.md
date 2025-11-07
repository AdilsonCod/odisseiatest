# 🚀 Guia de Deploy na HostGator

## 📋 Pré-requisitos

Antes de fazer o deploy, certifique-se de que:
- Você tem acesso ao cPanel da HostGator
- Seu plano suporta PHP 8.2 ou superior
- Você tem acesso SSH (recomendado) ou File Manager

## 🔧 Preparação Local

### 1. Build dos Assets
Execute localmente antes de fazer upload:

```bash
npm run build
```

Isso irá gerar os arquivos otimizados em `public/build/`.

### 2. Otimizar o Autoloader
```bash
composer install --optimize-autoloader --no-dev
```

### 3. Configurar Cache (opcional, mas recomendado)
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## 📤 Upload dos Arquivos

### Opção 1: Via FTP/File Manager

1. **Faça upload de todos os arquivos** para o diretório raiz da sua conta (geralmente `public_html` ou `www`)

2. **Estrutura de diretórios na HostGator:**
   ```
   public_html/
   ├── app/
   ├── bootstrap/
   ├── config/
   ├── database/
   ├── public/
   ├── resources/
   ├── routes/
   ├── storage/
   ├── vendor/
   ├── .htaccess (arquivo raiz para redirecionar para public/)
   ├── artisan
   ├── composer.json
   └── ...outros arquivos
   ```

### Opção 2: Via SSH (Recomendado)

```bash
# Conectar via SSH
ssh usuario@seudominio.com

# Navegar para o diretório
cd public_html

# Clonar o repositório (se estiver usando Git)
git clone seu-repositorio.git .

# Instalar dependências
composer install --optimize-autoloader --no-dev

# Build dos assets
npm install
npm run build
```

## ⚙️ Configuração no Servidor

### 1. Configurar o arquivo .env

Crie ou edite o arquivo `.env` no servidor com as configurações de produção:

```env
APP_NAME=Odisseia
APP_ENV=production
APP_KEY=base64:SUA_CHAVE_AQUI
APP_DEBUG=false
APP_URL=https://seudominio.com

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=seu_banco_de_dados
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha

# Outras configurações...
```

**IMPORTANTE:** Se você não tem uma APP_KEY, gere uma com:
```bash
php artisan key:generate
```

### 2. Criar o Banco de Dados

1. Acesse o **cPanel**
2. Vá em **MySQL Databases**
3. Crie um novo banco de dados
4. Crie um usuário e associe ao banco
5. Anote as credenciais para usar no `.env`

### 3. Executar as Migrations

Via SSH:
```bash
php artisan migrate --force
```

Ou via terminal do cPanel (se disponível).

### 4. Configurar Permissões

```bash
chmod -R 755 storage
chmod -R 755 bootstrap/cache
```

Ou via File Manager:
- Clique com botão direito nas pastas `storage` e `bootstrap/cache`
- Selecione "Change Permissions"
- Configure para 755

### 5. Configurar o .htaccess Raiz

O arquivo `.htaccess` na raiz já está configurado para redirecionar para a pasta `public/`:

```apache
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteRule ^(.*)$ public/$1 [L]
</IfModule>
```

### 6. Verificar a Versão do PHP

No cPanel:
1. Vá em **Select PHP Version** ou **MultiPHP Manager**
2. Selecione **PHP 8.2** ou superior
3. Ative as extensões necessárias:
   - mbstring
   - openssl
   - pdo
   - pdo_mysql
   - tokenizer
   - xml
   - ctype
   - json
   - bcmath

## 🔒 Segurança

### 1. Proteger o arquivo .env
Certifique-se de que o `.env` não está acessível publicamente. O `.htaccess` do Laravel já faz isso, mas verifique.

### 2. Desabilitar Debug em Produção
No `.env`:
```env
APP_DEBUG=false
```

### 3. Usar HTTPS
Configure um certificado SSL no cPanel (Let's Encrypt é gratuito).

## 🧪 Testes Pós-Deploy

1. Acesse seu domínio: `https://seudominio.com`
2. Verifique se a página inicial carrega corretamente
3. Teste os componentes Livewire
4. Verifique os logs em `storage/logs/laravel.log` se houver erros

## 🔄 Atualizações Futuras

Para atualizar o site:

```bash
# Via SSH
cd public_html
git pull origin main
composer install --optimize-autoloader --no-dev
php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache
npm run build
```

## 🆘 Troubleshooting

### Erro 500
- Verifique as permissões de `storage` e `bootstrap/cache`
- Verifique o arquivo `.env`
- Verifique os logs em `storage/logs/laravel.log`

### Assets não carregam
- Verifique se executou `npm run build`
- Verifique o `APP_URL` no `.env`
- Limpe o cache: `php artisan cache:clear`

### Banco de dados não conecta
- Verifique as credenciais no `.env`
- Verifique se o usuário tem permissões no banco
- Use `localhost` como DB_HOST (não 127.0.0.1)

## 📞 Suporte

Se precisar de ajuda:
- Documentação Laravel: https://laravel.com/docs
- Documentação Livewire: https://livewire.laravel.com/docs
- Suporte HostGator: https://www.hostgator.com.br/suporte
