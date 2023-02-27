# CakePHP

## THIS IS AN INOFFICIAL FORK / NO SUPPORT!!!

[Original CakePHP 2 documentation](https://book.cakephp.org/2/en/contributing/documentation.html)

## Running tests

Run the tests in a CentOS VM. You will need the following in addition to our basic PHP set-up.

Running tests with docker:
```
> composer update
> docker compose up
> docker compose exec web bash

# within docker container: 
cp ./.github/workflows/configs/database.php ./app/Config/

# run tests with mysql
DB=mysql ./vendor/bin/phpunit

# run tests with sqlite
DB=sqlite ./vendor/bin/phpunit
```

## Docker base images

```
docker build -t beinbm/cake:php74 - < ./docker/web/PHP74.Dockerfile
docker push beinbm/cake:php74

docker build -t beinbm/cake:php80 - < ./docker/web/PHP80.Dockerfile
docker push beinbm/cake:php80
```

## Backup

By default, the tests run with a sqlite database, to run for MySQL, you need to configure a database connection in `app/Config/database.php` and make sure the following empty databases have been created:
`cakephp_test`, `cakephp_test2`, `cakephp_test3`, and then set the env var `DB` to `mysql`, i.e.:
`DB=mysql vendor/bin/phpunit`

These numbers are useful to know when upgrading PHPUnit as you can see easily if some tests are being missed or duped!

SQLite:
```
OK, but incomplete, skipped, or risky tests!
Tests: 4028, Assertions: 18830, Skipped: 320.
```

MYSQL:
```
OK, but incomplete, skipped, or risky tests!
Tests: 4028, Assertions: 19551, Skipped: 193.
```


```
docker run \
 -it --rm -v $(pwd):/srv/www \
 --platform linux/amd64 \
 registry.gitlab.com/gotphoto/platform/core/app:7.4-apache-bullseye_13-develop \
 bash
```