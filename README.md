## About Laravel

### Чистый запуск
```
{%project_folder%}: cp ./env.example ./.env
{%project_folder%}: composer.phar install
{%project_folder%}: artisan migrate --seed
```
### Для локального запуска
```
{%project_folder%}: php artisan serve
http://127.0.0.1:8000
```

### Для подтверждения почты или ваш почтовый сервер
```
MAIL_MAILER=log
MAIL_HOST=
MAIL_PORT=
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME=laravel.blog@mail.ru
```
