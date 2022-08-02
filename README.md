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

The configuration file can be published with:

    php artisan vendor:publish --provider="Consilience\Laravel\SlowQueryLogger\SlowQueryLoggerProvider"

## Configuration

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

Start your application and look into your logs to identify the slow queries.
