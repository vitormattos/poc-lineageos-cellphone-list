FROM php:latest

RUN apt-get update

RUN apt-get install -y \
        git \
        libzip-dev \
        unzip \
        && docker-php-ext-install zip

# Install xdebug
RUN pecl install xdebug-2.9.0 \
    && docker-php-ext-enable xdebug

RUN git clone https://github.com/nikic/php-ast.git \
    && cd php-ast \
    && phpize \
    && ./configure \
    && make install \
    && echo 'extension=ast.so' > /usr/local/etc/php/php.ini \
    && cd .. && rm -rf php-ast

RUN curl https://getcomposer.org/composer.phar --output /usr/bin/composer
RUN chmod +x /usr/bin/composer

ENV NVM_DIR=/opt/nvm
RUN git clone https://github.com/nvm-sh/nvm.git $NVM_DIR
RUN cd $NVM_DIR && \
    git checkout `git describe --abbrev=0 --tags --match "v[0-9]*" $(git rev-list --tags --max-count=1)` && \
    . $NVM_DIR/nvm.sh && \
    nvm install 13 && \
    nvm use node
RUN echo "source ${NVM_DIR}/nvm.sh" > $HOME/.bashrc

WORKDIR /jigsaw

COPY entrypoint.sh /usr/bin/entrypoint.sh
ENTRYPOINT [ "sh", "/usr/bin/entrypoint.sh" ]