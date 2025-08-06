# Prerequisites

- install git
- install nodejs and composer
- install your fav code editor

# Steps

- clone this project `git clone https://github.com/Toad169/didactic-spork.git`
- open the terminal 
- run `cd didactic-spork`
- run `composer install`
- run `npm install --save-dev concurrently`
- copy the `.env.example` to `.env`
- run `php artisan migrate`
- run `php artisan key:generate`
- run `composer run dev`
- enjoy

or maybe just copypaste the command line below

``` bash
git clone https://github.com/Toad169/didactic-spork.git
cd didactic-spork
composer install
npm install --save-dev concurrently
cp .env.example .env
php artisan migrate:fresh
php artisan key:generate
composer run dev
```

# Disclaimer

this project is still unfinished like a raw unseasoned chicken and is currently on development, it is not recommended for daily use unless you want to help me developing this funny school project

also just send me an issue if there's a silly problem

