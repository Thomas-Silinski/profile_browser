
# Technical Test

## Tech Stack

**Client:** Vue 3, Inertia SPA

**Server:** PHP 8.2, Laravel 10


## Installation for dev

```bash
  cp .env.example .env
  
  composer i
  
  touch database/database.sqlite
  
  php artisan key:generate --force
  
  php artisan migrate:fresh --seed --force
  
  php artisan serve
  
  npm i
  
  npm run dev
```

## Environment Variables

To run this project, you will need to add the following environment variables to your .env file

`API_KEY` (php artisan key:generate --force)

## Authors

- [@thomas_silinski](https://github.com/Thomas-Silinski)
