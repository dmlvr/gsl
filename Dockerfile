# Используйте официальный образ PHP на основе Debian
FROM php:7.4-apache

# Указываем рабочую директорию в контейнере
WORKDIR /var/www/html

# Копируем файлы из текущего каталога в контейнер
COPY . .

# Устанавливаем сервер Apache и некоторые полезные инструменты
RUN apt-get update && \
    apt-get install -y apache2 && \
    a2enmod rewrite

# Копируем файл конфигурации Apache
COPY apache-config.conf /etc/apache2/sites-available/default.conf

# Включаем сайт, если ссылка еще не создана
RUN [ ! -e /etc/apache2/sites-enabled/000-default.conf ] && ln -s /etc/apache2/sites-available/default.conf /etc/apache2/sites-enabled/000-default.conf || true

# Устанавливаем правильные разрешения
RUN chown -R www-data:www-data /var/www/html

# Проверяем конфигурацию Apache
RUN apache2ctl configtest

# Открываем порт 80 для веб-трафика
EXPOSE 80

# Запускаем Apache в фоновом режиме
CMD ["apache2ctl", "-D", "FOREGROUND"]
