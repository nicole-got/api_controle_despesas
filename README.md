
## Banco de dados

Criar database mysql com o nome "controledespesas"

## Configurar api

Rodar comandos:<br>
    - composer install<br>
    - php artisan migrate<br>
    - php artisan key:generate<br>
    - php artisan db:seed<br>

## Crie o arquivo .env
use como exemplo o arquivo .env.example<br><br>

Atualize as variáveis:<br>
    - DB_HOST<br>
    - DB_USERNAME<br>
    - DB_PASSWORD<br>
    - MAIL_HOST<br>
    - MAIL_PORT<br>
    - MAIL_USERNAME<br>
    - MAIL_PASSWORD<br>
    - MAIL_ENCRYPTION<br>


## Inicie a api
Rode em terminais distintos:<br>
    - php artisan serve<br>
    - php artisan queue:work<br>


## Documentação

### Novo Usuário
Cadastro de usuário:

```bash
POST /api/cadastro/usuario

{
  "nome": "teste",
  "email": "teste@teste.com",
  "senha": "234"
}
```

### Autenticação
Faça uma solicitação de login para obter um token de acesso:

```bash
POST /api/login

{
  "email": "teste@teste.com",
  "password": "234"
}
```

### Despesas

- Listar todas as despesas

```bash
GET /api/despesa
```

- Cadastrar uma nova despesa
```bash
POST /api/despesa

{
  "idUsuario": 1,
  "descricao": "Despesa Teste",
  "data": "2023-07-15",
  "valor": 100.00
}
```

- Buscar dados de uma despesa
```bash
GET /api/despesa/{id}
```

- Editar uma despesa
```bash
PUT /api/despesa/{id}

{
  "idUsuario": 1,
  "descricao": "Despesa Teste",
  "data": "2023-07-15",
  "valor": 100.00
}
```

- Excluir uma despesa
```bash
DELETE /api/despesa/{id}
```
 

