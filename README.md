# Sistema de Controle de Contatos

Bem-vindo ao **Sistema de Controle de Contatos**! Este é um sistema simples e eficiente para gerenciar contatos de forma organizada, ideal para uso pessoal ou corporativo.

## 🔥 Funcionalidades Principais

- 📋 **Cadastro de Contatos**: Adicione informações como nome, telefone, email e observações.
- 🔍 **Busca Avançada**: Pesquise contatos por nome, email ou qualquer outro critério.
- ✏️ **Edição de Contatos**: Atualize os dados dos seus contatos facilmente.
- ❌ **Exclusão de Contatos**: Remova contatos indesejados com um clique.
- 📊 **Dashboard Resumido**: Visualize estatísticas gerais, como número total de contatos.

## 🚀 Tecnologias Utilizadas

- **Back-end**: [Laravel](https://laravel.com/).
- **Front-end**: HTML, CSS e JavaScript (puro e Bootstrap).
- **Banco de Dados**: MySQL para armazenamento seguro das informações.
- **Autenticação**: Sistema de login seguro com proteção contra acesso não autorizado.

## 📦 Estrutura do Projeto
├── app/
│   ├── Console/            # Comandos do Artisan
│   ├── Exceptions/         # Tratamento de exceções
│   ├── Http/
│   │   ├── Controllers/    # Lógica de controle (Controllers)
│   │   ├── Middleware/     # Middlewares para processamento de requisições
│   ├── Models/             # Modelos Eloquent
│   ├── Providers/          # Provedores de serviço
│
├── bootstrap/
│   ├── app.php             # Inicialização do Laravel
│   ├── cache/              # Cache do framework
│
├── config/                 # Arquivos de configuração
│   ├── app.php             # Configurações gerais
│   ├── database.php        # Configurações do banco de dados
│
├── database/
│   ├── factories/          # Fábricas para geração de dados fake
│   ├── migrations/         # Scripts para criação de tabelas
│   ├── seeders/            # Seeders para popular o banco de dados
│
├── public/                 # Pasta pública acessível via navegador
│   ├── index.php           # Arquivo de entrada principal
│   ├── assets/             # Arquivos estáticos (CSS, JS, imagens)
│
├── resources/
│   ├── views/              # Arquivos Blade (templates)
│   │   ├── layouts/        # Layouts base
│   │   ├── contacts/       # Páginas relacionadas a contatos
│   ├── js/                 # Scripts JS (se utilizado)
│   ├── css/                # Arquivos CSS (se utilizado)
│
├── routes/
│   ├── web.php             # Rotas para o frontend
│   ├── api.php             # Rotas para a API
│   ├── console.php         # Rotas para comandos Artisan
│
├── storage/
│   ├── app/                # Armazenamento de arquivos da aplicação
│   ├── framework/          # Arquivos de cache e sessões
│   ├── logs/               # Logs da aplicação
│
├── tests/                  # Testes automatizados
│   ├── Feature/            # Testes de funcionalidades
│   ├── Unit/               # Testes unitários
│
├── vendor/                 # Pacotes instalados via Composer
├── .env                    # Arquivo de variáveis de ambiente
├── artisan                 # Console CLI do Laravel
├── composer.json           # Configuração do Composer
├── README.md               # Documentação do projeto
