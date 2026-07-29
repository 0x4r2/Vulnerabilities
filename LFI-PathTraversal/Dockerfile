FROM ubuntu:22.04

ENV DEBIAN_FRONTEND=noninteractive

RUN apt-get update && apt-get install -y \
        apache2 \
        php \
        libapache2-mod-php \
        curl \
        ca-certificates \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

RUN PHP_INI=$(find /etc/php -name php.ini -path '*apache2*') \
    && echo "log_errors = On" >> "$PHP_INI" \
    && echo "error_log = /var/log/apache2/php_errors.log" >> "$PHP_INI" \
    && touch /var/log/apache2/php_errors.log \
    && chown www-data:www-data /var/log/apache2/php_errors.log

RUN rm -f /var/www/html/index.html

COPY src/ /var/www/html/

RUN mkdir -p /var/www/html/images \
    && for i in $(seq 1 10); do \
        curl -sSL "https://picsum.photos/seed/novashop-item-$i/800/600" \
             -o "/var/www/html/images/product$i.jpg" || true; \
    done

RUN mkdir -p /var/backups
COPY secrets/db_backup.sql /var/backups/db_backup.sql

RUN chown -R www-data:www-data /var/www/html

EXPOSE 80

CMD ["apache2ctl", "-D", "FOREGROUND"]
