#!/bin/bash
# Perform any setup or configuration tasks here

# Start PHP-FPM
php-fpm --daemonize

service supervisor start

# Start Nginx in the foreground
nginx -g 'daemon off;'