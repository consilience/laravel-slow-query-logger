# Slow Query Logger for Laravel

[![Latest Stable Version](https://poser.pugx.org/consilience/laravel-slow-query-logger/v/stable.svg)](https://packagist.org/packages/consilience/laravel-slow-query-logger) [![Latest Unstable Version](https://poser.pugx.org/consilience/laravel-slow-query-logger/v/unstable.svg)](https://packagist.org/packages/consilience/laravel-slow-query-logger) [![License](https://poser.pugx.org/consilience/laravel-slow-query-logger/license.svg)](https://packagist.org/packages/consilience/laravel-slow-query-logger) [![Total Downloads](https://poser.pugx.org/consilience/laravel-slow-query-logger/downloads.svg)](https://packagist.org/packages/consilience/laravel-slow-query-logger)

## Installation/Quickstart

```
composer require consilience/laravel-slow-query-logger
```

or add the following line to `composer.json` then run `composer update`:

```json
"require": {
    "consilience/laravel-slow-query-logger": "^2.0"
}
```

Turn on slow query logging:

    LARAVEL_SLOW_QUERY_LOGGER_ENABLED=true

Look into your log file to see your slow queries.

## Configuration

The configuration file can be published with the following command:

    php artisan vendor:publish --provider="Consilience\Laravel\SlowQueryLogger\SlowQueryLoggerProvider"

You will likely not need to publish the config; just set required environment variables as listed below.

### `enabled`

Enable the slow queries logger.

You can set this value through environment variable `LARAVEL_SLOW_QUERY_LOGGER_ENABLED`.
It is `false` by default.

### `channel`

Sets the channel to log in.
This can be handy if you want to keep all query logs separate from other log messages.

You can set this value through environment variable `LARAVEL_SLOW_QUERY_LOGGER_CHANNEL`.
By default, the application default logging channel will be used.

### `level`

Set the log-level for logging the slow queries.

You can set this value through environment variable `LARAVEL_SLOW_QUERY_LOGGER_LEVEL`.
It is `debug` by default.

### `threshold-ms`

Only log queries that take longer than this number of milliseconds to complete.

You can set this value through environment variable `LARAVEL_SLOW_QUERY_LOGGER_THRESHOLD_MS`.
It is `700` by default.
A value of 0 will log all queries.

## Usage

By default, bind variables are not included in the logged details.
Just the core query is logged:

> [20[2022-08-02 22:15:33] production.DEBUG: SQL 6663.970 mS: update `users` set `name` = ?, `users`.`updated_at` = ? where `id` = ?

By setting `LARAVEL_SLOW_QUERY_LOGGER_REPLACE_BINDINGS=true` the query will have its bind variables
substituted with the matching values:

> [2022-08-02 16:17:13] production.DEBUG: SQL 784.200 mS: update `users` set `name` = 'JJ', `users`.`updated_at` = '2022-08-02 16:17:05' where `id` = '1'

You can also (or alternatively) list the bind data separately in the context of the log
by setting `LARAVEL_SLOW_QUERY_LOGGER_SHOW_BINDINGS=true`.
This may be useful to observe the data types in more detail, since substituting the bindings will treat
all values as strings.

> [2022-08-02 22:22:35] production.DEBUG: SQL 413.910 mS: update `users` set `name` = 'JJ', `users`.`updated_at` = '2022-08-02 22:21:50' where `id` = '1' {"bindings":["JJ","2022-08-02 22:21:50",1]}
