Панель администратора

```
git clone

curl -sS https://getcomposer.org/installer | php

php composer.phar install

cp .env.example .env

chmod -R 777 storage bootstrap/cache

php artisan key:generate

Настроить DB_ константы в .env для админки

Указать API_URL в том формате, в котором он указан в примере

Указать ADMIN_API_TOKEN для пользователя администратора

php artisan migrate
```

Если будут проблемы с кешированием, можно позапускать команды

```
php artisan cache:clear
php artisan route:cache
php artisan config:clear
php artisan view:clear
```