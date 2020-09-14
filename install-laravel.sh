#! /bin/bash
php -r "file_exists('.env') || copy('.env.example', '.env');"
composer install

php artisan key:generate
php artisan cache:clear
php artisan config:clear

echo "Configurez le fichier .env puis faites la commande :
\n\t php artisan migrate:fresh --seed"

git remote add upstream https://github.com/sam-jc-vlad-sach/vino_etu
git pull upstream master