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
    cron \
    supervisor

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg
RUN docker-php-ext-install pdo pdo_mysql mysqli pdo_pgsql pgsql mbstring exif pcntl bcmath gd zip

# Copy supervisor conf
# COPY ./docker-compose/supervisor/horizon.conf /etc/supervisor/conf.d/horizon.conf

# Copy start entrypoint
# COPY ./docker-compose/start.sh /usr/local/bin/start

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

RUN usermod -u $uid www-data

RUN chown -R www-data:www-data /usr/local/bin/start && \
    chmod u+x /usr/local/bin/start

# Set working directory
WORKDIR /var/www

# Copy project
COPY . /var/www
RUN chown -R www-data:www-data /var/www && \
    chmod 775 /var/www/storage

CMD ["/usr/local/bin/start"]

