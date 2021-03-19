# How to run #

You have to have composer installed, or add it manually to the repository.

See [Get Composer](https://getcomposer.org/download/)

Install packages by
```bash
$ composer install
```

See [docker](phpdocker/README.md) on prerequisites.

Otherwise just use 
```bash
$ docker-compose up -d
```

After running containers you have to install npm and yarn
```bash
$ docker-compose run encore npm install
$ docker-compose run encore yarn install
```

And update the references
```bash
$ docker-compose exec encore yarn dev
```

Now setup database and import migrations and fixtures
```bash
$ docker-compose exec php-fpm bin/console doctrine:schema:create
$ docker-compose exec php-fpm bin/console doctrine:migrations:migrate
$ docker-compose exec php-fpm bin/console doctrine:fixtures:load
```

Project is running under ```http://localhost:8080```
