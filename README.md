# Pet project

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