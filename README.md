# Kerung

Kerung is an E-commerce Platform.

#### local

```
<VirtualHost *:80>
        DocumentRoot [your kerung local dir]/public
        ServerName kerung.dev
        DirectoryIndex index.php index.html index.htm index.shtml
</VirtualHost>
<Directory [your kerung local dir]/public>
        Options Indexes MultiViews FollowSymLinks
        AllowOverride All
        Order allow,deny
        Allow from all
        RewriteEngine On

        RewriteCond %{REQUEST_FILENAME} !-d
        RewriteCond %{REQUEST_FILENAME} !-f
        RewriteRule ^ index.php [L]
</Directory>
```


#### NOTE: make sure the business logic are built in /kerung/Service
The service object is the middleman for communicating between the Repo and the controllers, Repo will grab the data
objects, then service will work on top of the objects then pass the processed data objects to controller which then
render in view.

SETUP GUIDES
composer update
Complete Your .env file setup
php artisan migrate
php artisan db:seed





