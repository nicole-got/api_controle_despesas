
## Banco de dados
Criar database mysql com o nome "controledespesas"

## Crie o arquivo .env
Use como exemplo o arquivo .env.example<br>

Atualize as variáveis:<br>
    - DB_HOST<br>
    - DB_USERNAME<br>
    - DB_PASSWORD<br>
    - MAIL_HOST<br>
    - MAIL_PORT<br>
    - MAIL_USERNAME<br>
    - MAIL_PASSWORD<br>
    - MAIL_ENCRYPTION<br>

## Configurar api
    composer install
    php artisan migrate
    php artisan key:generate
    php artisan db:seed


## Inicie a api
    php artisan serve

## Escute a fila para envio do email
    php artisan queue:work
    
## Teste unitário
    php artisan test
 

