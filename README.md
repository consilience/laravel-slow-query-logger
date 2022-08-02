# Slow Query Logger for Laravel

[![Latest Stable Version](https://poser.pugx.org/consilience/laravel-slow-query-logger/v/stable.svg)](https://packagist.org/packages/consilience/laravel-slow-query-logger) [![Latest Unstable Version](https://poser.pugx.org/consilience/laravel-slow-query-logger/v/unstable.svg)](https://packagist.org/packages/consilience/laravel-slow-query-logger) [![License](https://poser.pugx.org/consilience/laravel-slow-query-logger/license.svg)](https://packagist.org/packages/consilience/laravel-slow-query-logger) [![Total Downloads](https://poser.pugx.org/consilience/laravel-slow-query-logger/downloads.svg)](https://packagist.org/packages/consilience/laravel-slow-query-logger)

## Quickstart

```
composer require consilience/laravel-slow-query-logger
```

Look into your log file to see your slow queries.

## Installation

Add to `composer.json` the following line:

```json
"require": {
    "consilience/laravel-slow-query-logger": "^2.0"
}
```

Turn on slow query logging:

    LARAVEL_SLOW_QUERY_LOGGER_ENABLED=true

## Configuration

The configuration file can be published with:

    php artisan vendor:publish --provider="Consilience\Laravel\SlowQueryLogger\SlowQueryLoggerProvider"

Settings in the configuration file:

### `enabled`

Enable the slow queries logger.

You can set this value through environment variable `LARAVEL_SLOW_QUERY_LOGGER_ENABLED`. It is `false` by default.

### `channel`

Sets the channel to log in.

You can set this value through environment variable `LARAVEL_SLOW_QUERY_LOGGER_CHANNEL`. It is `single` by default.

### `level`

Set the log-level for logging the slow queries.

You can set this value through environment variable `LARAVEL_SLOW_QUERY_LOGGER_LEVEL`. It is `debug` by default.

### `threshold-ms`

Only log queries longer than this value in milliseconds.

You can set this value through environment variable `LARAVEL_SLOW_QUERY_LOGGER_THRESHOLD`. It is `700` by default.
A value of 0 will log all queries.

## Usage

Start your application and look into your logs to view the slow queries.
Slow query logging must be switched on before you see the details.

    LARAVEL_SLOW_QUERY_LOGGER_ENABLED=true

By default, bind variables are not included in the logged details.
Just the core query is logged:

> [20[2022-08-02 22:15:33] production.DEBUG: SQL 6663.970 mS: update `users` set `name` = ?, `users`.`updated_at` = ? where `id` = ?

By setting `LARAVEL_SLOW_QUERY_LOGGER_REPLACE_BINDINGS=true` the query will have its bind variables
substituted with the matching values:

> [2022-08-02 16:17:13] production.DEBUG: SQL 784.200 mS: update `users` set `name` = 'JJ', `users`.`updated_at` = '2022-08-02 16:17:05' where `id` = '1'

You can also (or alternatively) list the bind data separately in the context details of the log
by setting `LARAVEL_SLOW_QUERY_LOGGER_SHOW_BINDINGS=true`.
This may be useful to observe the data types in more detail, since substituting the bindings will treat
all values as strings.

> [2022-08-02 22:22:35] production.DEBUG: SQL 413.910 mS: update `users` set `name` = 'JJ', `users`.`updated_at` = '2022-08-02 22:21:50' where `id` = '1' {"bindings":["JJ","2022-08-02 22:21:50",1]}
