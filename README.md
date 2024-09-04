
# Gerenciador Projetos Energia Solar

Esta aplicação Laravel é um sistema para gerenciar projetos e clientes. Permite a criação, edição, listagem e visualização de detalhes de projetos e clientes, além de gerenciar os equipamentos associados aos projetos.

## Requisitos

- PHP >= 8.0
- Laravel >= 11.x
- Composer
- Banco de Dados: MySQL
- Servidor Web: Apache ou Nginx






## Instalação

 git clone https://github.com/juhlio/testequalityway

```bash
  cd testequalityway
```
### Instalando as dependências  
```  
  composer install
``` 
### Configuração do ambiente
Copie o arquivo .env.example para um novo arquivo .env e configure suas variáveis de ambiente:

```
cp .env.example .env
```
Edite o arquivo ```.env``` para configurar a conexão com o banco de dados e outras configurações necessárias.

### Gerando a chave da aplicação

Gere a chave de aplicação do Laravel:
```
php artisan key:generate
```
### Executando Migrations e Seeders

Execute as migrations e seeders para configurar o banco de dados:
```
php artisan migrate --seed
```
## Estrutura
### Estrutura da Aplicação
Diretórios Principais
- app/: Contém o código da aplicação, incluindo Controllers, Models, e Services.
- resources/views/: Contém os arquivos Blade para as views da aplicação.
- routes/: Contém os arquivos de rotas.
- public/: Contém os arquivos públicos, como imagens e scripts.
- config/: Contém os arquivos de configuração da aplicação.
- database/: Contém migrations, seeders e o banco de dados SQLite (se utilizado).

### Funcionalidades
#### Gerenciamento de Projetos
- Criar Projeto: Permite adicionar novos projetos à aplicação.
- Editar Projeto: Permite modificar as informações de projetos existentes.
- Listar Projetos: Exibe uma lista de projetos com detalhes básicos.
- Visualizar Projeto: Mostra informações detalhadas sobre um projeto específico.

#### Gerenciamento de Clientes
- Adicionar Cliente: Permite criar novos clientes.
- Editar Cliente: Permite modificar as informações de clientes existentes.
- Listar Clientes: Exibe uma lista de clientes com detalhes básicos.
- Visualizar Cliente: Mostra informações detalhadas sobre um cliente específico.

#### Gerenciamento de Equipamentos
- Adicionar Equipamento: Permite adicionar equipamentos aos projetos.
- Editar Equipamento: Permite modificar os detalhes dos equipamentos associados aos projetos.

### Estrutura das Rotas

### Rotas da Web

#### Clientes

- **`GET /clientes`**: Listar todos os clientes
- **`GET /clientes/novo`**: Exibir formulário para criar um novo cliente
- **`POST /cliente/novo`**: Criar um novo cliente
- **`GET /clientes/{id}`**: Exibir detalhes de um cliente específico
- **`GET /cliente/{id}/editar`**: Exibir formulário para editar um cliente existente
- **`PUT /cliente/{id}/editar`**: Atualizar um cliente existente
- **`DELETE /cliente/{id}/delete`**: Deletar um cliente


#### Projetos
- **`GET /projetos`**: Listar todos os projetos
- **`GET /projetos/novo`**: Exibir formulário para criar um novo projeto
- **`POST /projetos/novo`**: Criar um novo projeto
- **`GET /projetos/{id}`**: Exibir detalhes de um projeto específico
- **`GET /projetos/{id}/editar`**: Exibir formulário para editar um projeto existente
- **`PUT /projetos/{id}/editar`**: Atualizar um projeto existente
- **`DELETE /projetos/{id}/delete`**: Deletar um projeto

### Rotas da API

- **` GET /clients`**: Exibe todos clientes em formato json. Usado para o autocompletar do formulário de projetos.

## Controllers

### `HomeController`

Gerencia a exibição da Home. Chamando a view principal.

- **`index`**: Chama a view com a página principal.

### `ClientController`


Gerencia as operações CRUD (Create, Read, Update, Delete) para clientes e exibe as páginas de visualização e edição.

- **`index`**: Chama a view que lista  todos os clientes.
- **`newClient`**: Chama a view que cria um novo cliente.
- **`store`**: Salva um novo cliente.
- **`getClient`**: Chama a view que exibe os detalhes de um cliente especifico.
-  **`edit`**: Chama a view com formulário de edição de clientes.
- **`update`**: Processa a alteração de um cliente.
- **`destroy`**: Exclui um cliente.
- **`getApiClients`**: Exibe os clientes em formato json.


### `ProjectsController`


Gerencia as operações CRUD (Create, Read, Update, Delete) para projetos e exibe as páginas de visualização e edição.

- **`index`**: Chama a view que lista  todos os projetos.
- **`newProject`**: Chama a view que cria um novo projeto.
- **`store`**: Salva um novo projeto.
- **`getProject`**: Chama a view que exibe os detalhes de um projeto especifico.
-  **`edit`**: Chama a view com formulário de edição de projetos.
- **`update`**: Processa a alteração de um cliprojetoente.
- **`destroy`**: Exclui um projeto.
## Autores

- [@Julio](https://www.github.com/juhlio)

