FROM php:8.3-apache

# 必要なパッケージをインストール
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    vim \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install mysqli pdo pdo_mysql

RUN apt-get install -y git
RUN apt-get install -y unzip

# Node.jsとnpmのインストール
RUN curl -fsSL https://deb.nodesource.com/setup_lts.x | bash - \
    && apt-get install -y nodejs

# phpコマンドのバージョン確認
RUN php -v

# Composerのインストール
RUN curl -sS https://getcomposer.org/installer -o composer-setup.php \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && rm composer-setup.php

# npmのバージョンアップデート
RUN npm install -g npm

# .htaccessを有効にするために、Apacheのデフォルトの設定ファイルを修正
RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# Apacheの設定
COPY ./apache-config/localhost.conf /etc/apache2/sites-available/localhost.conf
RUN a2ensite localhost.conf && a2enmod rewrite

# ソースコードのコピー
#COPY . /var/www

# 作業ディレクトリの設定
WORKDIR /var/www

# パーミッションの設定
RUN chown -R www-data:www-data /var/www

# ポートの公開
EXPOSE 80
EXPOSE 5173

CMD ["apache2-foreground"]
