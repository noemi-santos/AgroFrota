# AgroFrota

Sistema de gestão para locação de equipamentos agrícolas desenvolvido em Laravel.

> ℹ️ **Nota**: Este projeto usa **migrações Laravel** para criar o banco de dados. Não é mais necessário importar o arquivo `banco.sql` manualmente.

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

### 5. Crie o banco de dados
Crie um banco chamado `agrofrota` no MySQL:

```sql
CREATE DATABASE agrofrota;
```

### 6. Execute as migrações e seeders
```bash
# Execute as migrações para criar todas as tabelas e popular com dados iniciais
php artisan migrate --seed
```

### 7. Usuários Padrão (criados pelos seeders)

#### Administrador
- Email: admin@agrofrota.com
- Senha: 123456
- Tipo: ADM

#### Locatários
1. João Silva
   - Email: joao@email.com
   - Senha: 123456
   - Tipo: CLI

2. Maria Santos
   - Email: maria@email.com
   - Senha: 123456
   - Tipo: CLI

3. Pedro Oliveira
   - Email: pedro@email.com
   - Senha: 123456
   - Tipo: CLI

> ℹ️ **Nota**: Estes usuários são criados automaticamente ao executar `php artisan db:seed` ou `php artisan migrate --seed`

### 8. Inicie o servidor
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

### Migrações
```bash
# Executar migrações pendentes
php artisan migrate

# Ver status das migrações
php artisan migrate:status

# Resetar banco e executar todas as migrações
php artisan migrate:fresh

# Reverter última migração
php artisan migrate:rollback

# Reverter todas as migrações
php artisan migrate:reset
```

### Geral
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
  > Categorias padrão (criadas pelos seeders):
  > - Tratores
  > - Colheitadeiras
  > - Plantadeiras
  > - Implementos
  > - Irrigação
  > - Pulverizadores
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

**Tabela não encontrada**: Execute as migrações
```bash
php artisan migrate
```

**Erro de foreign key**: Execute as migrações na ordem correta (já está configurado)

**Banco desatualizado**: Reset e recriar todas as tabelas
```bash
php artisan migrate:fresh
```
