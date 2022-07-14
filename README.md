# CakePHP

## THIS IS A FORK / NO SUPPORT!!!

[Original CakePHP 2 documentation](https://book.cakephp.org/2/en/contributing/documentation.html)
#Running tests

Run the tests in a CentOS VM. You will need the following in addition to our basic PHP set-up.

```
sudo yum -y install glibc-locale-source glibc-langpack-en
sudo localedef -v -c -i es_ES -f UTF-8 es_ES
sudo localedef -v -c -i de_DE -f UTF-8 de_DE
```

Running tests:
`vendors/bin/phpunit`

By default, the tests run with an sqlite database, to run for MySQL, you need to configure a database connection in `app/Config/database.php` and make sure the following empty databases have been created:
`cakephp_test`, `cakephp_test2`, `cakephp_test3`, and then set the env var `DB` to `mysql`, i.e.:
`DB=mysql vendors/bin/phpunit`

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
