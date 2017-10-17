
//web: $(composer config bin-dir)/heroku-php-nginx -C nginx.conf public/
web: vendor/bin/heroku-php-apache2 public/ 
worker: php artisan queue:listen --tries=10 --delay=20