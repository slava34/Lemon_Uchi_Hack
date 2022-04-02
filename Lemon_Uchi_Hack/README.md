Реализованная функциональность для учителя
•	Создание/редактрование пакета вопросов
•	Создание/редактирование вопросов с временем и сложностью
•	Добавление ответов
Реализованная функциональность для ученика
•	Создание игрового поля
•	Игровая механика( сделана частично)
Основной стек технологий:
•	Vue
•	PHP Laravel
•	Postgres

Скринкаст доступен по адресу: https://disk.yandex.ru/d/VNdfF9N7vWqDmg
Ссылка на презентацию: https://disk.yandex.ru/d/VNdfF9N7vWqDmg

НЕОБХОДИМЫЕ УСЛОВИЯ ДЛЯ РАБОТЫ ПРИЛОЖЕНИЯ
1.	развертывание сервиса производится на ubuntu 20.04;
2.	требуется установленный docker;	
УСТАНОВКА, НАСТРОЙКА
git clone https://github.com/maxpatro1/Lemon_Uchi_Hack.git
cd Lemon_Uchi_Hack
cp .env оставлю в конце Readme
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php80-composer:latest \
    composer install --ignore-platform-reqs
vendor/bin/sail up -d

Для заполнения базы данных системной информацией выполните в корневой папке сервиса:
vendor/bin/sail artisan migrate
Установка зависимостей проекта
Нужна node > 12
npm i 



.env = 
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:rspHDtiY1Er43Gk2XsbmbCYZnQdwOFkylta7FIQ0jk4=
APP_DEBUG=true
APP_URL=http://example-app.test

LOG_CHANNEL=stack
LOG_LEVEL=debug

DB_CONNECTION=pgsql
DB_HOST=pgsql
DB_PORT=5432
DB_DATABASE=example_app
DB_USERNAME=sail
DB_PASSWORD=password

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DRIVER=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=memcached

REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"


    
