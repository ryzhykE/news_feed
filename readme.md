# News feed

## Install

Clone repository
```bash
$ git clone git@github.com:ryzhykE/news_feed.git
```

Install composer
```bash
$ composer install
```

Copy .env
```bash
$ cp .env.example .env
```

Generate key
```bash
$ php artisan key:generate
```

Create an empty database (MySQL)
```bash
$ mysql -uroot -proot
$ create database blog;
```

Set up database in file .env
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=blog
DB_USERNAME=username
DB_PASSWORD=userpass
```

Transfer tables to the database
```bash
$ php artisan migrate
```

Data filling tables to the database
```bash
$ php artisan db:seed
```

Create user
```bash
$ php artisan make:user
```
