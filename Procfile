release: php artisan migrate --force && php artisan passport:install
web: vendor/bin/heroku-php-apache2 public/
worker: php artisan queue:listen --tries=3 --timeout=840