# Pet project

Для работы проекта потребуется:

-   Минимум PHP 8.1
-   MySQL 5.7 - 8.2.0

1. Клонируем `git clone https://github.com/shigaev/edu.platform.git`
2. Заходим в корень проекта, выполняем команду `composer install`
3. Настраиваем пути в конфигах apache
4. Создаём базу данных под названием `edu_platform`  
   Если выхотите другое название базы, измените настройки в файле `phinx.php` в разделе `development`
    ```php
    'development' => [
         'adapter' => 'mysql',
         'host' => 'localhost',
         'name' => 'edu_platform',
         'user' => 'root',
         'pass' => '',
         'port' => '3306',
         'charset' => 'utf8',
     ],
    ```
5. Запускаем миграцию `./vendor/bin/phinx migrate`
6. Если работаете под Windows не забудьте добавить доменное имя сайта и админки в файл `hosts` по адресу  
   `C:\Windows\System32\drivers\etc`  
   Пример:
    ```
    127.0.0.1 edu.platform
    127.0.0.1 edu.platform.admin
    ```
7. Заходим на сайт и регистрируем нового пользователя
8. После регистрации пользователя, можно зайти в админку по адресу, который вы указывали в настройках apache в разделе #
   BACKEND ServerName:

## Apache config

```apacheconf
# EDU.PLATFORM
# -------------------------------------------------------------------------------
# FRONTEND
<VirtualHost *:80>
	ServerName edu.platform
	DocumentRoot "path/to/frontend/public"
	<Directory  "path/to/frontend/public/">
		Options -Indexes +Includes +FollowSymLinks +MultiViews
        RewriteEngine on
        RewriteCond %{REQUEST_FILENAME} !-f
        RewriteCond %{REQUEST_FILENAME} !-d
        RewriteRule ^(.*)$ ./index.php?r=$1 [QSA,L]
        DirectoryIndex index.php
		AllowOverride None
		Require local
	</Directory>
</VirtualHost>

# BACKEND
<VirtualHost *:80>
	ServerName edu.platform.admin
	DocumentRoot "path/to/backend/public"
	<Directory  "path/to/backend/public/">
		Options -Indexes +Includes +FollowSymLinks +MultiViews
        RewriteEngine on
        RewriteCond %{REQUEST_FILENAME} !-f
        RewriteCond %{REQUEST_FILENAME} !-d
        RewriteRule ^(.*)$ ./index.php?r=$1 [QSA,L]
        DirectoryIndex index.php
		AllowOverride None
		Require local
	</Directory>
</VirtualHost>
```
