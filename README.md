# Projeto de Gestão de Projectos - Laravel

**Versão:** v1.0  
**Autores:** Beatriz Guerra e Tayara Cruz  
**Formador:** Vitor Custódio  
**Data:** Dezembro, 2024  
**UFCD:** 5420 - Integração de sistemas de informação - conceitos  
**Instituição:** ATEC

---
## Descrição do Projeto

Este é um projeto desenvolvido para demonstrar habilidades básicas no framework Laravel, com a implementação de um CRUD completo, migrações de banco de dados, relacionamentos entre tabelas, paginação, busca e interface de utilziador estilizada com o Bootstrap.

## Funcionalidades

- **CRUD** (Create, Read, Update, Delete) para gerenciar projectos.
- **Migrações de Banco de Dados** para criar e gerenciar as tabelas.
- **Relacionamento 1:N** entre `User` e `Projectos` | `Projectos` e `Tasks` .
- **Relacionamento N:N** entre `Tasks` e `Tags`.
- **Paginação** para exibir as projectos de forma organizada e com navegação entre páginas.
- **Busca** para filtrar projectos pelo nome.
- **Interface com Bootstrap** para uma experiência de utilizador responsiva e agradável.

## Tecnologias Usadas

- **Laravel** — Framework PHP para desenvolvimento web.
- **PHP** — Linguagem de programação usada para o desenvolvimento backend.
- **Bootstrap** — Framework CSS utilizado para estilizar a interface e tornar o design responsivo.
- **MySQL** — Banco de dados relacional usado para armazenar os dados do aplicativo.
- **XAMPP** — Ambiente de desenvolvimento local que inclui Apache, MySQL e PHP para facilitar o desenvolvimento e testes locais.

## Instalação

Siga os passos abaixo para instalar e configurar o projeto:

1. **Clone o repositório -  HTTPS**:
    ```bash
    git clone https://github.com/b-guerra97/GestorTarefas.git
    ```
    1. **Clone o repositório -  SSH**:
    ```bash
    git clone https://discordapp.com/channels/@me/1204825258972942356/1318631645200257034
    ```

2. **Instale as dependências do Composer**:
   Navegue até o diretório do projeto e execute:
    ```bash
    composer install
    ```

3. **Crie o arquivo `.env`**:
   Copie o arquivo `.env.example` para `.env`:
    ```bash
    cp .env.example .env
    ```

4. **Configure o Banco de Dados**:
   Abra o arquivo `.env` e configure as credenciais do seu banco de dados:

    ```dotenv
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306 
    DB_DATABASE=nome_do_banco
    DB_USERNAME=seu_usuario
    DB_PASSWORD=sua_senha
    ```

5. **Gere a chave de aplicação do Laravel**:
   Execute o comando:
    ```bash
    php artisan key:generate
    ```

6. **Rodando as Migrações**:
   Execute o comando para criar as tabelas no banco de dados:
    ```bash
    php artisan migrate
    ```

7. **Inicie o servidor local**:
   Após a instalação, você pode rodar o servidor local do Laravel:
    ```bash
    php artisan serve
    ```

   Agora, você pode acessar o aplicativo no navegador em [http://127.0.0.1:8000](http://127.0.0.1:8000).

## Imagens do Projeto

### Marcas.Index
![Marcas.Index](public/)

### Produtos.Index
![Marcas.Index](public/)
