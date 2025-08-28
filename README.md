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

# Troubleshooting

## Vite server not running

This happened because `composer.json` is running vite dev server on bun

``` json
"dev": [
            "Composer\\Config::disableProcessTimeout",
            "npx concurrently -c \"#93c5fd,#c4b5fd,#fdba74\" \"php artisan serve\" \"php artisan queue:listen --tries=1\" \"bun run dev\" --names='server,queue,vite'"
        ],
```

To fix this, you are given 2 choices:

1. Install bun to run vite dev server, link to bun.js installation https://bun.com/docs/installation

2. Change the `bun run dev` command line into `npm run dev`, change your `"dev"` script to this

``` json
"dev": [
            "Composer\\Config::disableProcessTimeout",
            "npx concurrently -c \"#93c5fd,#c4b5fd,#fdba74\" \"php artisan serve\" \"php artisan queue:listen --tries=1\" \"npm run dev\" --names='server,queue,vite'"
        ],
```
