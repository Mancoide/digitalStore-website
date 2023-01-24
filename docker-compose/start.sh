#!/usr/bin/env bash

set -e

role=${CONTAINER_ROLE:-app}
user=${DOCKER_USER}

#env=${APP_ENV:-production}
#
#if [ "$env" != "local" ]; then
#    echo "Caching configuration..."
#    (cd /var/www && php artisan config:cache && php artisan route:cache && php artisan view:cache)
#fi

composer install --no-interaction --optimize-autoloader
php artisan storage:link

if [ "$role" = "app" ]; then
    echo "App role"
    exec php-fpm -F
elif [ "$role" = "queue" ]; then
    echo "Queue role"
    exec /usr/bin/supervisord -n -c /etc/supervisor/supervisord.conf
elif [ "$role" = "scheduler" ]; then
    echo "Scheduler role"
#    crontab -u "$user" -l | { cat; echo "* * * * * /usr/local/bin/php /var/www/artisan schedule:run >> /var/www/storage/logs/cron.log 2>&1"; } | crontab -u "$user" -
    echo "* * * * * /usr/local/bin/php /var/www/artisan schedule:run >> /var/www/storage/logs/cron.log 2>&1" | crontab -u www-data -
    crontab -u www-data -l
    exec cron -f
else
    echo "Could not match the container role \"$role\""
    exit 1
fi
