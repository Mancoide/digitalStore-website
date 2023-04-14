FROM php:8.1-fpm

# Arguments defined in docker-compose.yml
ARG user
ARG uid
ARG ugroup
ARG gid

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    zip \
    unzip \
    libpq-dev \
    libmagickwand-dev \
    cron \
    supervisor \
    libaio1 \
    libaio-dev

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg
RUN docker-php-ext-install pdo pdo_mysql mysqli pdo_pgsql pgsql mbstring exif pcntl bcmath gd zip intl

RUN printf "\n" | pecl install imagick
RUN docker-php-ext-enable imagick

# Install redis extension
RUN pecl install -o -f redis \
          &&  rm -rf /tmp/pear \
          &&  docker-php-ext-enable redis

# Instalar las dependencias de Node.js
RUN curl -sL https://deb.nodesource.com/setup_18.x | bash -
RUN apt-get install nodejs

# Copy supervisor conf
# COPY ./docker-compose/supervisor/horizon.conf /etc/supervisor/conf.d/horizon.conf

# Copy start entrypoint
COPY ./docker-compose/start.sh /usr/local/bin/start

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Create system user to run Composer and Artisan Commands
#RUN useradd -G www-data,root -u $uid -d /home/$user $user

#RUN usermod -u $uid $user

#RUN groupmod -g $gid $ugroup

#RUN mkdir -p /home/$user/.composer && \
#    chown -R $user:$user /home/$user && \
#    chown -R $user:$user /usr/local/bin/start && \
#    chmod u+x /usr/local/bin/start

# RUN usermod -u $uid www-data
# RUN groupmod -g $gid www-data

RUN chown -R www-data:www-data /usr/local/bin/start && \
    chmod u+x /usr/local/bin/start

# Set working directory
WORKDIR /var/www/digitalStore-website

# Copy project
COPY . /var/www/digitalStore-website
RUN chown -R www-data:www-data /var/www/digitalStore-website && \
    chmod 775 /var/www/digitalStore-website/storage

# Use the default production configuration
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

# Copy custom php ini configs
COPY ./docker-compose/php/custom.ini "$PHP_INI_DIR/conf.d/custom.ini"

CMD ["/usr/local/bin/start"]
