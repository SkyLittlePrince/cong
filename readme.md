## Laravel PHP Framework

```ruby
cp app/config/database.php.example app/config/database.php
# edit your database password

DROP DATABASE congcong;
CREATE DATABASE `congcong` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

php artisan migrate:refresh
php artisan db:seed
```

## Test

`phpunit`

## Official Documentation

Documentation for the entire framework can be found on the [Laravel website](http://laravel.com/docs).

### Contributing To Laravel

**All issues and pull requests should be filed on the [laravel/framework](http://github.com/laravel/framework) repository.**

### License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
