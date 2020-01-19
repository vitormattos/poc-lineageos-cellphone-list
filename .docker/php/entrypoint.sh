#!/bin/bash
. $NVM_DIR/nvm.sh
if [ ! -d "vendor" ]; then
    export COMPOSER_ALLOW_SUPERUSER=1
    composer install
    npm install
fi
npm run watch