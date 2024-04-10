# Pet project

1) Клонируем ```git clone https://github.com/shigaev/edu.platform.git```
2) Заходим в корень проекта, выполняем команду ```composer install```
3) Настраиваем пути в конфигах apache
4) Запускаем миграцию ```./vendor/bin/phinx migrate```
5) Заходим на сайт и регестрируем нового пользователя со своими данными
6) После регистрации пользователя, можно зайти в админку по адресу, который вы указывали в настройках apache в разделе #
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