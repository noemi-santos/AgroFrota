# AgroFrota

Sistema de gestão para locação de equipamentos agrícolas desenvolvido em Laravel.

## 📋 Pré-requisitos

- PHP 8.2 ou superior
- Composer
- MySQL/MariaDB
- XAMPP, WAMP ou similar (para ambiente local)

## 🚀 Configuração Inicial

### 1. Clone o repositório
```bash
git clone <url-do-repositorio>
cd AgroFrota
```

### 2. Instale as dependências
```bash
composer install
npm install
```

### 3. Configure o ambiente
```bash
# Copie o arquivo de configuração
copy .env.example .env

# Gere a chave da aplicação
php artisan key:generate
```

### 4. Configure o banco de dados
Edite o arquivo `.env` com suas credenciais MySQL:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=agrofrota
DB_USERNAME=root
DB_PASSWORD=sua_senha
```

### 5. Importe o banco de dados
- Crie um banco chamado `agrofrota` no MySQL
- Importe o arquivo `banco.sql` via phpMyAdmin, MySQL Workbench ou linha de comando:

```bash
# Via linha de comando (se disponível)
mysql -u root -p agrofrota < banco.sql
```

### 6. Execute as migrações do Laravel
```bash
php artisan migrate
```

### 7. Inicie o servidor
```bash
php artisan serve
```

Acesse: `http://localhost:8000`

## 🔄 Uso Diário

Após a configuração inicial, para rodar o projeto localmente:

```bash
# Inicie o servidor Laravel
php artisan serve

# Em outro terminal (opcional - para assets)
npm run dev
```

## 📁 Estrutura Principal

- **Controllers**: `app/Http/Controllers/` - Lógica de controle
- **Models**: `app/Models/` - Modelos de dados
- **Views**: `resources/views/` - Templates Blade
- **Routes**: `routes/web.php` - Rotas da aplicação

## 🛠️ Comandos Úteis

```bash
# Limpar cache
php artisan cache:clear
php artisan config:clear

# Ver rotas
php artisan route:list

# Acessar console interativo
php artisan tinker
```

## 📝 Funcionalidades

- ✅ Gestão de Categorias
- ✅ Gestão de Equipamentos
- ✅ Sistema de Locação
- ✅ Gestão de Usuários (Locadores/Locatários)
- ✅ Sistema de Avaliações

## 🆘 Problemas Comuns

**Erro 500**: Verifique se a `APP_KEY` foi gerada
```bash
php artisan key:generate
```

**Erro de conexão com banco**: Verifique as credenciais no `.env`

**Tabela não encontrada**: Certifique-se de que o banco foi importado corretamente
