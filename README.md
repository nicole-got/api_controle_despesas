
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
Rode em terminais distintos:
    - php artisan serve<br>
    - php artisan queue:work<br>
 

